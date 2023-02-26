<?php
namespace App\Sycatle;

class View
{
    private $controller;

    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }

    public function render() : void
    {
        extract($this->controller->getData()); // Extract data variables into the current scope
        include($this->controller->getView()); // Include the view file
    }
}