<?php
namespace Core;
use PDO;
class Database{ 
  public $connexion;
  
  public function __construct()
  {
    try
    {
      $this->connexion = new PDO('mysql:host=localhost:8889; dbname=cake_php; charset=utf8', 'root', 'root');
      echo "blabla";
      
    } catch (Exception $e) {
      echo "echec";
      die('Erreur:' . $e->getMessage());
     
    }
    
  }
}