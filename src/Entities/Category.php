<?php

namespace AsaP\Entities;

class Category
{
    // Declare properties
    public int $category_id;
    public string $category_name;

    /**
     * Get the value of id
     */
    public function getId() : int
    {
        return $this->category_id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id) : void
    {
        $this->category_id = $id;
    }

    /**
     * Get the valuename
     */
    public function getName() : string
    {
        return $this->category_name;
    }

    /**
     * Set the valuename
     *
     * @return  self
     */
    public function setName($category_name) : void
    {
        $this->category_name = $category_name;
    }
}