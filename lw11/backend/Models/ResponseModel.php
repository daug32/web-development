<?php

class ResponseModel 
{
    public int $status;
    public string $message;

    public function __construct( $status, $message )
    {
        $this->status = $status;
        $this->message = $message;
    }
}

?>