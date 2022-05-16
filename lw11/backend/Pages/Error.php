<?php
    if ( !isset( $status ) ) $status = 404;
    http_response_code( $status );

    if ( !isset( $message ) ) 
    {
        $message = "Такого файла не существует.";
    }

    echo "<p class='text'>$message</p>";
?>
