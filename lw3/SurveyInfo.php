<?php

require_once "Survey.php";
class SurveyInfo extends Survey
{
    /**
     * Returns formated data about user
     * 
     * @return string
     */
    public static function GetAll()
    {
        self::GetData();
        
        if(strlen(self::$fillable["email"]) < 1)
            return "Aborted. No user to search info about";

        $path = self::GetPath();
        if(!file_exists($path))
        {
            return 
                "User with this email doesn't exist: ".
                self::$fillable["email"]."\n";
        }
        $data = implode("", file($path));
        return $data;
    }

    /**
     * Returns property's value
     * 
     * @var string $key
     * 
     * @return string
     */
    public static function GetValue($key)
    {
        if(!array_key_exists($key, self::$fillable))
            return "Error. Unknown property.\n";
        $data = explode("\n", self::GetAll());
        foreach($data as $row)
        {
            if(!str_contains($row, self::$prefixes[$key]))
                continue;
            
            return str_replace(self::$prefixes[$key].": ", "", $row);
        }
        return "";
    }
}