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
    $way = new Way();
    $ways = $way-> search($_POST['date']);
    if (empty($ways)) {
      echo "<div class='alert alert-danger' role='alert'>Désolé, aucun trajet n'est disponible pour l'instant.</div>";
      require ('view/frontend/welcome.php');
    }
    else {
      // Pour le premier trajet et sa distance de point de départ
      $ad1 = $ways[0]->starting_point();
      $address1 = $way-> getPoints($ad1);
      $ad2 = $_POST['starting_point'];
      $address2 = $way-> getPoints($ad2);
      // Puis calcul de la distance entre les deux points
      $result1 = $way-> distance($address1['lat'], $address1['lng'], $address2['lat'], $address2['lng']).' Km';

      $ad3 = $ways[0]->destination();
      $address3 = $way-> getPoints($ad3);
      $ad4 = $_POST['destination'];
      $address4 = $way-> getPoints($ad4);
      // Puis calcul de la distance entre les deux points
      $result2 = $way-> distance($address3['lat'], $address3['lng'], $address4['lat'], $address4['lng']).' Km';
      $final_result = $result1 + $result2;
      // Faire cela pour chaque trajet
      // Les enregistrer dans un tableau de résultat
      // Les afficher par distance en km croissante
      require ('view/backend/way/results.php');
    }
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
    $test = $way->create(htmlspecialchars($driver->id()), ($_POST['starting_point']), ($_POST['destination']), ($_POST['car']), ($_POST['date']), ($_POST['time_start']), ($_POST['time_arrival']));
    header('Location: index.php?admin=management_way');
  }

  public function management_way()
  {
    $way = new Way();
    $listWay = $way -> listWay($_SESSION['id']);
    require ('view/backend/way/management_way.php');
  }

  public function read_way()
  {
    $way = new Way();
    $way = $way -> get($_GET['id']);
    $user = new User();
    $driver = $user ->get($way->driver());
    // var_dump($way->passenger_1());
    if ($way->passenger_1()) {
      $passenger = $user ->get($way->passenger_1());
      $passenger_name = $passenger->name();
      $passenger_surname = $passenger->surname();
      // var_dump($passenger);
      // var_dump($passenger_name);
      // var_dump($passenger_surname);
    }
    else {
      $passenger_name = '';
      $passenger_surname = '';
    }
    require ('view/backend/way/resume.php');
  }

  public function update_way()
  {
    $way = new Way();
    $way = $way -> get($_GET['id']);
    $user = new User();
    $driver = $user-> get($way->driver());
    require ('view/backend/way/update_way.php');
  }

  public function update_way_post()
  {
    $way = new Way();
    $way = $way -> get($_GET['id']);
    $status = $way->status();
    $driver = $way->driver();
    $passenger = $way->passenger();
    $passenger_1 = $way->passenger_1();
    $passenger_2 = $way->passenger_2();
    $passenger_3 = $way->passenger_3();
    $passenger_4 = $way->passenger_4();
    $passenger_5 = $way->passenger_5();
    $passenger_6 = $way->passenger_6();

    $test = $way -> update($_GET['id'], $status, $driver, $passenger, $_POST['starting_point'],
    $_POST['destination'],$_POST['car'],$_POST['date'],$_POST['time_start'],$_POST['time_arrival'],
    $passenger_1, $passenger_2, $passenger_3, $passenger_4, $passenger_5, $passenger_6 );

    header('Location: index.php?admin=management_way');
  }

  public function delete_way()
  {
    $way = new Way();
    $way = $way -> delete($_GET['idWayDelete']);
    header('Location: index.php?admin=management_way');
  }

  public function booking()
  {
    $way = new Way();
    $way = $way -> get($_GET['id']);
    $user = new User();
    $passenger = $user -> get($_SESSION['id']);
    $booking = $way -> booking($_GET['id'], $_SESSION['id']);
    header('Location: index.php?admin=management_way');
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
    $user = new User();
    $you = $user->get($_SESSION['id']);
    require ('view/backend/account/account_management.php');
  }

  public function update_account()
  {
    if (!is_string($_POST['name']) || empty($_POST['name']) || !is_string($_POST['surname']) || empty($_POST['surname']) || !is_string($_POST['email']) || empty($_POST['email']) || !is_string($_POST['password']) ||
    empty($_POST['password']) || ( ($_POST['password']) != ($_POST['password2']) ) )
    {
      echo "<div class='alert alert-danger' role='alert'>Merci de vérifier vos informations.</div>";
      require ('view/frontend/account/registration.php');
    }
    else {
      $user = new User();
      $user->update($_SESSION['id'],$_POST['name'],$_POST['surname'],$_POST['password'],$_POST['email']);
      var_dump($_POST);
      // header('Location: index.php?admin=my_account');
    }
  }

  public function my_account()
  {
    $user = new User();
    $you = $user->get($_SESSION['id']);
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
