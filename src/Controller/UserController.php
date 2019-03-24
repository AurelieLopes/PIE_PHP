<?php

namespace Controller;

use Core\Controller as Controller;

class UserController extends Controller
{
    public $user;

    public function __construct()
    {
        parent::__construct();
    }

    public function registerAction()
    {
        $model = new \Model\UserModel();
        $this->render("register");

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            if ($_POST['password'] !== '' && $_POST['email'] !== '') {
                $userData = $this->request->getData();
                $model->setPassword($userData['password']);
                $model->setEmail($userData['email']);
                $model->create();
                if ($model->create() == true) {
                    echo ("Vous êtes enregistré !");
                } else {
                    echo ("erreur lors de l'enregistrement");
                }

                header('location:login');
            }
        }
    }

    public function loginAction()
    {
        $model = new \Model\UserModel();
        $this->render("login");

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            if ($_POST['password'] !== '' && $_POST['email'] !== '') {
                $userData = $this->request->getData();
                $model->setPassword($userData['password']);
                $model->setEmail($userData['email']);
                $model->login();

            }
        }
    }

    public function readAllAction()
    {
        $model = new \Model\UserModel();
        $this->render("show");

        var_dump($model->read_all());
    }

}