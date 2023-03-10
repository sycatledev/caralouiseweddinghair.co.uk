<?php
namespace AsaP\Entities;
use \DateTime;

class Article
{

    public $article_id;
    public $article_slug;
    public $article_title;
    public $article_content;
    public $article_date;

    // function __construct($id)
    // {
    //     $this->id = $id;
    // }

    public static function getBySlug($slug) : Article
    {
        return new Article();
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->article_id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->article_id = $id;

        return $this;
    }

    /**
     * Get the value of slug
     */ 
    public function getSlug()
    {
        return $this->article_slug;
    }

    /**
     * Set the value of slug
     *
     * @return  self
     */ 
    public function setSlug($slug)
    {
        $this->article_slug = $slug;

        return $this;
    }

    /**
     * Get the value of article_title
     */ 
    public function getTitle()
    {
        return $this->article_title;
    }

    /**
     * Set the value of article_title
     *
     * @return  self
     */ 
    public function setTitle($article_title)
    {
        $this->article_title = $article_title;

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->article_content;
    }

    /**
     * Get the first 100 characters of content
     */ 
    public function getSummaryContent()
    {
        return substr($this->article_content, 0, 50) . "..";
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->article_content = $content;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate($dateFormat = "d/m/Y - h:i")
    {
        $date = new DateTime($this->article_date);

        return $date->format($dateFormat);
    }

    public function getHref()
    {
        return \AsaP\Main::getInstance()->getRootDirectory() . "/article/" . $this->getSlug() . "." . $this->getId();
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->article_date = $date;

        return $this;
    }

    public function getThumbnail()
    {
        if (!file_exists(\AsaP\Main::getInstance()->getRootDirectory() . "/uploads/articles/" . $this->getSlug() . ".webp"))
        {
            return \AsaP\Main::getInstance()->getRootDirectory() . "/uploads/articles/" . $this->getSlug() . ".webp";
        }
        else
        {
            return "https://via.placeholder.com/1400x700";
        }
    }

}
?>