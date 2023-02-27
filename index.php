<?php
/* --------------------------------------------------- */
/*         @Sycatle's PHP application core - v.1.0
/* --------------------------------------------------- */

// Requiring dependencies
require("./src/Loader.php");
use AsaP\Loader;
Loader::register();

// Initialize session superglobal variable.
session_start();

// Get current request by retrieving get superglobal variable.
$request = isset($_GET['request']) ? $_GET['request'] : "home";

// Initialize application core
use AsaP\Main;
Main::getInstance()->init($request);