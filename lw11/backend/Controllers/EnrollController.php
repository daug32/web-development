<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/Controllers/BaseController.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/Services/EnrollService.php";

class EnrollController extends BaseController
{
    /**
     * Routes on get request
     */
    public static function Get()
    {
        $email = $_GET["email"];

        if ( $email == null || $email = "" )
        {
            self::GetAllUsers();
            return;
        }

        self::GetUser( $email );
    }

    public static function GetAllUsers()
    {
        $enrollList = EnrollService::LoadAll();
        $message = json_encode( $enrollList );
        parent::Successful( $message );
    }

    public static function GetUser( $email )
    {
        $userExist = EnrollService::Exists( $email );
        if ( !$userExist )  
        {
            parent::Error( 404, "Email wasn't found" );
            return;
        }

        $enrollModel = EnrollService::Load( $email );
        $message = json_encode( $enrollModel );
        parent::Successful( $message );
    }

    /**
     * Save user's data
     */
    public static function Save()
    {
        $enrollDto = file_get_contents( "php://input" );
        $enrollDto = json_decode( $enrollDto );

        $result = EnrollService::Save( $enrollDto );
        if ( !$result ) 
        {
            parent::Error( 500, "Couldn't save" );
            return;
        }

        parent::Successful();
    }

    /**
     * Incldues web interface for getting stored data
     */
    public static function IncludeGetWebInterface()
    {
        include $_SERVER["DOCUMENT_ROOT"]."/Pages/Enroll/getWebInterface.php";
    }

    /**
     * Includes form template
     * @return void
     */
    public static function IncludeForm()
    {
        include $_SERVER["DOCUMENT_ROOT"]."/Pages/Enroll/_form.php";
    }
}


?>