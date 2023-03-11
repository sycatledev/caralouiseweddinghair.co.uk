<?php

namespace AsaP;

use AsaP\Factories\ControllerFactory;
use AsaP\Entities\User;
use AsaP\Utils\Controller;
use AsaP\Utils\View;

class Main
{
    private static $instance;
    private User $currentUser;

    public function __construct()
    {
        self::$instance = $this;
    }

    public function init(): void
    {
        // This method will be used to initialize the application
        // It will be responsible for getting the relevant controller and rendering the view
        // For now, it is empty
    }

    public static function getInstance(): Main
    {
        // This method returns the Main singleton instance
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConfig(): Object
    {
        // This method reads and returns the application configuration from a JSON file
        return json_decode(file_get_contents("asap_config.json"));
    }

    public function getController(string $controller): Controller
    {
        // This method returns an instance of the relevant controller for a given request string
        // It uses the ControllerFactory to get the controller object
        $controller = strtolower($controller);
        $controller = trim($controller);
        return ControllerFactory::getController($controller);
    }

    public function getSession(): array
    {
        // This method returns the session superglobal
        return $_SESSION;
    }

    public function getCurrentUser(): User | bool
    {
        // This method returns the current user object or false if there is no logged-in user
        // It uses the session variable to get the user ID and create a new user object
        // It also caches the user object to avoid unnecessary database queries
        $currentUserId = $this->getSession()['user_id'];

        if (isset($currentUserId) == false)
            return false;

        if (isset($this->currentUser) == false)
            $this->currentUser = new User($currentUserId);

        return $this->currentUser;
    }

    public static function redirect($destination): void
    {
        // This method redirects to a given URL using the header function
        header("Location: $destination");
    }

    public function getRootDirectory(): string
    {
        // This method returns the root directory URL of the application
        return "http://localhost:80/AppCore";
    }
}
