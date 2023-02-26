<?php

namespace AppCore;

class User {

    function __construct(int $userId) 
    {
        $this->id = $userId;

        $this->init();
    }

    private function init()
    {
        if ($this->userExistsInDatabase() == false)
        {
            $this->disconnect();
            exit;
        }
    }

    private function userExistsInDatabase() : Boolean
    {
        // Check if the user exists in the database
        /* $row = Database::getInstance()->fetch(
            "SELECT user_id FROM user WHERE user_id = '$this->id'"
        ); */

        return true;
    }

    public function disconnect() : void
    {
        unset($_SESSION['user_id']);
        header("Location: .");
    }

}