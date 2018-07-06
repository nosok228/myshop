<?php

namespace App\Models;

use App\Core\Model;

class ProductModel extends Model
{
    public function getAllProducts()
    {
        return $this->db->row("SELECT * FROM products");
    }

    public function getAllCategories()
    {
        return $this->db->row("SELECT * FROM categories");
    }

    public function getProductsByCategoryId($id)
    {
        return $this->db->row("SELECT * FROM products WHERE category_id = :category_id", ['category_id' => $id]);
    }

    public function getProductById($id)
    {
        $product = $this->db->row("SELECT * FROM products WHERE id = :id", ['id' => $id]);

        return $product[0];
    }

    public function getProductByName($name)
    {
        return $this->db->row("SELECT * FROM products WHERE title LIKE '%$name%'");
    }
}