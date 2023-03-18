<?php

namespace AsaP\Controllers;

use AsaP\Controller;
use AsaP\Repositories\ArticleRepository;
use AsaP\Repositories\CategoryRepository;

// Define the BlogController class which extends the Controller class
class BlogController extends Controller
{
    // Define a private property to store the articles
    private array $articles;
    private array $categories;

    // Define the constructor method
    public function __construct()
    {
        // Call the parent constructor method
        parent::__construct();
    }

    public function setup() : void
    {
        // Initialize the articles
        $this->articles = ArticleRepository::getPublicArticlesByPostDate();
        $this->categories = CategoryRepository::getCategories();

        // Set the page title, description, and keywords
        $this->setTitle('Home');
        $this->setDescription("This is the AsaP home page description.");
        $this->addKeywords("homepage, asap, welcome");

        // Set the view to be used to render the page
        $this->setView("./src/templates/pages/home.php");
    }

    // Define the method to handle requests
    public function handleRequest(): void
    {
        // Uncomment the following line to dump the POST request data
        // var_dump($_POST); 
    }

    // Define a method to get all the articles
    public function getArticles()
    {
        return $this->articles;
    }

    public function getCategories()
    {
        return $this->categories;
    }

    // Define a method to get the last article
    public function getLastArticle()
    {
        // Get the last article from the articles property
        $lastArticle = $this->articles[0];

        // Remove the last article from the articles property
        array_splice($this->articles, 0, 1);

        // Return the last article
        return $lastArticle;
    }
}
