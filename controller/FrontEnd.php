<?php

/**
*
*/
class frontend
{

  public function home()
  {
    // $posts = new Posts();
    // $comments = new Comments();
    // $listPosts = $posts->getListPosts();
    // $post = $posts->getFirstPost();
    // $comments = $comments->getComments($post->title());
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
      echo "<div class='alert alert-danger' role='alert'>Merci de vérifier vos informations.</div>";
      require ('view/frontend/account/registration.php');
    }
    else {
      $user = new User();
      var_dump($user);
      var_dump($_POST);
      $correct = $user->checkEmail($_POST['email']);
      if (!$correct) {
        $user->create(htmlspecialchars($_POST['name']), ($_POST['surname']), ($_POST['password']), ($_POST['email']));
        header('Location: index.php');
      }
      else {
        echo "<div class='alert alert-danger' role='alert'>Cet e-mail est déjà utilisée.</div>";
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



  // public function newcomment()
  // {
  //   if (!is_string($_POST['pseudo']) || empty($_POST['pseudo']) || !is_string($_POST['message']) || empty($_POST['message']))
  //   {
  //     echo "<div class='alert alert-danger' role='alert'>Merci de vérifier votre pseudo ou votre message.</div>";
  //     header('Location: index.phps');
  //   }
  //   else {
  //     $posts = new Posts();
  //     $comments = new Comments();
  //     $correct = $posts-> existPost($_POST['PostClick']);
  //     if (!$correct)
  //     {
  //       echo "<div class='alert alert-danger' role='alert'>Merci de vérifier votre pseudo ou votre message.</div>";
  //       require ('view/frontend/chapterdisplay.php');
  //     }
  //     else {
  //       $comments->addcomments(htmlspecialchars($_POST['titleChapter']),htmlspecialchars($_POST['pseudo']),htmlspecialchars($_POST['message']));
  //     }
  //   }
  // }
  //
  // public function notifyComments()
  // {
  //   $comments = new Comments();
  //   $correct = $comments-> existComment($_POST['IDComment']);
  //   if (!$correct)
  //   {
  //     echo "<div class='alert alert-danger' role='alert'>Nous avons un problème, merci de recommencer votre signalement.</div>";
  //     require ('view/frontend/chapterdisplay.php');
  //   }
  //   else
  //   {
  //     $displayReport = $comments->displayreportcomment($_POST['IDComment']);
  //     $comments->updatereportcomment($displayReport, $_POST['IDComment']);
  //   }
  // }
  //
  // public function connection()
  // {
  //   require ('view/frontend/connection.php');
  // }
}
