<?php

namespace Model;

use Core\Database;

class UserModel
{
    private $email;
    private $password;

    private $sql;

    public function __construct()
    {
        $this->sql = new Database();
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword($password)
    {
        $this->password = $password;
    }

    public function getEmail($email)
    {
        $this->email = $email;
    }

    public function save()
    {
        $crypted_pwd = password_hash($this->password, PASSWORD_BCRYPT);
        $query = $this->sql->connexion->prepare("INSERT INTO users (email, password) VALUES (:email , :password)");
        $query->bindParam(':email', $this->email);
        $query->bindparam(':password', $crypted_pwd);
        $query->execute();
        $query->closeCursor();
    }

    public function create()
    {
        $crypted_pwd = password_hash($this->password, PASSWORD_BCRYPT);
        $query = $this->sql->connexion->prepare("INSERT INTO users (email, password) VALUES (:email , :password)");
        $query->bindParam(':email', $this->email);
        $query->bindparam(':password', $crypted_pwd);
        $query->execute();
        $user = $this->sql->connexion->lastInsertId();
        $query->closeCursor();
        return $user;
    }

    public function read($id)
    {
        $query = $this->sql->connexion->prepare("SELECT id, email FROM users WHERE id = :id");
        $query->bindParam('id', $id);
        $query->execute();
        $req = $query->fetch();
        $query->closeCursor();
        return $req;
    }

    public function read_all()
    {
        $query = $this->sql->connexion->prepare("SELECT id, email FROM users");
        $query->execute();
        $req = $query->fetchAll();
        $query->closeCursor();
        return $req;
    }

    public function update($id)
    {
        $query = $this->sql->connexion->prepare("UPDATE user SET email = :email, password = :pass WHERE id = :id");
        $query->bindParam('id', $id);
        $query->execute();
        $query->closeCursor();
    }

    public function delete($id)
    {
        $query = $this->sql->connexion->prepare("DELETE FROM users WHERE id = ?");
        $query->bindParam('id', $id);
        $query->execute();
        $query->closeCursor();
    }

    public function login()
    {
        $req = $this->sql->connexion->prepare("SELECT id,password FROM users WHERE email = ?");
        $req->execute([$this->email]);
        $res = $req->fetch();
        $req->closeCursor();
        if (empty($res)) {
            return 'Le mail indiqué n\'existe pas';
        } else {
            if (password_verify($this->password, $res['password'])) {
                echo "Bienvenue, vous êtes connecté !";
            } else {
                echo 'Mot de passe invalide';
            }
        }
    }
}