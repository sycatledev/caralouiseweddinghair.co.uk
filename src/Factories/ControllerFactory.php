<?php
namespace AsaP\Factories;
use AsaP\Utils\Controller;
use AsaP\Controllers\HomeController;

class ControllerFactory 
{
    private static $controllers;

    public static function getControllers()
    {
        return [
            0 => [
                "method" => "GET",
                "uri" => "",
                "handler" => "home"
            ],
        ];
    }

    public static function getController(string $controller) : Controller
    {
        switch ($controller) {
            case 'home':
                return new HomeController();
                break;
            case 'blog':
                return new HomeController();
                break;
            default:
                return new HomeController();
                // return new ErrorController(404);
                break;
        }
    }
}