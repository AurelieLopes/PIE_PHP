<?php

namespace Model;

class UserModel
{
    private $email;
    private $password;

  /*   public function Save($email, $password)
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
                $query = "INSERT INTO users( email, password) VALUE (:email,:password)";
                $resp = $this->bdd->prepare($query);
                $resp->bindParam(':email', $email, PDO::PARAM_STR);
                $resp->bindParam(':password', $password, PDO::PARAM_STR);
                $resp->execute();
            }
        }

    } */

}