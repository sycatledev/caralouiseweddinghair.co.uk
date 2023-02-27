<?php
namespace AsaP\Controllers;
use AsaP\Controller;
use AsaP\Utils\Utils;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->setTitle('Home');
        $this->setView("./src/templates/home.php");
        $this->setDescription("This is the AsaP home page description.");
        $this->addKeywords("homepage, asap, welcome");
        $this->setData([
            "message" => Utils::toSlug("Coucou je suis un slug trop stylé !!!!")
        ]);
    }
}