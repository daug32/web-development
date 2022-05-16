<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/Models/EnrollModel.php";

class EnrollService
{
    /**
     * Saves data about user
     */
    public static function Save( $enroll )
    {
        $email = $enroll->email;
        if ( !isset( $email ) || $email == "" )
        {
            return false;
        }
        
        $path = self::GetPath( $enroll->email );
        $file = fopen( $path, 'w' );
        if ( !$file ) return false; 

        $lines = $enroll->email."\n".
                $enroll->name."\n".
                $enroll->profession."\n".
                $enroll->isSubscribed."\n";
        
        fwrite( $file, $lines );
        fclose( $file );

        return true;
    }

    public static function LoadAll()
    {
        $emails = [];

        $directory = $_SERVER["DOCUMENT_ROOT"]."/data";
        $files = scandir( $directory );
        $emailsCount = 0;

        foreach( $files as $file )
        {
            if ( !str_ends_with( $file, ".txt" ) ) continue; 

            $emails[$emailsCount] = explode( ".txt", $file )[0];
            $emailsCount++;
        }

        $data = [];
        foreach ( $emails as $email ) 
            array_push( $data, self::Load( $email ) );
        return $data;
    }

    /**
     * Returns stored data
     */
    public static function Load( $email )
    {
        $path = self::GetPath( $email );
        if ( !self::Exists( $path ) ) return new EnrollModel();
        
        $lines = file( $path );

        $data = new EnrollModel( 
            email: $lines[0], 
            name: $lines[1], 
            profession: $lines[2] ,
            isSubscribed: $lines[3] == "1"
        );

        return $data;
    }

    /**
     * Returns path to the user's data
     */
    public static function GetPath( $email )
    {
        return $_SERVER["DOCUMENT_ROOT"]."/data/$email.txt";
    }

    /**
     * Whether data about user was recorded or not
     */
    public static function Exists( $path )
    {
        return file_exists( $path );
    } 
}

?>