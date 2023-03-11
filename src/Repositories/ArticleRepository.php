<?php
namespace AsaP\Repositories;

use AsaP\Utils\Database;
use AsaP\Entities\Article;

class ArticleRepository 
{

    public static function getArticle(int $article_id): Article
    {
        // Get the article from the database by ID
        $query = "SELECT article_id, article_slug, article_title, article_content, article_date, article_categories FROM articles WHERE article_visibility = 'public' AND article_id = :article_id";
        $params = array(':article_id' => $article_id);
        $result = Database::prepare($query, $params, 'AsaP\Entities\Article');

        return $result[0];
    }

    public static function getPublicArticlesByPostDate() : array
    {
        $query = "SELECT article_id, article_slug, article_title, article_content, article_date, article_categories FROM articles WHERE article_visibility = 'public' ORDER BY article_date DESC";
        $result = Database::prepare($query, [], 'AsaP\Entities\Article');

        return $result;
    }

    public static function getAllArticlesButExcept(int $article_id) : array
    {
        // Get other articles from the database to display in the sidebar
        $query = "SELECT article_id, article_slug, article_title, article_content, article_date, article_categories FROM articles WHERE article_visibility = 'public' AND article_id <> :article_id ORDER BY article_date DESC LIMIT 6";
        $params = array(':article_id' => $article_id);
        $result = Database::prepare($query, $params, 'AsaP\Entities\Article');

        return $result;
    }
    

}