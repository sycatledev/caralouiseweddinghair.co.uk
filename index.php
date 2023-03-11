<?php

// Define namespace "AsaP"
namespace AsaP;

// Description of the code with author and version
// Sycatle's PHP application core - v.1.0
/* --------------------------------------------------- */

// Initialize session superglobal variable.
session_start();

// Requiring external dependencies
require './vendor/autoload.php';

// Requiring inside dependencies
require("./src/Loader.php");
Loader::register();

// Import classes from AsaP namespace
use \AsaP\Utils\Router;
use \AsaP\Utils\Request;

// Create a new Request instance with information about the HTTP request
$request = new Request($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

// Create a new Router instance with the Request object as an argument
$router = new Router($request);

// Process the request and store the response in $response
$response = $router->process();