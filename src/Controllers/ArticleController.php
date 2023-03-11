<?php

namespace AsaP\Controllers;

use AsaP\Utils\Database;
use AsaP\Entities\Article;
use AsaP\Repositories\ArticleRepository;
use AsaP\Utils\Controller;

class ArticleController extends Controller
{
    private array $args;
    private Article $article;
    private array $articles;

    public function __construct($args)
    {
        parent::__construct();

        $this->args = $args;

        $this->article = ArticleRepository::getArticle($this->args['id']);
        $this->articles = ArticleRepository::getAllArticlesButExcept($this->args['id']);

        // Set metadata for the article page
        $this->setTitle($this->article->getTitle());
        $this->setDescription($this->article->getTitle());
        $this->addKeywords("article, hello, test");

        $this->setView("./src/templates/pages/article.php");
    }

    public function getArticle() : Article
    {
        return $this->article;
    }

    public function getArticles() : array
    {
        return $this->articles;
    }

    public function handleRequest(): void
    {
        // Handle any requests (e.g. form submissions) for the article page
        // var_dump($_POST);
    }
}