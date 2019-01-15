<?php ob_start();
?>

<div class="bg-primary text-body p-2" style="	background-image: url(&quot;https://upload.wikimedia.org/wikipedia/commons/a/a1/Le_Loir_at_La_Fleche_1.jpg&quot;);	background-position: left;	background-size: 100%;">
  <div class="container">
    <div class="row">
      <div class="d-flex flex-column col-md-6 p-2 flex-grow-1 justify-content-start" style=""></div>
      <div class="text-body col-md-6 p-4 shadow bg-light rounded" style="">
        <h3 class="mb-3 text-body">Rechercher un trajet</h3>
        <form action="index.php?admin=results" method="post">
          <div class="form-group">
            <label class="text-body">Lieu de départ</label> <input id="user_input_autocomplete_address" placeholder="Votre adresse de départ..." class="form-control" type="text" required="required">
            <div class="d-none">
              <label>Numéro</label>
              <input id="street_number" name="street_number" disabled>
            </div>

            <div class="d-none">
              <label>Route</label>
              <input id="route" name="route" disabled>
            </div>

            <div class="d-none">
              <label>Code postal</label>
              <input id="postal_code" name="postal_code" disabled>
            </div>

            <div class="d-none">
              <label>Ville</label>
              <input id="locality" name="locality" disabled>
            </div>
          </div>
          <div class="form-group"> <label>Lieu d'arrivée</label> <input id="user_input_autocomplete_address_2" placeholder="Votre adresse d'arrivée..."  type="text" class="form-control" required="required" >
            <div class="d-none">
              <label>Numéro</label>
              <input id="street_number" name="street_number" disabled>
            </div>

            <div class="d-none">
              <label>Route</label>
              <input id="route" name="route" disabled>
            </div>

            <div class="d-none">
              <label>Code postal</label>
              <input id="postal_code" name="postal_code" disabled>
            </div>

            <div class="d-none">
              <label>Ville</label>
              <input id="locality" name="locality" disabled>
            </div>
          </div>
          <div class="form-group"> <label>Date de départ</label> <input type="date" class="form-control" placeholder="2" required="required"> </div> <button type="submit" class="btn mt-4 btn-block p-2 btn-outline-secondary"><b>Rechercher votre trajet</b></button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="py-4 text-center" style="">
  <div class="container">
    <div class="row">
      <div class="col-lg-4" style="">
        <div class="card shadow">
          <div class="card-body p-4">
            <i class="fa fa-5x fa-handshake"></i>
            <h2 class="text-secondary">Convivial</h2>
            <p class="mb-0">Rencontrons les autres habitants de notre ville.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6" style="">
        <div class="card shadow">
          <div class="card-body p-4">
            <i class="fa fa-leaf fa-5x"></i>
            <h2 class="text-secondary">Ecologique</h2>
            <p class="mb-0">Gardons l'air respiré par nos enfants sain.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6" style="">
        <div class="card shadow">
          <div class="card-body p-4"> <i class="fa fa-5x fa-universal-access" style=""></i>
            <h2 class="text-secondary">Pratique</h2>
            <p class="mb-0">Partageons nos coffres de voiture pour nos courses.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
$content = ob_get_clean();
require('template.php');
