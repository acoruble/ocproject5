<?php

/**
*
*/
class backendReview
{
  public function review_driver()
  // pour laisser un avis : il doit y avoir des passagers et il ne doit pas y avoir déjà un avis de déposé
  {
    $way = new Way();
    $way = $way -> get($_GET['id']);
    $user = new User();
    $user = $user -> get($_SESSION['id']);
    $driver = $user-> get($way->driver());
    $nb_passenger = $way->passenger();
    $passengers = [];

    if ($nb_passenger == 0)
    // || review = 1;
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
  // pour envoyer l'avis : tous les champs doivent être remplis
  {
    $way = new Way();
    $way = $way -> get($_GET['driver_id']);
    $user = new User();
    $user = $user -> get($_SESSION['id']);

    // if (!is_string($_POST['title']) || empty($_POST['title']) || !is_string($_POST['content']) || empty($_POST['content']))
    // {
    //   echo "<div class='alert alert-danger' role='alert'>Merci de vérifier votre titre et votre texte.</div>";
    //   require ('view/backend/createreview.php');
    // }
    // else {
      $review = new Review();
      var_dump($_GET);
      var_dump($_POST);
      $review->createReview($_GET['driver_id'],$_GET['way_id'],$_POST['target'],$_POST['rating'],$_POST['content']);
      // + htmlspecialchars !!!
      // header('Location: index.php?admin=board');
    // }
  }
  public function review_passenger()
  {
    require ('view/backend/review/review_passenger.php');
  }


}
