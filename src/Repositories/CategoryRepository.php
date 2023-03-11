<?php
namespace AsaP\Repositories;

use AsaP\Utils\Database;
use AsaP\Entities\Category;

class CategoryRepository 
{

    public static function getCategory(int $category_id): Category
    {
        // Get the article from the database by ID
        $query = "SELECT category_id, category_name FROM categories WHERE category_id = :category_id";
        $params = array(':category_id' => $category_id);
        $result = Database::prepare($query, $params, 'AsaP\Entities\Category');

        return $result[0];
    }

    public static function getCategories() : array
    {
        $query = "SELECT category_id, category_name FROM categories ORDER BY category_name ASC";
        $result = Database::prepare($query, [], 'AsaP\Entities\Category');

        return $result;
    }

}