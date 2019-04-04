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
  <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-secondary shadow" style="">
    <div class="container"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" style="">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar12"> <a class="navbar-brand d-none d-md-block" href="index.php"><i class="fa d-inline fa-car"></i>
    </a>
    <ul class="navbar-nav mx-auto">
      <li class="nav-item"> <a class="nav-link" href="index.php">Rechercher un trajet</a> </li>
      <li class="nav-item"> <a class="nav-link" href="index.php?admin=new_way">Proposer un trajet</a> </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item"> <a class="nav-link" href="index.php?action=connection">Se connecter</a> </li>
      <li class="nav-item"> <a class="nav-link text-primary" href="index.php?action=registration">S'enregistrer</a> </li>
    </ul>
  </div>
</div>
</nav>

<?= $content ?>

<footer class="footer">
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
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>

</html>
