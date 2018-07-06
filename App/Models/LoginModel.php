<?php

namespace App\Models;

use App\Core\Model;

class LoginModel extends Model
{
    public function checkEmailAndPassword($email, $password)
    {
        
        $user = $this->db->row("SELECT * FROM users WHERE email = :email", ['email' => $email]);
        $result = password_verify($password, $user[0]['password']);

        if($result) {
            return $user[0];
        }
        return false;
    }
}