<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\LoginModel;
use App\Models\AccountModel;


class LoginController extends Controller
{
    public function loginAction()
    {
        if(AccountModel::checkUserAuth()) {
            $this->view->redirect('/');
        }
        $loginModel = new LoginModel();

        $user = $loginModel->checkEmailAndPassword($_POST['email'], $_POST['password']);

        if(!$user) {
            $this->view->message('Неправельный логин или пароль');
            $this->view->redirect('/');
            die;
        }

        $_SESSION['user']['id'] = $user['id'];
        $_SESSION['user']['login'] = $user['login'];
        $_SESSION['user']['email'] = $user['email'];

        $this->view->message('Вы успешно вошли');
        $this->view->redirect('/');

        return true;
    }

    public function logOutAction()
    {
        session_destroy();
        $this->view->redirect('/');
    }
}