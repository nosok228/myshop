<?php

namespace App\Models;

use App\Core\Model;

class MerchantModel extends Model
{
    public function getCartProducts()
    {
        $products = [];

        foreach($_SESSION['products'] as $key => $value) {
            $result = $this->db->row("SELECT * FROM products where id = :id", ['id' => $value]);
            $products[$value] = $result;
        }
        return $products;
    }
}