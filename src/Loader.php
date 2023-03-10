<?php
namespace AsaP;

class Loader
{
    public static function register() : bool
    {
        return \spl_autoload_register(array(__CLASS__, 'includeClass'));
    }

    public static function unregister() : bool
    {
        return \spl_autoload_unregister(array(__CLASS__, 'includeClass'));
    }

    public static function includeClass($class) : void
    {
        if (strpos($class, __NAMESPACE__ . "\\") === 0)
        {
            $class = \str_replace(__NAMESPACE__ . "\\", "", $class);
            $class = "." . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . $class . ".php";

            if (\file_exists($class)) {
                // echo "Included class: $class"; // Debugging statement
                include_once($class);
            }
        }

    }
}

?>