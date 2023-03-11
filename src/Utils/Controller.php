<?php

namespace AsaP\Utils;

use AsaP\Main;

abstract class Controller
{
    // Properties
    private string $title; // the page title
    private string $description; // the page description
    private string $keywords; // the page keywords
    private string $viewPath; // the path to the view file
    private array $data; // an array of data to be passed to the view
    private bool $header; // whether or not to display the header
    private bool $footer; // whether or not to display the footer
    private string $favicon; // the path to the favicon file
    private array $javascripts; // an array of javascript files to include
    private array $cascadelinks; // an array of CSS files to include 

    // Constructor
    public function __construct()
    {
        $this->handleRequest();

        // Initialize default values for properties
        $this->title = "";
        $this->description = "";
        $this->keywords = "";
        $this->data = [];
        $this->header = true;
        $this->footer = true;
        $this->favicon = "";
        $this->cascadelinks = [
            Main::getInstance()->getRootDirectory() . '/public/styles/output.css'
        ];
        $this->javascripts = [
            Main::getInstance()->getRootDirectory() . '/public/scripts/Cookies.js',
            Main::getInstance()->getRootDirectory() . '/public/scripts/Theme.js',
            Main::getInstance()->getRootDirectory() . '/public/scripts/Nav.js',
            Main::getInstance()->getRootDirectory() . '/node_modules/flowbite/dist/flowbite.min.js'
        ];
    }

    // Methods
    public function handleRequest(): void
    {
        return; // Do nothing by default
    }

    public function getTitle(): string
    {
        $title = $this->title;

        // Append the app name to the title if it's not already included
        if (trim($title) !== "" && $title !== null) {
            $title = $title . " | ";
        }

        return $title . Main::getInstance()->getConfig()->app_name;
    }

    public function getDescription(): string
    {
        $description = $this->description;

        // Use the default description from config if none is set
        if (trim($description) === "" || $description === null) {
            $description = Main::getInstance()->getConfig()->meta->description;
        }

        return $description;
    }

    public function getKeywords(): string
    {
        $keywords = $this->keywords;

        // Use the default keywords from config if none are set
        if (trim($keywords) === "" || $keywords === null) {
            $keywords = Main::getInstance()->getConfig()->meta->keywords;
        }

        return $keywords;
    }

    // This function returns the view path string
    public function getView(): string
    {
        return $this->viewPath;
    }

    // This function sets the title string
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    // This function sets the description string
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    // This function sets the keywords string
    public function setKeywords(string $keywords): void
    {
        $this->keywords = $keywords;
    }

    // This function sets the view path string
    public function setView(string $viewPath): void
    {
        $this->viewPath = $viewPath;
    }

    // This function sets the data array
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    // This function returns the data array
    public function getData(): array
    {
        return $this->data;
    }

    // This function appends the given keyword string to the current keywords string
    public function addKeywords(string $keywords): void
    {
        $this->keywords = $this->getKeywords() . "," . $keywords;
    }

    // This function returns a boolean indicating if the controller has a header
    public function hasHeader(): bool
    {
        return $this->header;
    }

    // This function returns a boolean indicating if the controller has a footer
    public function hasFooter(): bool
    {
        return $this->footer;
    }

    // This function sets the boolean value of header
    public function setHeader(bool $hasHeader): void
    {
        $this->header = $hasHeader;
    }

    // This function sets the boolean value of footer
    public function setFooter(bool $hasFooter): void
    {
        $this->footer = $hasFooter;
    }

    // This function returns the javascripts array
    public function getJavascripts(): array
    {
        return $this->javascripts;
    }

    // This function returns the cascade links array
    public function getCascadeLinks(): array
    {
        return $this->cascadelinks;
    }

    // This function returns the favicon string
    public function getFavicon()
    {
        return $this->favicon;
    }
}