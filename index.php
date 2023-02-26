<?php
/* --------------------------------------------------- */
/*         @Sycatle's PHP application core - v.1.0
/* --------------------------------------------------- */

// Initialize sessions
if (!isset($_SESSION))
{
    session_start();
}

// Requiring dependencies
use App\Sycatle\Main;
require("./src/Main.php");

// Get current GET request
$request = isset($_GET['request']) ? $_GET['request'] : "home";

Main::getInstance()->init($request);