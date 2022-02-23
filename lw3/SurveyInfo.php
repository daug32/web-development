<?php

class SurveyInfo
{
    /**
     * Returns formated data about user
     * 
     * @var string $email
     * 
     * @return string
     */
    public static function GetAll($email)
    {
        $path = "data/$email.txt";
        if(!file_exists($path))
        {
            echo "User with this email doesn't exist: $email";
            return;
        }
        $data = implode("", file($path));
        return $data;
    }

    /**
     * Returns property's value
     * 
     * @var string $email
     * @var string $prop
     * 
     * @return string
     */
    public static function GetProp($email, $prop)
    {
        $data = self::GetAll($email);
        switch($prop)
        {
            case "first_name":
                $str = explode(": ", $data[0])[1];
                return $str;
            case "last_name":
                $str = explode(": ", $data[1])[1];
                return $str;
            case "email":
                $str = explode(": ", $data[2])[1];
                return $str;
            case "age":
                $str = explode(": ", $data[3])[1];
                return $str;
        }
        return "Unknown property name.\n";
    }
}