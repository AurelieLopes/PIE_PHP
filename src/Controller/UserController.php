<?php

namespace Controller;

use Core\Controller as Controller;

class UserController extends Controller
{
    public function addAction()
    {
        $this->render("register");
        $model = new \Model\UserModel();
        $model->save();
    }

    public function registrerAction()
    {
        $this->render("register");

        $model = new \Model\UserModel();
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            if ($_POST['password'] !== '' && $_POST['email'] !== '') {
                $model->setPassword($_POST['password']);
                $model->setEmail($_POST['email']);
                $model->save();
            }
        }
    }

    public function loginAction()
    {
        $model = new \Model\UserModel();
        echo "pass";
        $this->render("login");
    }
}