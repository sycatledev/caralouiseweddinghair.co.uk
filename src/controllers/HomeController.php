<?php
namespace AppCore;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->setDescription("This is the AppCore home page description.");
        $this->setView("./src/views/home.php");
        $this->addKeywords("homepage, appcore, welcome");
        $this->setData([
            "message" => "Welcome to my website"
        ]);
    }
}