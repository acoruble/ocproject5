<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- PAGE settings -->
  <link rel="icon" href="../../../../Downloads/ff737380-a787-4b8d-8d0c-ec1f4911c786.png">
  <title>Covoiturage Pays Flèchois</title>
  <meta name="description" content="Covoiturage Pays Flèchois">
  <meta name="keywords" content="Covoiturage Pays Flèchois La Flèche">
  <!-- CSS dependencies -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="public/flat.css" type="text/css">
  <script src="https://maps.googleapis.com/maps/api/js?libraries=places&amp;key=AIzaSyDhxa0DF3YywFKNvE9fpKj4kNeDvDnhyD8" type="text/javascript"></script>
  <script src="public/scripts/address.js"></script>
  <script src="public/scripts/address2.js"></script>
</head>

<body>
  <!-- Navbar -->
  <!-- Cover -->
  <!-- Intro -->
  <!-- Gallery -->
  <!-- Menu -->
  <!-- Carousel reviews -->
  <!-- Carousel venue -->
  <!-- Events -->
  <!-- Book section -->
  <!-- Footer -->
  <!-- JavaScript dependencies -->
  <nav class="navbar navbar-expand-md navbar-dark bg-secondary">
    <div class="container"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar12">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar12"> <a class="navbar-brand d-none d-md-block" href="#">
          <i class="fa d-inline fa-car"></i>
        </a>
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"><a class="nav-link" href="index.php?admin=management_way">Gérer vos trajets</a></li>
          <li class="nav-item"> <a class="nav-link" href="index.php">Rechercher un trajet</a> </li>
          <li class="nav-item"> <a class="nav-link" href="index.php?admin=new_way">Proposer un trajet</a> </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item"> <a class="nav-link" href="index.php?admin=my_account">Gérer votre compte</a> </li>
          <li class="nav-item"> <a class="nav-link text-primary" href="index.php?admin=log_out">Vous déconnecter</a> </li>
        </ul>
      </div>
    </div>
  </nav>

<?= $content ?>


  <div class="text-body bg-secondary">
    <div class="container">
          <div class="row w-100">
            <div class="col-md-12">
              <ul class="nav nav-pills text-center align-items-baseline justify-content-center">
                <li class="nav-item" > <a href="index.php?action=FAQ" class="nav-link">FAQ</a> </li>
                <li class="nav-item"> <a class="nav-link" href="index.php?action=mentions_legales">Mentions légales</a> </li>
                <li class="nav-item"> <a href="index.php?action=CGU" class="nav-link">CGU</a> </li>
                <li class="nav-item"> <a href="index.php?action=contact" class="nav-link">Contact</a> </li>
                <li class="nav-item"> <a href="index.php?action=qui_suis_je" class="nav-link">Qui suis-je ?</a> </li>
              </ul>
            </div>
      </div>
    </div>
  </div>
  <div class="text-body bg-secondary">
    <div class="container">
      <div class="row">
            <div class="col-md-12 text-center">
              <p class="small lead w-100 text-capitalize text-muted">© 2018 Coruble Anne-Lise. Openclassroom Projet 5</p>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>
