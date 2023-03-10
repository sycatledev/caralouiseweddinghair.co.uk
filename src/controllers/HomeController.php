<?php
namespace AsaP\Controllers;
use AsaP\Utils\Database;
use AsaP\Utils\Controller;
use AsaP\Utils\Utils;

class HomeController extends Controller
{
    private array $articles;

    public function __construct()
    {
        parent::__construct();

        $this->initArticles();

        $this->setTitle('Home');
        $this->setDescription("This is the AsaP home page description.");
        $this->addKeywords("homepage, asap, welcome");
        $this->setView("./src/templates/pages/home.php");
    }

    public function handleRequest() : void
    {
        // var_dump($_POST); 
    }

    private function initArticles() : void
    {
        if (!isset($this->articles))
        {
            $this->articles = Database::query(
                "SELECT article_id, article_slug, article_title, article_content, article_date FROM articles
                    WHERE article_visibility = 'public'
                    ORDER BY article_date DESC"
                ,"AsaP\Entities\Article"
            );
        }
    }

    public function getArticles() 
    {
        return $this->articles;
    }

    public function getLastArticle()
    {
        $lastArticle = $this->articles[0];
        array_splice($this->articles, 0, 1);

        return $lastArticle;
    }
}