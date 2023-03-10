<?php
namespace AsaP\Utils;
use AsaP\Main;

abstract class Controller
{
    private string $title;
    private string $description;
    private string $keywords;
    private string $viewPath;
    private array $data;
    private bool $header;
    private bool $footer;
    private string $favicon;
    private array $javascripts;
    private array $cascadelinks; 

    public function __construct()
    {
        $this->handleRequest();

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
            Main::getInstance()->getRootDirectory() . '/node_modules/flowbite/dist/flowbite.min.js'
        ];
    }

    public function handleRequest() : void
    {
        return;
    }

    public function getTitle() : string
    {
        $title = $this->title;

        if (trim($title) !== "" && $title !== null) 
        {
            $title = $title . " | " ;
        }

        return $title . Main::getInstance()->getConfig()->app_name;
    }

    public function getDescription() : string
    {
        $description = $this->description;

        if (trim($description) === "" || $description === null) 
        {
            $description = Main::getInstance()->getConfig()->meta->description;
        }

        return $description;
    }

    public function getKeywords() : string
    {
        $keywords = $this->keywords;

        if (trim($keywords) === "" || $keywords === null) 
        {
            $keywords = Main::getInstance()->getConfig()->meta->keywords;
        }

        return $keywords;
    }

    public function getView() : string
    {
        return $this->viewPath;
    }

    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }

    public function setDescription(string $description) : void
    {
        $this->description = $description;
    }

    public function setKeywords(string $keywords) : void
    {
        $this->keywords = $keywords;
    }

    public function setView(string $viewPath) : void
    {
        $this->viewPath = $viewPath;
    }

    public function setData(array $data) : void
    {
        $this->data = $data;
    }

    public function getData() : array
    {
        return $this->data;
    }

    public function addKeywords(string $keywords) : void 
    {
        $this->keywords = $this->getKeywords() . "," . $keywords;
    }

    public function hasHeader() : bool
    {
        return $this->header;
    }

    public function hasFooter() : bool
    {
        return $this->footer;
    }

    public function setHeader(bool $hasHeader) : void
    {
        $this->header = $hasHeader;
    }

    public function setFooter(bool $hasFooter) : void
    {
        $this->footer = $hasFooter;
    }

    public function getJavascripts() : array
    {
        return $this->javascripts;
    }

    public function getCascadeLinks() : array
    {
        return $this->cascadelinks; 
    }

    /**
     * Get the value of favicon
     */ 
    public function getFavicon()
    {
        return $this->favicon;
    }
}

?>