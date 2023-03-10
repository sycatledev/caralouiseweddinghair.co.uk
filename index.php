<?php namespace AsaP;
/* --------------------------------------------------- */
/*         @Sycatle's PHP application core - v.1.0
/* --------------------------------------------------- */

// Initialize session superglobal variable.
session_start();

// Requiring external dependencies
require './vendor/autoload.php';
// Requiring inside dependencies
require("./src/Loader.php");
use \AsaP\Loader;
Loader::register();

use \AsaP\Utils\Router;
use \AsaP\Utils\Request;
use \AsaP\Main;

$request = new Request($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
$router = new Router($request);
$response = $router->process();

// Initialize application core
Main::getInstance()->init();