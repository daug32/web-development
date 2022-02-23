<?php

class SurveySaver
{
    protected static function GetData()
    {
        $data = array();
        $data['age'] = $_GET['age'] ?: "";
        $data['email'] = $_GET['email'];
        $data['last_name'] = $_GET['last_name'] ?: "";
        $data['first_name'] = $_GET['first_name'] ?: "";
        return $data;
    }
    protected static function UpdateRecord($path, $data)
    {
        $lines = file($path);
        if(strlen($data["age"]) > 1)
            $lines[3] = "Age: ".$data["age"]."\n";
        if(strlen($data["last_name"]) > 1)
            $lines[1] = "Last name: ".$data["last_name"]."\n";
        if(strlen($data["first_name"]) > 1)
           $lines[0] = "First name: ".$data["first_name"]."\n";

        $lines = implode("", $lines);
        $file = fopen($path, 'w');
        fwrite($file, $lines);
        fclose($file);
    }
    protected static function NewRecord($path, $data)
    {
        $file = fopen($path, 'w');
        fwrite($file,
            "First name: ".$data["first_name"]."\n".
            "Last name: ".$data["last_name"]."\n".
            "Email: ".$data["email"]."\n".
            "Age: ".$data["age"]."\n"
        );
        fclose($file);
    }
    public static function Exec()
    {
        $data = self::GetData();
        if(!isset($data['email'])) 
        {
            echo 'Error. The mandatory "email" property is empty';
            return;
        }

        $path = 'data/'.$data['email'].'.txt';
        if(file_exists($path)) self::UpdateRecord($path, $data);
        else self::NewRecord($path, $data);
    }
}