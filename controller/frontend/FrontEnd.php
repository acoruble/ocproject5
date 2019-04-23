<?php

/**
*
*/
class frontend
{

  public function home()
  {
    require ('view/frontend/welcome.php');
  }

  public function registration()
  {
    require ('view/frontend/account/registration.php');
  }

  public function registration_post()
  {
    if (!is_string($_POST['name']) || empty($_POST['name']) || !is_string($_POST['surname']) || empty($_POST['surname']) || !is_string($_POST['email']) || empty($_POST['email']) || !is_string($_POST['password']) ||
    empty($_POST['password']) || ( ($_POST['password']) != ($_POST['password2']) ) )
    {
      echo "<div class='alert alert-danger text-center' role='alert'>Merci de vérifier vos informations.</div>";
      require ('view/frontend/account/registration.php');
    }
    else {
      $user = new User();
      $correct = $user->checkEmail($_POST['email']);
      if (!$correct) {
        $name = htmlspecialchars($_POST['name']);
        $surname = htmlspecialchars($_POST['surname']);
        $password = htmlspecialchars($_POST['password']);
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $email = htmlspecialchars($_POST['email']);
        $user->create($name,$surname,$password,$email);
        header('Location: index.php');
      }
      else {
        echo "<div class='alert alert-danger text-center' role='alert'>Cet e-mail est déjà utilisé.</div>";
        require ('view/frontend/account/registration.php');
      }
    }
  }

  public function connection()
  {
    require ('view/frontend/account/connection.php');
  }

  public function contact()
  {
    require ('view/frontend/other/contact.php');
  }

  public function CGU()
  {
    require ('view/frontend/other/CGU.php');
  }

  public function FAQ()
  {
    require ('view/frontend/other/FAQ.php');
  }

  public function mentions_legales()
  {
    require ('view/frontend/other/mentions_legales.php');
  }

  public function qui_suis_je()
  {
    require ('view/frontend/other/qui_suis_je.php');
  }

}
