<?php

require_once("Manager.php");

class UserManager extends Manager
{

  public function check($email, $password)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT password FROM people WHERE Email = ?');
    $req->execute(array($email));
    $resultat = $req->fetch();
    $isPasswordCorrect = password_verify($password, $resultat['password']);
    return $isPasswordCorrect;
  }

  public function checkEmail($email)
  {
    $db = $this->dbConnect();
    $exist = $db->prepare('SELECT email FROM people WHERE Email = ?');
    $exist->execute(array($email));
    $correct = $exist->fetch();
    return $correct;
  }

  public function connection($email, $password)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT id, name FROM people WHERE Email = ?');
    $req->execute(array($email));
    $resultat = $req->fetch();
    return $resultat;
  }

  public function log_out()
  {
    session_destroy();
  }

  public function create($name,$surname,$password,$email)
  {
    $db = $this->dbConnect();
    $createUser = $db->prepare('INSERT INTO people(Name, Surname, Password, Email, Average) VALUES(:Name, :Surname, :Password, :Email, :Average)');
    $createUser -> execute(array(
      'Name' => $name,
      'Surname' => $surname,
      'Password' => $pass_hache,
      'Email' => $email,
      'Average' => null,
        ));
  }

  public function get($id)
  {
    $db = $this->dbConnect();
    $userById = $db->prepare('SELECT * FROM people WHERE ID = ?');
    $userById->execute(array($id));
    $data = $userById->fetch();
    return new User($data);
  }

  public function update($id,$name,$surname,$password,$email,$average) {
    $db = $this->dbConnect();
    $update = $db->prepare('UPDATE people SET Name = :Name, Surname = :Surname, Password = :Password, Email = :Email, Average = :Average WHERE ID = :id');
    $update->execute(array(
      'Name' => $name,
      'Surname' => $surname,
      'Password' => $password,
      'Email' => $email,
      'id' => $id,
      'Average'=>$average,
    ));
  }

  public function update_average($id,$average) {
    $db = $this->dbConnect();
    $update = $db->prepare('UPDATE people SET Average = :Average WHERE ID = :id');
    $update->execute(array(
      'id' => $id,
      'Average'=>$average,
    ));
  }

  public function delete($id) {
    $db = $this->dbConnect();
    $delete= $db->prepare('DELETE FROM people WHERE ID=?');
    $delete->execute(array($id));
  }

}
