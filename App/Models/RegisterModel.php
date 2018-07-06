<?php

namespace App\Models;

use App\Core\Model;

class RegisterModel extends Model
{
    public function checkLengthLogin($login)
    {
        if(strlen($login) >= 4) {
            return true;
        }

        return false;
    }

    public function checkLengthPassword($password)
    {
        if(strlen($password) >= 6) {
            return true;
        }

        return false;
    }

    public function comparePassword($password, $password_confirm)
    {
        if($password === $password_confirm) {
            return true;
        }
        return false;
    }

    public function getUserByEmail($email)
    {
        $user = $this->db->row("SELECT id FROM users WHERE email = :email", ['email' => $email]);

        return $user[0];
    }

    public function getUserByLogin($login)
    {
        $user = $this->db->row("SELECT id FROM users WHERE login = :login", ['login' => $login]);

        return $user[0];
    }

    public function register($email, $login, $password)
    {
        $cryptPassword = password_hash($password, PASSWORD_BCRYPT);
        $result = $this->db->query("INSERT INTO users(email, login, password, confirmed) 
        VALUES(:email, :login, :password, :confirmed)", ['email' => $email, 'login' => $login, 'password' => $cryptPassword, 'confirmed' => sha1($email)]);

        if($result) {
            mail($email, 'Регистрация на сайте', 'Потвердите сообщение на сайте: eshop.loc/activate/'.sha1($email));
            return true;
        }
        return false;
    }

    public function getUserByToken($token)
    {
        $user = $this->db->row("SELECT * FROM users WHERE confirmed = :confirmed", ['confirmed' => $token]);

        return $user[0];
    }

    public function confirmAccount($id)
    {
       return $this->db->query("UPDATE users SET confirmed = 'Yes', status = 1 WHERE id = :id", ['id' => $id]);
    }
}