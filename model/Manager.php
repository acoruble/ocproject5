<?php

class Manager
{
  protected function dbConnect()
  {
    try {
      // $db = new PDO('mysql:host=db5000049182.hosting-data.io;dbname=dbs44052;charset=utf8', 'dbu121080', 'Lisaume14*');
      $db = new PDO('mysql:host=localhost;dbname=ocproject5;charset=utf8', 'root', '');
      return $db;
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
  }
}
