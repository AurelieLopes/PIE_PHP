<?php

namespace Model;

class UserModel
{
    private $email;
    private $password;

    public function __construct()
    {
        var_dump($_POST);
        $this->connexion = new \PDO('mysql:host=localhost:8889; dbname=cake_php', 'root', 'root');
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function save()
    {
        if (!empty($_POST)) {
            extract($_POST);
            $valid = true;
            $email = htmlentities(trim($email));
            $password = htlmlentities(trim($password));

            if (empty($email)) {
                $valid = false;
                $erreur_email = 'Veuillez remplir ce champ';
            }
            if (empty($password)) {
                $valid = false;
                $erreur_password = 'Le mot de passe ne peut être laissé vide';
            }

            if ($valid) {
                $query = $this->connexion->prepare("INSERT INTO users(email, password) VALUE ('$this->email' , '$this->password')");
                $query->execute();
                echo "Bravo vous êtes incrit";
            } else {
                echo " Sorry tu t'es planté dans l'inscription";
            }
        }
    }

    public function loginAction()
    {
        session_start();
        $_SESSION['email'] = $this->email;
        $_SESSION['password'] = $this->password;
        $req = $this->connexion->prepare("SELECT email, password FROM users");
        $req->execute();
    }
}