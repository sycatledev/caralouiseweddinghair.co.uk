<?php
namespace App\Sycatle;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setTitle('Home Page');
        $this->setView("./src/views/home.php");
        $this->setData(['message' => 'Welcome to my website']);
    }
}