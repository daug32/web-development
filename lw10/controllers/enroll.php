<?php

include $_SERVER["DOCUMENT_ROOT"]."/models/enroll.model.php";

class Enroll 
{
    /**
     * Routes on get request
     */
    public static function RouteGet()
    {
        $email = $_GET["email"];
        if ( !isset($email) || $email == "" )  
        {
             self::IncludeGetWebInterface();
             return;
        }
        self::PrintInfo();
    }

    /**
     * Save user's data
     * @var array $data
     * @return string
     */
    public static function Save()
    {
        $data = array(
            "email" => $_POST["email"],
            "name" => $_POST["name"],
            "profession" => $_POST["profession"]
        );

        $result = EnrollModel::Save( $data );
        if ( !$result ) return "Not saved";

        return "Saved.";
    }

    /**
     * Prints stored data or incldues web interface for getting the data
     * @return void
     */
    public static function PrintInfo()
    {
        $email = $_GET["email"];

        $path = EnrollModel::GetPath( $email );
        if ( !EnrollModel::Exists( $path ) )
        {
            include $_SERVER["DOCUMENT_ROOT"]."/views/404.php";
            return;
        }

        extract( EnrollModel::Load( $email ) );
        include $_SERVER["DOCUMENT_ROOT"]."/views/enroll/data.php";
    }

    /**
     * Incldues web interface for getting stored data
     */
    public static function IncludeGetWebInterface()
    {
        include $_SERVER["DOCUMENT_ROOT"]."/views/enroll/getWebInterface.php";
    }

    /**
     * Includes form template
     * @return void
     */
    public static function IncludeForm()
    {
        include $_SERVER["DOCUMENT_ROOT"]."/views/enroll/_form.php";
    }
}


?>