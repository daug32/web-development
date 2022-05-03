<?php

class EnrollModel 
{
    /**
     * Saves data about user
     * @var array $data 
     * @return bool
     */
    public static function Save( $data )
    {
        if ( !isset( $data["email"] ) || $data["email"] == "" )
        {
            return false;
        }

        $lines = 
                $data["email"]."\n".
                $data["name"]."\n".
                $data["profession"]."\n";

        $path = self::GetPath( $data["email"] );
        
        $file = fopen( $path, 'w' );
        if ( !$file ) return false; 
        fwrite( $file, $lines );
        fclose( $file );

        return true;
    }

    /**
     * Returns stored data
     * @var string $email
     * @return array
     */
    public static function Load( string $email )
    {
        $path = self::GetPath( $email );
        if ( !self::Exists( $path ) ) return array();
        
        $lines = file( $path );
        return array(
            "email" => $lines[0], 
            "name" => $lines[1],
            "profession" => $lines[2]
        );
    }

    /**
     * Returns path to the user's data
     * @var string $email
     * @return string
     */
    public static function GetPath( $email )
    {
        return $_SERVER["DOCUMENT_ROOT"]."/data/$email.txt";
    }

    /**
     * Whether data about user was recorded or not
     * @var string $path
     * @return bool
     */
    public static function Exists( $path )
    {
        return file_exists( $path );
    } 
}

?>