<?php

namespace AsaP;

// A class that loads PHP classes automatically
class Loader
{
    // Registers the autoloader
    public static function register(): bool
    {
        // spl_autoload_register() allows registering multiple autoload functions
        // It returns true if the registration was successful, false otherwise
        return \spl_autoload_register(array(__CLASS__, 'includeClass'));
    }

    // Unregisters the autoloader
    public static function unregister(): bool
    {
        // spl_autoload_unregister() allows unregistering an autoload function
        // It returns true if the function was successfully unregistered, false otherwise
        return \spl_autoload_unregister(array(__CLASS__, 'includeClass'));
    }

    // Includes a class file
    public static function includeClass($class): void
    {
        // Checks if the class is in the AsaP namespace
        if (strpos($class, __NAMESPACE__ . DIRECTORY_SEPARATOR) === 0) {
            // Removes the namespace from the class name
            $class = \str_replace(__NAMESPACE__ . DIRECTORY_SEPARATOR, "", $class);
            // Constructs the path to the class file
            $class = realpath("." . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $class . '.php');

            // Checks if the class file exists
            if (\file_exists($class)) {
                // Includes the class file
                include_once($class);
            }
        }
    }
}
