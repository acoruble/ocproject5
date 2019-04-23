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
    // $nb_passenger = 2;
    $passengers = [];
    if ($nb_passenger == 0)
    {
      echo "<div class='alert alert-danger text-center' role='alert'>Il n'y a personne à noter.</div>";
      require ('view/frontend/welcome.php');
    } else {
      for ($i=1; $i <=$nb_passenger ; $i++) {
        $passenger_id = "passenger_$i";
        $passenger_id = $way->$passenger_id();
        $user = new User();
        if ($passenger_id === 0) {
          break;
        } else {
          $user_passenger = $user -> get($passenger_id);
          $passenger_name = $user_passenger->name();
          $passengers[$passenger_id] = $passenger_name;
        }
      }
      require ('view/backend/review/review_driver.php');
    }
  }

  public function review_driver_post()
  {
    if (!is_string($_POST['target']) || empty($_POST['target']) || !is_string($_POST['target']) || empty($_POST['target']) || !is_string($_POST['content']) || empty($_POST['content']))
    {
      echo "<div class='alert alert-danger text-center' role='alert'>Merci de vérifier votre titre et votre texte.</div>";
    }
    else {
      $way = new Way();
      $ways = $way -> getByDriver($_GET['driver_id']);
      $user = new User();
      $user = $user -> get($_SESSION['id']);
      $review = new Review();
      $author = $review->existReview($_GET['way_id']);
      if ($author[0] === ($_SESSION['id'])) {
        echo "<div class='alert alert-danger text-center' role='alert'>Vous avez déjà donné votre avis à cette personne sur ce trajet.</div>";
        require ('view/frontend/welcome.php');
      }   else {
        $author = htmlspecialchars($_SESSION['id']);
        $way_id = htmlspecialchars($_GET['way_id']);
        $target = htmlspecialchars($_POST['target']);
        $rating = htmlspecialchars($_POST['rating']);
        $content = htmlspecialchars($_POST['content']);
        $review->createReview($author, $way_id, $target, $rating, $content);
        echo "<div class='alert alert-success text-center' role='alert'>Commentaire bien envoyé !</div>";
        require ('view/frontend/welcome.php');
      }
    }

  }
  public function review_passenger()
  {
    $way = new Way();
    $way = $way -> getById($_GET['id']);
    $user = new User();
    $user = $user -> get($_SESSION['id']);
    $driver = $user-> get($way->driver());

    require ('view/backend/review/review_passenger.php');
  }

  public function review_passenger_post()
  {
    if (!is_string($_POST['target']) || empty($_POST['target']) || !is_string($_POST['target']) || empty($_POST['target']) || !is_string($_POST['content']) || empty($_POST['content']))
    {
      echo "<div class='alert alert-danger text-center' role='alert'>Merci de vérifier votre titre et votre texte.</div>";
    }
    else {
      $way = new Way();
      $ways = $way -> getByDriver($_GET['driver_id']);
      $user = new User();
      $user = $user -> get($_SESSION['id']);
      $review = new Review();
      $author = $review->existReview($_GET['way_id']);
      if ($author[0] === ($_SESSION['id'])) {
        echo "<div class='alert alert-danger text-center' role='alert'>Vous avez déjà donné votre avis à cette personne sur ce trajet.</div>";
        require ('view/frontend/welcome.php');
      }   else {
        $author = htmlspecialchars($_SESSION['id']);
        $way_id = htmlspecialchars($_GET['way_id']);
        $target = htmlspecialchars($_POST['target']);
        $rating = htmlspecialchars($_POST['rating']);
        $content = htmlspecialchars($_POST['content']);
        $review->createReview($author, $way_id, $target, $rating, $content);
        echo "<div class='alert alert-success text-center' role='alert'>Commentaire bien envoyé !</div>";
        require ('view/frontend/welcome.php');
      }
    }

  }

  public function moderation()
  {
    $review = new Review();
    $reviews = $review -> getListReview();
    $someReviews = [];

    foreach ($reviews as $review) {
      $id = $review->id();
      $author = $review -> author();
      $target = $review -> target();
      $content = $review -> content();
      $way_id = $review -> way_id();
      $id_review = $review -> id();

      // if ($way->status() == 'Terminé') {

      // if ($way->driver() == $_SESSION['id']) {
      //   $update_or_review_link = "<a href='index.php?admin=review_driver&id=$id' class='btn btn-xs btn-secondary'>Laisser un avis</a>";
      // } else {
      //   $update_or_review_link = "<a href='index.php?admin=review_passenger&id=$id' class='btn btn-xs btn-secondary'>Laisser un avis</a>";
      // }
      // <a class="btn btn-info text-uppercase text-center" href="#">Supprimer</a></td>
      // <a class="btn btn-success text-uppercase" href="#">Valider</a></td>
      // } else {
      //   $update_or_review_link = "<a href='index.php?admin=update_way&id=$id' class='btn btn-xs btn-secondary'>Modifier</a>";
      // }

      $oneReview =
      "<tbody class='text-center'>
      <tr>
      <th>$author</th>
      <td>$target</td>
      <td>$content</td>
      <td><a class='m-1 btn btn-info text-uppercase text-center' href='index.php?admin=delete&id=$id_review'>Supprimer</a>
      <a class='m-1 btn btn-success text-uppercase' href='index.php?admin=validation&id=$id_review'>Valider</a></td>
      <td>$way_id</td>
      </tr>
      ";
      array_push($someReviews, $oneReview);
    }
    require ('view/backend/review/moderation.php');
  }

  public function validation()
  {
    $review = new Review();
    $review -> validation($_GET['id']);
    $review = $review -> get($_GET['id']);
    $new_range = $review -> rating();
    $user = new User();
    $user = $user -> get($review ->target());
    $old_average = $user -> average();
    if ($old_average === null) {
      $new_average = $new_range;
    }
    else {
      $new_average = ($old_average + $new_range)/2;
    }
    $user-> update_average($review ->target(),$new_average);
    echo "<div class='alert alert-danger text-center' role='alert'>Commentaire bien validé :)</div>";
    header('Location: moderation');
  }

  public function delete()
  {
    $review = new Review();
    $review -> delete($_GET['id']);
    echo "<div class='alert alert-danger text-center' role='alert'>Commentaire bien supprimé :/</div>";
    header('Location: moderation');
  }

}
