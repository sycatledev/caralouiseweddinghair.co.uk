<?php
namespace AsaP;

class Controller
{
    private string $title;
    private string $description;
    private string $keywords;
    private string $viewPath;
    private array $data;

    public function __construct()
    {
        $this->title = "";
        $this->description = "";
        $this->keywords = "";
        $this->data = [];
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
}