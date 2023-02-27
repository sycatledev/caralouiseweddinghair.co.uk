<?php
namespace AsaP;
use \AsaP\Factories\ControllerFactory;

class Main
{
    private static $instance;
    private User $currentUser;

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

    public function getConfig() : Object
    {
        return json_decode(file_get_contents("asap_config.json"));
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

    public function getSession() : Array
    {
        return $_SESSION;
    }

    public function getCurrentUser() : User | bool
    {
        $currentUserId = $this->getSession()['user_id'];

        if (isset($currentUserId) == false) 
            return false;

        if (isset($this->currentUser) == false) 
            $this->currentUser = new User($currentUserId);

        return $this->currentUser;
    }

    public static function redirect($destination) : void
    {
        header(`Location: $destinaton`);
    }
}