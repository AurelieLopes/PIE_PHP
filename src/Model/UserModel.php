<?php

namespace Model;
use Core\Database;

class UserModel
{
    private $email;
    private $password;

    /* public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    } */

    public function save()
    {
        $sql = new Database();
        $query = $sql->connexion->prepare("INSERT INTO users (email, password) VALUES (:email , :password)");
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query->bindParam(':email', $email);
        $query->bindparam(':password',$password);
        $query->execute();
       var_dump($query->errorInfo());

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