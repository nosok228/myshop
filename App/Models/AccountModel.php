<?php

namespace App\Models;

use App\Core\Model;

class AccountModel extends Model
{
    public static function checkUserAuth()
    {
        if(isset($_SESSION['user'])) {
            return true;
        }
    }
}