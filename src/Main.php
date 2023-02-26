<?php
namespace AppCore;
require("./src/Database.php");
require("./src/Logger.php");
require("./src/View.php");
require("./src/Controller.php");
require("./src/entities/User.php");

class Main
{
    private static $instance;
    private User $user;

    public function __construct()
    {
        self::$instance = $this;
    }

    public function init(string $request) : void
    {
        $controller = $this->getController($request);
        $view = new View($controller);
        $view->render();
    }

    public static function getInstance() : Main
    {
        if (self::$instance === null)
        {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConfig()
    {
        return json_decode(file_get_contents("appcore_config.json"));
    }

    public function getSession() : Array
    {
        return $_SESSION;
    }

    private function getController(string $controller) : Controller
    {
        // To lowercase from request string
        $controller = strtolower($controller);
        // Remove spaces from request string
        $controller = trim($controller);

        // Get from ControllerFactory the current controller
        return ControllerFactory::getController($controller);
    }

    public function getCurrentUser() : User | Boolean
    {
        if (isset($this->getSession()['user_id']) == false) 
        {
            return false;
        }

        $currentUserId = $this->getSession()['user_id'];

        if (isset($this->currentUser) == false) 
        {
            $this->currentUser = new User($currentUserId);
        }

        return $this->currentUser;
    }
}