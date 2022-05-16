<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/Models/ResponseModel.php";

class BaseController 
{
    public static function Error( $status, $message = "" )
    {
        $status = $status ?? 404;
        $message = $message ?? "";

        $response = new ResponseModel( $status, $message );
        http_response_code( $status );
        echo json_encode( $response );
    }

    public static function Successful( $message = "" )
    {
        $response = new ResponseModel( 200, $message );
        http_response_code( 200 );  
        echo json_encode( $response );
    }
}

?>