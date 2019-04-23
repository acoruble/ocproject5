<?php

/**
*
*/
class backendWay
{
  public function maj_way()
  {
    $way = new Way();
    $ways = $way -> getAll();
    foreach ($ways as $way) {
      $date_day = strval($way->date_way());
      $date_hour = strval($way->time_start());
      $date_test = "$date_day $date_hour";
      $tz = new DateTimeZone('Europe/Paris');
      $date_test = new DateTime($date_test, $tz);
      date_default_timezone_set('Europe/Paris');
      $date_limit = new DateTime('');
      if ( $date_test < $date_limit)
      {
        $id = $way->id();
        $status = 'Terminé';
        $driver = $way->driver();
        $passenger = $way->passenger();
        $starting_point = $way->starting_point();
        $destination = $way->destination();
        $car = $way->car();
        $date = $way->date_way();
        $time_start = $way->time_start();
        $time_arrival = $way->time_arrival();
        $passenger_1 = $way->passenger_1();
        $passenger_2 = $way->passenger_2();
        $passenger_3 = $way->passenger_3();
        $passenger_4 = $way->passenger_4();
        $passenger_5 = $way->passenger_5();
        $passenger_6 = $way->passenger_6();
        $way -> update($id, $status, $driver, $passenger, $starting_point,
        $destination,$car,$date,$time_start,$time_arrival,
        $passenger_1, $passenger_2, $passenger_3, $passenger_4, $passenger_5, $passenger_6 );
      }
    }
  }

  public function results()
  {
    $way = new Way();
    $ways = $way-> search($_POST['date']);
    if (empty($ways)) {
      echo "<div class='alert alert-danger text-center' role='alert'>Désolé, aucun trajet n'est disponible pour l'instant.
      </div>";
      require ('view/frontend/welcome.php');
    }
    else {
      require ('view/backend/way/results.php');
    }
  }

