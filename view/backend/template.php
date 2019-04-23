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
  <!-- script dependencies -->
  <script src="public/scripts/jquery-3.3.1.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?libraries=places&amp;key=AIzaSyDhxa0DF3YywFKNvE9fpKj4kNeDvDnhyD8"></script>
  <script src="public/scripts/address.js"></script>
  <script src="public/scripts/address2.js"></script>
  <script src="public/scripts/weather.js"></script>
</head>

<body>
  <div class="bg-light text-secondary px-5">
    <div class="container-fluid w-100">
      <div class="flex-row justify-content-around row mb-0 text-center align-items-center">
        <div>
          <h6 class="mx-auto mb-0">Covoiturage du Pays Flèchois</h6>
        </div>
        <div class="font-italic mx-auto" id="zone_meteo" style="font-size:0.7em">
        </div>
        <div>
          <img id="wicon">
        </div>
      </div>
    </div>
  </div>

  <nav style="" class="navbar navbar-expand-lg navbar-dark bg-secondary shadow sticky-top px-5">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php" style="font-size:1.3em"><i class="fa d-inline fa-car text-light"></i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"><a class="nav-link" href="management-way">Gérer vos trajets</a></li>
          <li class="nav-item"> <a class="nav-link" href="index.php" >Rechercher un trajet</a> </li>
          <li class="nav-item"> <a class="nav-link" href="index.php?admin=new_way">Proposer un trajet</a> </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item"> <a class="nav-link" href="index.php?admin=my_account">Gérer votre compte</a> </li>
          <li class="nav-item"> <a class="nav-link text-primary" href="index.php?admin=log_out">Vous déconnecter</a> </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="bgimg">
  <!-- style="background-image: url('public/Le_Loir_a_La_Fleche.jpg');	background-position: left;	background-size: 100%; background-repeat: no-repeat; background-size: cover;"> -->
    <?= $content ?>
  </div>

  <footer class="footer">
    <div class="text-body bg-secondary">
      <div class="container-fluid">
        <div class="row justify-content-center w-100">
          <div class="col-md-12">
            <ul class="small nav nav-pills text-center align-items-baseline justify-content-center">
              <li class="nav-item" > <a href="index.php?action=FAQ" class="nav-link">FAQ</a> </li>
              <li class="nav-item"> <a class="nav-link" href="index.php?action=mentions_legales">Mentions légales</a> </li>
              <li class="nav-item"> <a href="index.php?action=CGU" class="nav-link">CGU</a> </li>
              <li class="nav-item"> <a href="index.php?action=contact" class="nav-link">Contact</a> </li>
              <li class="nav-item"> <a href="index.php?action=qui_suis_je" class="nav-link">Qui suis-je ?</a> </li>
              <li class="nav-item"> <a href="index.php?admin=moderation" class="nav-link">Administration</a> </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="text-body bg-secondary">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-12 text-center">
            <p class="small lead w-100 text-capitalize text-muted">© 2018 Coruble Anne-Lise. Openclassroom Projet 5</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</html>
