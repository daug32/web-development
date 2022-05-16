<?php

class EnrollModel
{
    public string $name;   
    public string $email;
    public string $profession;
    public bool $isSubscribed;

    public function __construct( $email, $name, $profession, $isSubscribed = false )
    {
        $this->email = $email;
        $this->name = $name;
        $this->profession = $profession;
        $this->isSubscribed = $isSubscribed;
    }
}

?>