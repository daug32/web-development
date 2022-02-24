<?php

class Survey
{
    /**
     * Fillable properties
     * @var array<string,string>
     */
    protected static $fillable = [
        "first_name" => "",
        "last_name" => "",
        "email" => "",
        "age" => ""
    ];

    /**
     * Prefixes for properties in table
     * @var array<string,string>
     */
    protected static $prefixes = [
        "first_name" => "First name",
        "last_name" => "Last name",
        "email" => "Email",
        "age" => "Age"
    ];

    /**
     * Fill the $fillable array
     * @return null
     */
    protected static function GetData()
    {   
        foreach(array_keys($_GET) as $key)
        {
            $key = strtolower($key);
            if(array_key_exists($key, self::$fillable))
            {
                $isValid =   
                    (!str_contains($_GET[$key], "/")) &&
                    (!str_contains($_GET[$key], "."));
                if($isValid) self::$fillable[$key] = $_GET[$key];
            }
        }
    }

    /**
     * Returns path to the file 
     * @return string
     */
    protected static function GetPath()
    {
        return __DIR__."/data/".self::$fillable["email"].".txt";
    }
}