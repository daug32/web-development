<?php

error_reporting( 0 );

$method = $_SERVER["REQUEST_METHOD"];

if ( $method == "GET" ) RouteGet();
else if ( $method == "POST" ) RoutePost();

function RouteGet()
{
    $rootPath = $_SERVER["DOCUMENT_ROOT"];
    $uri = GetUri();

    switch ( $uri ) 
    {
        case "/":
            include $rootPath."/views/main.php";
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
            Enroll::Save();
            header("Location: ". $_SERVER['HTTP_REFERER']);
            break;
    }

}

function GetUri()
{
    $result = explode( "?", $_SERVER["REQUEST_URI"] )[0];

    $length = strlen( $result );
    if ( $length > 1 && $result[$length - 1] == "/") 
        $result = substr( $result, 0, $length - 1 );

    return $result;
}

?>
