<?php

header("Access-Control-Allow-Origin: *");
error_reporting( 0 );

$method = $_SERVER["REQUEST_METHOD"];

switch( $method )
{
    case "GET":
        // RouteGet();
        break;

    case "POST":
        RoutePost();
        break;
}

function RouteGet()
{
    $rootPath = $_SERVER["DOCUMENT_ROOT"];
    $uri = GetUri();

    switch ( $uri ) 
    {
        case "/":
            include $rootPath."../frontend/index.html";
            break;

        case "/enroll":
            include $rootPath."/controllers/enroll.php"; 
            Enroll::RouteGet();
            break;

        default: 
            include $rootPath."/views/404.php";
            break;
    }
}

function RoutePost()
{
    $rootPath = $_SERVER["DOCUMENT_ROOT"];
    $uri = GetUri();

    switch ( $uri )
    {
        case "/enroll":
            include $rootPath."/controllers/enroll.php"; 
            echo Enroll::Save();
            // header("Location: ". $_SERVER['HTTP_REFERER']);
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
