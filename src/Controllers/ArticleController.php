<?php
namespace AsaP\Controllers;
use AsaP\Utils\Database;
use AsaP\Entities\Article;
use AsaP\Utils\Controller;

class ArticleController extends Controller
{
    private Article $article;

    public function __construct($args)
    {
        parent::__construct();

        // $this->article = Article::getBySlug($args['slug']);
        // var_dump($args);

        $this->setTitle($args['slug']);
        $this->setDescription("This is the AsaP home page description.");
        $this->addKeywords("homepage, asap, welcome");

        $this->setView("./src/templates/pages/article.php");
    }

    public function handleRequest() : void
    {
        // var_dump($_POST);
    }
}