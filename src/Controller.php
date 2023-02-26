<?php
namespace App\Sycatle;
require("./src/controllers/HomeController.php");

class Controller
{
    private string $title;
    private string $view;
    private array $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function getView() : string
    {
        return $this->view;
    }

    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }

    public function setView(string $view) : void
    {
        $this->view = $view;
    }

    public function setData(array $data) : void
    {
        $this->data = $data;
    }

    public function getData() : array
    {
        return $this->data;
    }
}

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