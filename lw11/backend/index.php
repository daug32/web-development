<?php

header( "Access-Control-Allow-Origin: *" );
error_reporting( 0 );

require_once $_SERVER["DOCUMENT_ROOT"]."/Controllers/BaseController.php";

$method = $_SERVER["REQUEST_METHOD"];

switch ( $method )
{
    case "GET":
        RouteGet();
        break;

    case "POST":
        RoutePost();
        break;
}

function RoutePost()
{
    $rootPath = $_SERVER["DOCUMENT_ROOT"];
    $uri = GetUri();

    switch ( $uri )
    {
        case "/enroll":
            include $rootPath."/Controllers/EnrollController.php"; 
            echo EnrollController::Save();
            break;
        
        default: 
            BaseController::Error( 404 );
            break;
    }
}

function RouteGet()
{
    $rootPath = $_SERVER["DOCUMENT_ROOT"];
    $uri = GetUri();

    switch ( $uri ) 
    {
        case "/get":
            include $rootPath."/Controllers/EnrollController.php"; 
            echo EnrollController::Get();
            break;

        default: 
            BaseController::Error( 404 );
            break;
    }
}
    
function GetUri()
{
    $uri = explode( "?", $_SERVER["REQUEST_URI"] )[0];
    $length = strlen( $uri );

    if ( $length > 1 && $uri[$length - 1] == "/") 
        $uri = substr( $uri, 0, $length - 1 );

    return $uri;
}

?>
