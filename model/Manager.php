<?php

class Manager
{
  protected function dbConnect()
  {
    try {
      // $bdd = new PDO('mysql:host=db754453329.db.1and1.com;dbname=db754453329;charset=utf8', 'dbo754453329', 'Lisaume14*');
      $db = new PDO('mysql:host=localhost;dbname=ocproject5;charset=utf8', 'root', '');
      return $db;
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
  }
}
