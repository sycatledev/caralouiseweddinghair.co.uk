<?php

namespace App\Sycatle;

class User {

    function __construct(int $userId) 
    {
        $this->id = $userId;

        if ($this->userExistsInDatabase() == false)
        {
            $this->disconnect();
            break;
        }

        $this->init();
    }

    private function init()
    {
        // USER ACTIONS
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