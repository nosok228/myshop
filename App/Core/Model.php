<?php

namespace App\Core;

use App\Lib\DB;

class Model
{
    public $db;

    public function __construct()
    {
        $this->db = new DB();
    }
    
}