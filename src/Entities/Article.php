<?php

namespace AsaP\Entities;

use AsaP\Main;
use \DateTime;

class Article
{

    // Declare properties
    public $article_id;
    public $article_slug;
    public $article_title;
    public $article_content;
    public $article_categories;
    public $article_date;

    /**
     * Get the value of id
     */
    public function getId() : int
    {
        return $this->article_id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id) : void
    {
        $this->article_id = $id;
    }

    /**
     * Get the value of slug
     */
    public function getSlug() : string
    {
        return $this->article_slug;
    }

    /**
     * Set the value of slug
     *
     * @return  self
     */
    public function setSlug($slug) : void
    {
        $this->article_slug = $slug;
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
    public function setTitle($article_title) : void
    {
        $this->article_title = $article_title;
    }

    /**
     * Get the value of content
     */
    public function getContent() : array
    {
        // Return the JSON-decoded article content
        return json_decode($this->article_content);
    }

    /**
     * Get the first 50 characters of content followed by ellipses
     */
    public function getSummaryContent() : string
    {
        // Return the first 50 characters of the article content followed by ellipses
        return substr($this->article_content, 0, 50) . "..";
    }

    /**
     * Set the value of content
     *
     * @return  self
     */
    public function setContent($content) : void
    {
        $this->article_content = $content;
    }

    /**
     * Get the value of date
     *
     * @param string $dateFormat The format of the date to return
     * @return string The formatted date
     */
    public function getDate($dateFormat = "d/m/Y - h:i") : string
    {
        // Create a new DateTime object and format the date according to the given format
        $date = new DateTime($this->article_date);

        return $date->format($dateFormat);
    }

    /**
     * Get the URL of the article page
     *
     * @return string The URL of the article page
     */
    public function getHref() : string
    {
        $href = Main::getInstance()->getRootUrl() . "/blog/" . $this->getSlug() . "-" . $this->getId();

        // Return the URL of the article page
        return $href;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */
    public function setDate($date)
    {
        $this->article_date = $date;
    }

    /**
     * Get the path to the article's thumbnail
     *
     * @return string The path to the article's thumbnail
     */
    public function getThumbnail()
    {
        $thumbnailDirectory = Main::getInstance()->getRootUrl() . "/uploads/articles/" . $this->getSlug() . ".webp";

        // Check if the thumbnail file exists and return its path, otherwise return a placeholder image URL
        if (!file_exists($thumbnailDirectory)) {
            return $thumbnailDirectory;
        } else {
            return "https://via.placeholder.com/1400x700";
        }
    }

    /**
     * Get the value of article_categories
     */ 
    public function getCategories() : array
    {
        return json_decode($this->article_categories);
    }

    /**
     * Set the value of article_categories
     *
     * @return  self
     */ 
    public function setCategories($article_categories) : void
    {
        $this->article_categories = $article_categories;
    }
}