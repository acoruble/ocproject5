<?php ob_start();
  ?>

<div class="text-center text-white align-items-center d-flex" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(https://static.pingendo.com/cover-bubble-dark.svg);  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat;">
  <div class="container py-5">
    <div class="row">
    </div>
    <div class="row">
      <div class="mx-auto col-lg-8 col-md-12">
        <h1>Choisis ton trajet :</h1>
        <p class="lead mb-5">Has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence.</p>
      </div>
    </div>
  </div>
</div>
<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-8 border-bottom border-dark p-3">
            <ul class="list-group" style="">
              <li class="border-0 list-group-item d-flex justify-content-between align-items-center"><i class="fa fa-map-marker text-muted fa-lg"></i> Lieu de départ</li>
              <li class=" border-0 list-group-item d-flex justify-content-between align-items-center"><i class="fa fa-long-arrow-down text-muted fa-lg"></i>Durée prévue</li>
              <li class="border-0 list-group-item d-flex justify-content-between align-items-center"><i class="fa fa-map-marker text-muted fa-lg"></i> Lieu d'arrivée</li>
              <li class="border-0 list-group-item d-flex justify-content-between align-items-center" draggable="true"><i class="fa fa-calendar text-muted fa-lg"></i>Date et heure</li>
            </ul>
          </div>
          <div class="col-md-4 border-bottom border-dark p-3" style=""><a class="btn btn-secondary text-center w-100 my-5" href="#">Réserver ce trajet</a></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-8 border-bottom border-dark p-3">
            <ul class="list-group" style="">
              <li class="border-0 list-group-item d-flex justify-content-between align-items-center"><i class="fa fa-map-marker text-muted fa-lg"></i> Lieu de départ</li>
              <li class=" border-0 list-group-item d-flex justify-content-between align-items-center"><i class="fa fa-long-arrow-down text-muted fa-lg"></i>Durée prévue</li>
              <li class="border-0 list-group-item d-flex justify-content-between align-items-center"><i class="fa fa-map-marker text-muted fa-lg"></i> Lieu d'arrivée</li>
              <li class="border-0 list-group-item d-flex justify-content-between align-items-center" draggable="true"><i class="fa fa-calendar text-muted fa-lg"></i>Date et heure</li>
            </ul>
          </div>
          <div class="col-md-4 border-bottom border-dark p-3" style=""><a class="btn btn-secondary text-center w-100 my-5" href="#">Réserver ce trajet</a></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-8 border-bottom border-dark p-3">
            <ul class="list-group" style="">
              <li class="border-0 list-group-item d-flex justify-content-between align-items-center"><i class="fa fa-map-marker text-muted fa-lg"></i> Lieu de départ</li>
              <li class=" border-0 list-group-item d-flex justify-content-between align-items-center"><i class="fa fa-long-arrow-down text-muted fa-lg"></i>Durée prévue</li>
              <li class="border-0 list-group-item d-flex justify-content-between align-items-center"><i class="fa fa-map-marker text-muted fa-lg"></i> Lieu d'arrivée</li>
              <li class="border-0 list-group-item d-flex justify-content-between align-items-center" draggable="true"><i class="fa fa-calendar text-muted fa-lg"></i>Date et heure</li>
            </ul>
          </div>
          <div class="col-md-4 border-bottom border-dark p-3" style=""><a class="btn btn-secondary text-center w-100 my-5" href="#">Réserver ce trajet</a></div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
$content = ob_get_clean();
require('view/backend/template.php');
