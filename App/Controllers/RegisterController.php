<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\RegisterModel;
use App\Models\AccountModel;


class RegisterController extends Controller
{
    public function registerFormAction()
    {
        if(AccountModel::checkUserAuth()) {
            $this->view->redirect('/');
        }

        $this->view->render('auth/register', [], 'test');
    }

    public function registerAction()
    {
        if(AccountModel::checkUserAuth()) {
            $this->view->redirect('/');
        }

        $registerModel = new RegisterModel();

        if($registerModel->checkLengthLogin($_POST['login']) == false) {
            $this->view->message('Длина логина должна быть не меньше 4 символов');
            $this->view->redirect('/register');
            die;
        }

        if($registerModel->checkLengthPassword($_POST['password']) == false) {
            $this->view->message('Длина пароля должна быть не меньше 6 символов');
            $this->view->redirect('/register');
            die;
        }

        if($registerModel->comparePassword($_POST['password'], $_POST['password_confirm']) == false) {
            $this->view->message('Пароли не совпадают');
            $this->view->redirect('/register');
            die;
        }

        if($registerModel->getUserByEmail($_POST['email'])) {
            $this->view->message('Этот email уже занят');
            $this->view->redirect('/register');
            die;
        }

        if($registerModel->getUserByLogin($_POST['login'])) {
            $this->view->message('Этот логин уже занят');
            $this->view->redirect('/register');
            die;
        }

        if($registerModel->register($_POST['email'], $_POST['login'], $_POST['password'])) {
            $this->view->message('Вы успешно зарегестрировались. Потвердите свой email');
            $this->view->redirect('/');
            die;
        }
        else {
            $this->view->message('Произошла ошибка при регистрации. Повторите попытку позже');
            $this->view->redirect('/');
            die;
        }

        return true;
    }

    public function activateAction($token)
    {
        $registerModel = new RegisterModel();

        $user = $registerModel->getUserByToken($token);

        if(!$user) {
            $this->view->sendResponce(404);
        }
        if($user['status'] == 1) {
            $this->view->message('Аккаунт уже активирован');
            $this->view->redirect('/cabinet');
            die;
        }

        if($registerModel->confirmAccount($user['id'])) {
            $this->view->message('Ваш аккаунт успешно активирован');
            $this->view->redirect('/cabinet');
            die;
        }
        else {
            $this->view->message('Произошла ошибка попробуйте позже');
            $this->view->redirect('/');
            die;
        }

        var_dump($user);

        return true;
    }
}