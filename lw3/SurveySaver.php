<?php

require_once "Survey.php";
class SurveySaver extends Survey
{    
    /**
     * Parses data from the URL and saves data 
     * @return string
     */
    public static function Exec()
    {
        self::GetData();
        if(strlen(self::$fillable['email']) < 1) 
            return "Aborted. The mandatory property \"email\" is empty.\n";

        $path = self::GetPath();
        return self::Record($path);
    }

    /**
     * Creates new or updates existed record for the user
     * @var string $path
     * @return string
     */
    protected static function Record($path) //record - запись
    {
        $data = array();
        $lines = array();
        if(file_exists($path)) 
            $lines = file($path);
            
        $file = fopen($path, 'w');
        if(!$file) return "Error. File can't be opened.\n";

        $i = -1;
        foreach(array_keys(self::$fillable) as $key)
        {
            $i++;

            $oldData = explode(": ", $lines[$i])[0];
            $recievedDataIsEmpty = strlen(self::$fillable[$key]) < 1;
            $recordExists = $oldData === self::$prefixes[$key];

            if($recievedDataIsEmpty && $recordExists)
                $data[$i] = $lines[$i];
            else 
                $data[$i] = 
                    self::$prefixes[$key].": ".
                    self::$fillable[$key]."\n";
        }
        fwrite($file, implode("", $data));
        fclose($file);
        return "Data processed.\n";
    }
}