<?php
namespace AsaP\Factories;
use AsaP\Controller;
use AsaP\Controllers\HomeController;

class ControllerFactory 
{
    public static function getController(string $controller) : Controller
    {
        switch ($controller) {
            case 'home':
                return new HomeController();
                break;
            default:
                return new ErrorController(404);
                break;
        }
    }
}