<?php
namespace AsaP\Utils;

class Logger 
{
    private static $instance;

    function __construct() {
        self::$instance = $this;
    }

    public static function getInstance() : Logger
    {
        if (self::$instance === null)
        {
            self::$instance = new self();
        }

        return self::$instance;
    }
}

?>