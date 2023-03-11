<?php

namespace AsaP\Entities;

class Category
{
    // Declare properties
    public $category_id;
    public $category_name;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->category_id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->category_id = $id;

        return $this;
    }

    /**
     * Get the valuename
     */
    public function getName()
    {
        return $this->category_name;
    }

    /**
     * Set the valuename
     *
     * @return  self
     */
    public function setName($category_name)
    {
        $this->category_name = $category_name;

        return $this->category_name;
    }
}