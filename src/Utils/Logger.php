<?php

namespace AsaP\Utils;

class Logger
{
    private static $instance;

    // Initializes the Logger instance
    function __construct()
    {
        self::$instance = $this;
    }

    // Gets the Logger instance or creates a new one if none exists
    public static function getInstance(): Logger
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
