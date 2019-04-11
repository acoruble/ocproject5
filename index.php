<?php
session_start();
require('model/Manager.php');
require('model/ReviewManager.php');
require('model/WayManager.php');
require('model/UserManager.php');
require('model/Way.php');
require('model/Review.php');
require('model/User.php');
require('controller/frontend/FrontEnd.php');
require('controller/backend/backendReview.php');
require('controller/backend/backendUser.php');
require('controller/backend/backendway.php');

$frontend = new FrontEnd();
$backendReview = new backendReview();
$backendUser = new backendUser();
$backendWay = new backendWay();

$backendWay->maj_way();

if (empty($_SERVER["QUERY_STRING"])) {
  $frontend->home();
}

elseif (isset($_GET['action'])) {

  if ($_GET['action'] === 'search') {
    $frontend->search();
  }
  elseif ($_GET['action'] === 'registration') {
    $frontend->registration();
  }
  elseif ($_GET['action'] === 'registration_post') {
    $frontend->registration_post();
  }
  elseif ($_GET['action'] === 'connection') {
    if (empty($_SESSION['id']) OR empty($_SESSION['nom']))
    {
      $frontend->connection();
    }
    else {
      $backendUser->my_account();
    }
  }
  elseif ($_GET['action'] === 'session') {
    $backendUser->session();
  }
  elseif ($_GET['action'] === 'contact') {
    $frontend->contact();
  }
  elseif ($_GET['action'] === 'mentions_legales') {
    $frontend->mentions_legales();
  }
  elseif ($_GET['action'] === 'CGU') {
    $frontend->CGU();
  }
  elseif ($_GET['action'] === 'FAQ') {
    $frontend->FAQ();
  }
  elseif ($_GET['action'] === 'qui_suis_je') {
    $frontend->qui_suis_je();
  }
}

elseif (isset($_GET['admin'])) {

  // if (isset($_SESSION['nom']) && isset($_SESSION['id']) && ($_SESSION['nom'] === 'superadmin')) {
  //   $backendReview->moderation();
  // }

  if(isset($_SESSION['nom']) && isset($_SESSION['id']))
  {
    if ($_GET['admin'] === 'results') {
      $backendWay->results();
    }
    elseif ($_GET['admin'] === 'new_way') {
      $backendWay->new_way();
    }
    elseif ($_GET['admin'] === 'new_way_post') {
      $backendWay->new_way_post();
    }
    elseif ($_GET['admin'] === 'management_way') {
      $backendWay->management_way();
    }
    elseif ($_GET['admin'] === 'read_way') {
      $backendWay->read_way();
    }
    elseif ($_GET['admin'] === 'update_way') {
      $backendWay->update_way();
    }
    elseif ($_GET['admin'] === 'update_way_post') {
      $backendWay->update_way_post();
    }
    elseif ($_GET['admin'] === 'delete_way') {
      $backendWay->delete_way();
    }
    elseif ($_GET['admin'] === 'booking') {
      $backendWay->booking();
    }

    elseif ($_GET['admin'] === 'review_driver') {
      $backendReview->review_driver();
    }
    elseif ($_GET['admin'] === 'review_driver_post') {
      $backendReview->review_driver_post();
    }
    elseif ($_GET['admin'] === 'review_passenger') {
      $backendReview->review_passenger();
    }
    elseif ($_GET['admin'] === 'review_passenger_post') {
      $backendReview->review_passenger_post();
    }
    elseif ($_GET['admin'] === 'account_management') {
      $backendUser->account_management();
    }
    elseif ($_GET['admin'] === 'update_account') {
      $backendUser->update_account();
    }
    elseif ($_GET['admin'] === 'my_account') {
      $backendUser->my_account();
    }
    elseif ($_GET['admin'] === 'log_out') {
      $backendUser->log_out();
      $frontend->home();
    }





//     elseif ($_GET['admin'] === 'createreview') {
//       $backend->create();
//     }
//
//     elseif ($_GET['admin'] === 'updatereview') {
//       $backend->update();
//     }
//     elseif ($_GET['admin'] === 'postupdate') {
//       $backend->postupdate();
//       $backend->board();
//     }
//
//     elseif ($_GET['admin'] === 'deletereview') {
//       $backend->delete();
//       $backend->board();
//     }
//
//     elseif ($_GET['admin'] === 'controlcomments') {
//       $backend->control();
//     }
//
//     elseif ($_GET['admin'] === 'deletecomment') {
//       $backend->deletecomment();
//       $backend->board();
//     }
//
//     elseif ($_GET['admin'] === 'logout') {
//       $backend->logout();
//       $frontend->home();
//     }
  }
  else {
    echo "<div class='alert alert-danger text-center' role='alert'>Merci de vous connecter.</div>";
    $frontend->connection();
  }
}
