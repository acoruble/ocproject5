<?php

/**
*
*/
class backendReview
{
  public function review_driver()
  {
    $way = new Way();
    $way = $way -> getById($_GET['id']);
    $user = new User();
    $user = $user -> get($_SESSION['id']);
    $driver = $user-> get($way->driver());
    $nb_passenger = $way->passenger();
    $passengers = [];

    if ($nb_passenger == 0)
    {
      echo "<div class='alert alert-danger' role='alert'>Il n'y a personne à noter.</div>";
      require ('view/frontend/welcome.php');
    } else {
      for ($i=1; $i <=$nb_passenger ; $i++) {
        $passenger_id = "passenger_$i";
        $passenger_id = $way->$passenger_id();
        $user = new User();
        $user_passenger = $user -> get($passenger_id);
        $passenger_name = $user_passenger->name();
        $passengers[$passenger_id] = $passenger_name;
      }
      require ('view/backend/review/review_driver.php');
    }
  }

  public function review_driver_post()
  {
    if (!is_string($_POST['target']) || empty($_POST['target']) || !is_string($_POST['target']) || empty($_POST['target']) || !is_string($_POST['content']) || empty($_POST['content']))
    {
      echo "<div class='alert alert-danger' role='alert'>Merci de vérifier votre titre et votre texte.</div>";
    }
    else {
    $way = new Way();
    $ways = $way -> getByDriver($_GET['driver_id']);
    $user = new User();
    $user = $user -> get($_SESSION['id']);
    $review = new Review();
    $exist = $review->existReview($_GET['way_id']);
    if ($exist) {
      echo "<div class='alert alert-danger' role='alert'>Vous avez déjà donné votre avis à cette personne sur ce trajet.</div>";
    }   else {
      $author = htmlspecialchars($_GET['driver_id']);
      $way_id = htmlspecialchars($_GET['way_id']);
      $target = htmlspecialchars($_POST['target']);
      $rating = htmlspecialchars($_POST['target']);
      $content = htmlspecialchars($_POST['content']);
      $review->createReview($author, $way_id, $target, $rating, $content);
      header('Location: index.php');
    }
  }

  }
  public function review_passenger()
  {
    require ('view/backend/review/review_passenger.php');
  }


}