  public function booking()
  {
    $way = new Way();
    $way = $way -> getById($_GET['id']);
    $user = new User();
    $passenger = $user -> get($_SESSION['id']);
    $nbpassenger = $way-> passenger();

    if ($way->driver() == $_SESSION['id']) {
      echo "<div class='alert alert-danger text-center' role='alert'>Vous êtes déjà conducteur de ce trajet !</div>";
      require ('view/frontend/welcome.php');
    }
    else {
      $i=1;
      $nbpassenger = $nbpassenger+1;
      $x=1;
      $booking_already_exist = 0;
      while ($i <= $nbpassenger)
      {
        $passenger_i = "passenger_$i";
        $passenger_i = $way->$passenger_i();
        if ($i == $nbpassenger) {
          // echo "$i";
          echo "<div class='alert alert-danger text-center' role='alert'>Désolé ce trajet est complet !</div>";
          break;
        }
        elseif ($passenger_i != null) {
          $i++;
        }
        else {
          while ($x <= 6) {
            $passenger_x = "passenger_$x";
            if ($_SESSION['id'] == $way->$passenger_x()) {
              echo "<div class='alert alert-danger text-center' role='alert'>Vous avez déjà réservé pour ce trajet !</div>";
              $booking_already_exist = 1;
              break;
            }
            else {
              $x++;
              $booking_already_exist = 0;
            }
          }
          if ($booking_already_exist == 0) {
            $booking_i = "booking_$i";
            $booking = $way -> $booking_i($_GET['id'], $_SESSION['id'], $i);
            echo "<div class='alert alert-danger text-center' role='alert'>Trajet réservé !</div>";
            break;
          } else {
            break;
          }
        }
      }
      require ('view/frontend/welcome.php');
    }
  }

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
    $test = $way->create(($driver->id()), ($_POST['number_passenger']), ($_POST['starting_point']), ($_POST['destination']), ($_POST['car']), ($_POST['date']), ($_POST['time_start']), ($_POST['time_arrival']));
    header('Location: index.php?admin=management_way');
  }

  public function management_way()
  {
    $way = new Way();
    $fullWays;
    $listWay0 = $way -> listWay($_SESSION['id']);
    $listWay1 = $way -> listWayPassenger1($_SESSION['id']);
    $listWay2 = $way -> listWayPassenger2($_SESSION['id']);
    $listWay3 = $way -> listWayPassenger3($_SESSION['id']);
    $listWay4 = $way -> listWayPassenger4($_SESSION['id']);
    $listWay5 = $way -> listWayPassenger5($_SESSION['id']);
    $listWay6 = $way -> listWayPassenger6($_SESSION['id']);

    $fullWays = array_merge($listWay0, $listWay1, $listWay2, $listWay3, $listWay4, $listWay5, $listWay6);
    arsort($fullWays);
    $someWay=[];

    foreach ($fullWays as $way) {
      $id = $way->id();
      $status = $way->status();
      $date_way = $way->date_way();

      if ($way->status() == 'Terminé') {

        if ($way->driver() == $_SESSION['id']) {
          $update_or_review_link = "<a href='index.php?admin=review_driver&id=$id' class='btn btn-xs btn-secondary'>Laisser un avis</a>";
        } else {
          $update_or_review_link = "<a href='index.php?admin=review_passenger&id=$id' class='btn btn-xs btn-secondary'>Laisser un avis</a>";
        }

      } else {
        $update_or_review_link = "<a href='index.php?admin=update_way&id=$id' class='btn btn-xs btn-secondary'>Modifier</a>";
      }

      $oneWay =
      "
      <tbody>
      <tr>
      <td class='text-center'>
      <p>
      $status
      </p>
      </td>
      <td class='text-center border'>
      $date_way</td>
      <td class='text-center'>
      <a href='index.php?admin=read_way&id=$id' class='btn btn-xs btn-secondary'>Voir<br></a>
      </td>
      <td class='text-center'>
      $update_or_review_link
      </td>
      <td class='text-center'>
      <a href='index.php?admin=delete_way&idWayDelete=$id' class='btn btn-xs btn-info'>Supprimer</a>
      </td>
      </tr>
      ";
      array_push($someWay, $oneWay);
    }
    require ('view/backend/way/management_way.php');
  }

  public function read_way()
  {
    $way = new Way();
    $way = $way -> getById($_GET['id']);
    $user = new User();
    $driver = $user ->get($way->driver());
    $id_way = $way->id();

    if ($way->status() == 'Terminé') {
      $_booking_or_not = "<div class='col-md-12 p-2'><p class='btn btn-lg btn-info'>Désolé, ce trajet est passé.</p></div>";
    }
    else {
      $nbpassenger = $way->passenger();
      $i=1;
      $nbpassenger = $nbpassenger+1;
      $booking_already_full = 0;
      while ($i <= $nbpassenger)
      {
        $passenger_i = "passenger_$i";
        $passenger_i = $way->$passenger_i();
        if ($i == $nbpassenger) {
          $booking_already_full = 1;
          break;
        }
        elseif ($passenger_i != null) {
          $i++;
          $booking_already_full = 0;
        }
        else {
          $booking_already_full = 0;
          break;
        }
      }

      if ($booking_already_full == 0) {
        $_booking_or_not = "<div class='col-md-12 p-2'><a class='btn btn-lg btn-info' href='index.php?admin=booking&id=$id_way'>Réserver une place</a></div>";
      } else {
        $_booking_or_not = "<div class='col-md-12 p-2'><p class='btn btn-lg btn-info'>Désolé, ce trajet est complet.</p></div>";
      }
    }
    $i=1;
    $nbpassenger = $way->passenger();
    $nbpassenger = $nbpassenger+1;
    $allpassengers = [];
    while ($i < $nbpassenger)
    {
      $passenger_i = "passenger_$i";
      $passenger_i = $way->$passenger_i();
      if ($passenger_i === 0) {
        break;
      }
      else {
        $passenger = $user ->get($passenger_i);
        $passenger_id = $passenger -> id();
        $passenger_name = $passenger -> name();
        $passenger_infos = "<a class='text-secondary' href='index.php?admin=other_account&id=$passenger_id'>$passenger_name</a></br>";
        array_push($allpassengers,$passenger_infos);
        $i++;
      }
    }
    require ('view/backend/way/resume.php');
  }

  public function update_way()
  {
    $way = new Way();
    $way = $way -> getById($_GET['id']);
    $user = new User();
    $driver = $user-> get($way->driver());
    require ('view/backend/way/update_way.php');
  }

  public function update_way_post()
  {
    $way = new Way();
    $way = $way -> getById($_GET['id']);
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
}
