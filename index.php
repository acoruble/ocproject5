<?php
session_start();
require('model/Manager.php');
require('model/PostsManager.php');
require('model/WayManager.php');
require('model/UserManager.php');
require('model/Way.php');
require('model/Posts.php');
require('model/User.php');
require('controller/FrontEnd.php');
require('controller/BackEnd.php');

$frontend = new FrontEnd();
$backend = new BackEnd();

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
      $backend->my_account();
    }
  }
  elseif ($_GET['action'] === 'session') {
    $backend->session();
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

  if(isset($_SESSION['nom']) && isset($_SESSION['id']))
  {
    if ($_GET['admin'] === 'results') {
      $backend->results();
    }
    elseif ($_GET['admin'] === 'new_way') {
      $backend->new_way();
    }
    elseif ($_GET['admin'] === 'new_way_post') {
      $backend->new_way_post();
    }
    elseif ($_GET['admin'] === 'management_way') {
      $backend->management_way();
    }
    elseif ($_GET['admin'] === 'update_way') {
      $backend->update_way();
    }
    elseif ($_GET['admin'] === 'review_driver') {
      $backend->review_driver();
    }
    elseif ($_GET['admin'] === 'review_passenger') {
      $backend->review_passenger();
    }
    elseif ($_GET['admin'] === 'account_management') {
      $backend->account_management();
    }
    elseif ($_GET['admin'] === 'my_account') {
      $backend->my_account();
    }
    elseif ($_GET['admin'] === 'log_out') {
      $backend->log_out();
      $frontend->home();
    }





//     elseif ($_GET['admin'] === 'createpost') {
//       $backend->create();
//     }
//
//     elseif ($_GET['admin'] === 'updatepost') {
//       $backend->update();
//     }
//     elseif ($_GET['admin'] === 'postupdate') {
//       $backend->postupdate();
//       $backend->board();
//     }
//
//     elseif ($_GET['admin'] === 'deletepost') {
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
    echo "<div class='alert alert-danger' role='alert'>Merci de vous connecter.</div>";
    $frontend->connection();
  }
}
