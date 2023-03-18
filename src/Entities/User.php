<?php
namespace AsaP\Entities;

use AsaP\Main;

class User {

    private int $id;
    private string $username;
    private string $mail;
    private string $password;

    function __construct(int $userId) 
    {
        $this->id = $userId;
        $this->init();
    }

    private function init() : void
    {
        // if (self::userExistsInDatabase() == false)
        // {
        //     $this->disconnect();
        //     exit;
        // } 
    }

    /**
     * Get the value of id
     */ 
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername() : string
    {
        return $this->username;
    }

    /**
     * Get the value of mail 
     */ 
    public function getMail() : string
    {
        return $this->mail;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword() : string
    {
        return $this->password;
    }

    public static function userExistsInDatabase(int $id) : bool
    {
        return true;
    }

    public function disconnect() : void
    {
        unset($_SESSION['user_id']);

        Main::redirect(".");
    }
}