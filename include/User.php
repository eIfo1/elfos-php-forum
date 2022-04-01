<?php

class User
{
    private $id;
    public $username;
    public $email;
    public $date_created;
    public $post_number;

    // Methods
    public function __construct($id, $username, $email, $date_created, $post_number)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->date_created = $date_created;
        $this->post_number = $post_number;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getDateCreated()
    {
        return $this->date_created;
    }

    public function getPostNumber()
    {
        return $this->post_number;
    }
}
