<?php

/**
*
*/
class backend
{
  public function session()
  {
    if (!is_string($_POST['email']) || empty($_POST['email']) || (!is_string($_POST['password']) || empty($_POST['password'])) )
    {
      echo "<div class='alert alert-danger' role='alert'>E-mail ou mot de passe invalide.</div>";
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
        echo "<div class='alert alert-danger' role='alert'>Pseudo ou mot de passe invalide.</div>";
        require ('view/frontend/account/connection.php');
      }
    }
  }

  public function results()
  {
    require ('view/backend/way/results.php');
  }

  // public function connection_post()
  // {
  //   require ('view/backend/account/my_account.php');
  // }

  public function new_way()
  {
    $user = new User();
    $fullname = $user-> get($_SESSION['id']);
    require ('view/backend/way/new_way.php');
  }

  public function new_way_post()
  {
    $user = new User();
    $driver = $user -> get($_SESSION['id']);
    $way = new Way();
    $way->create(htmlspecialchars($driver->id()), ($_POST['starting_point']), ($_POST['destination']), ($_POST['car']), ($_POST['date']), ($_POST['time_start']), ($_POST['time_arrival']));
    header('Location: index.php?action=management_way');
  }

  public function management_way()
  {
    $way = new Way();
    $listWay = $way -> listWay($_SESSION['id']);
    require ('view/backend/way/management_way.php');
  }

  public function update_way()
  {
    $way = new Way();
    $way_update = $way -> get($_GET['id']);
    $user = new User();
    $fullname = $user-> get($_SESSION['id']);
    require ('view/backend/way/update_way.php');
  }

  public function review_driver()
  {
    require ('view/backend/way/review_driver.php');
  }

  public function review_passenger()
  {
    require ('view/backend/way/review_passenger.php');
  }

  public function account_management()
  {
    require ('view/backend/account/account_management.php');
  }

  public function my_account()
  {
    require ('view/backend/account/my_account.php');
  }

  public function log_out()
  {
    $user = new User();
    $user->log_out();
  }


//
//   public function displaycreate()
//   {
//       require ('view/backend/createpost.php');
//   }
//
//   public function create()
//   {
//     if (!is_string($_POST['title']) || empty($_POST['title']) || !is_string($_POST['content']) || empty($_POST['content']))
//     {
//       echo "<div class='alert alert-danger' role='alert'>Merci de vérifier votre titre et votre texte.</div>";
//       require ('view/backend/createpost.php');
//     }
//     else {
//       $posts = new Posts();
//       $posts->createPost(htmlspecialchars($_POST['title']),$_POST['content']);
//       header('Location: index.php?admin=board');
//     }
//   }
//
//   public function delete()
//   {
//     $posts = new Posts();
//     $correct = $posts-> existPost($_GET['idChapterDelete']);
//     if (!$correct)
//     {
//       header('Location: index.php?admin=board');
//       echo "<div class='alert alert-danger' role='alert'>Nous avons un problème, merci de recommencer votre suppression.</div>";
//     }
//     else
//     {
//       $posts->delete($_GET['idChapterDelete']);
//     }
//   }
//
//   public function update()
//   {
//     $posts = new Posts();
//     $correct = $posts-> existPost($_GET['id']);
//     if (!$correct)
//     {
//       header('Location: index.php?admin=board');
//       echo "<div class='alert alert-danger' role='alert'>Merci de sélectionner un chapitre.</div>";
//     }
//     else
//     {
//       $post = $posts-> getPosts($_GET['id']);
//       require ('view/backend/updatepost.php');
//     }
//   }
//
//   public function postupdate()
//   {
//     $posts = new Posts();
//     $correct = $posts-> existPost($_POST['id']);
//     if (!$correct)
//     {
//       echo "<div class='alert alert-danger' role='alert'>Merci de sélectionner un chapitre.</div>";
//     }
//     else
//     {
//     $posts-> update($_POST['id'], $_POST['title'], $_POST['content']);
//     }
//   }
//
//   public function control()
//   {
//       $posts = new Posts();
//       $correct = $posts-> existPost($_GET['id']);
//       if (!$correct)
//       {
//         echo "<div class='alert alert-danger' role='alert'>Merci de sélectionner un chapitre.</div>";
//       }
//       else
//       {
//         $comments = new Comments();
//         $listComments = $comments->getComments($_GET['titleChapter']);
//         require ('view/backend/controlcomments.php');
//       }
//   }
//
//   public function deletecomment()
//   {
//     $comments = new Comments();
//     $correct = $comments-> existComment($_GET['id']);
//     if (!$correct)
//     {
//       echo "<div class='alert alert-danger' role='alert'>Nous avons un problème, merci de recommencer votre signalement.</div>";
//     }
//     else
//     {
//       $comment = new Comments();
//       $comment->delete($_GET['id']);
//     }
//   }
//
//   public function logout()
//   {
//     $user = new User();
//     $user->logout();
//   }
}
