<?php

/**
*
*/
class backendUser
{
  public function session()
  {
    if (!is_string($_POST['email']) || empty($_POST['email']) || (!is_string($_POST['password']) || empty($_POST['password'])) )
    {
      echo "<div class='alert alert-danger text-center' role='alert'>E-mail ou mot de passe invalide.</div>";
      require ('view/frontend/account/connection.php');
    }
    else {
      $user = new User();
      $correct = $user->check($_POST['email'], $_POST['password']);
      if ($correct) {
        $user = $user->connection($_POST['email'], $_POST['password']);
        $_SESSION['id'] = $user['id'];
        $_SESSION['nom'] = $user['name'];
        header('Location: index.php?admin=my_account');
      }
      else {
        echo "<div class='alert alert-danger text-center' role='alert'>Pseudo ou mot de passe invalide.</div>";
        require ('view/frontend/account/connection.php');
      }
    }
  }

  public function account_management()
  {
    $user = new User();
    $you = $user->get($_SESSION['id']);
    require ('view/backend/account/account_management.php');
  }

  public function update_account()
  {
    if (!is_string($_POST['name']) || empty($_POST['name']) || !is_string($_POST['surname']) || empty($_POST['surname']) || !is_string($_POST['email']) || empty($_POST['email']) || !is_string($_POST['password']) ||
    empty($_POST['password']) || ( ($_POST['password']) != ($_POST['password2']) ) )
    {
      echo "<div class='alert alert-danger text-center' role='alert'>Merci de vérifier vos informations.</div>";
      require ('view/frontend/account/registration.php');
    }
    else {
      $user = new User();
      $average = $user->average();

      $id = htmlspecialchars($_SESSION['id']);
      $name = htmlspecialchars($_POST['name']);
      $surname = htmlspecialchars($_POST['surname']);
      $password = htmlspecialchars($_POST['password']);
      $password_hash = password_hash($password, PASSWORD_DEFAULT);
      $email = htmlspecialchars($_POST['email']);
      $user->update($id,$name,$surname,$password_hash,$email,$average);
      header('Location: index.php?admin=my_account');
    }
  }

  public function my_account()
  {
    $user = new User();
    $you = $user->get($_SESSION['id']);
    $review = new Review();
    $reviews = $review->getReview($_SESSION['id']);
    $average = $you->average();
    if ($average === null) {
      $average = "Pas encore d'avis reçu ! </br>";
    }
    require ('view/backend/account/my_account.php');
  }

  public function other_account()
  {
    $user = new User();
    $you = $user->get($_GET['id']);
    $review = new Review();
    $reviews = $review->getReview($_GET['id']);
    $average = $you->average();
    if ($average === null) {
      $average = "Pas encore d'avis reçu ! </br>";
    }
    require ('view/backend/account/my_account.php');
  }

  public function log_out()
  {
    $user = new User();
    $user->log_out();
  }
}
