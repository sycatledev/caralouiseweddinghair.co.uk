<?php
namespace AsaP\Utils;

use AsaP\Utils\Controller;
use AsaP\Main;

class View
{
    private $controller;

    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }

    public function getController() : Controller
    {
        return $this->controller;
    }

    public function render() : void
    {
        extract($this->controller->getData()); // Extract data variables into the current scope
        
        include($this->controller->getView()); // Include the view file
    }
}

?>