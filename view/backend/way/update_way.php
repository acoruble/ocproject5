<?php ob_start();
  ?>

  <div class="bg-primary text-body py-2">
  <div class="container">
    <div class="row">
      <div class="d-flex flex-column justify-content-center col-md-12 shadow p-3">
        <h3 class="display-4 mb-3 text-center">Bonjour M/Mme,&nbsp;bienvenue dans votre espace de modifications des trajets.</h3>
      </div>
    </div>
  </div>
</div>
<div class="py-5 text-center" >
  <div class="container">
    <div class="row shadow">
      <div class="mx-auto col-lg-6 col-10">
        <h1>Trajet du 14/01/2019</h1>
        <form method="post" action="index.php?admin=new_way_post" class="text-left">
          <div class="form-group"> <label for="form16">Conducteur</label> <input name="driver" type="text" class="form-control" id="form16" value="<?= $fullname->name() ?> <?= $fullname->surname() ?>" disabled=""></div>
          <div class="form-group">
            <label for="form17">Point de départ</label> <input name="starting_point" type="text" class="form-control" id="user_input_autocomplete_address" placeholder="Votre adresse de départ..." required="required">
            <div>
              <div class="d-none">
                <label>Numéro</label>
                <input id="street_number" name="street_number" disabled="">
              </div>
              <div class="d-none">
                <label>Route</label>
                <input id="route" name="route" disabled="">
              </div>
              <div class="d-none">
                <label>Code postal</label>
                <input id="postal_code" name="postal_code" disabled="">
              </div>
              <div class="d-none">
                <label>Ville</label>
                <input id="locality" name="locality" disabled="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="form17">Point d'arrivée</label> <input name="destination" type="text" class="form-control" id="user_input_autocomplete_address_2" placeholder="Votre adresse d'arrivée..." required="required">
            <div>
              <div class="d-none">
                <label>Numéro</label>
                <input id="street_number" name="street_number" disabled="">
              </div>
              <div class="d-none">
                <label>Route</label>
                <input id="route" name="route" disabled="">
              </div>
              <div class="d-none">
                <label>Code postal</label>
                <input id="postal_code" name="postal_code" disabled="">
              </div>
              <div class="d-none">
                <label>Ville</label>
                <input id="locality" name="locality" disabled="">
              </div>
            </div>
          </div>
          <div class="form-group"> <label for="form18">Véhicule<br></label> <input name="car" type="text" class="form-control" id="form18" required="required"> </div>
          <div class="form-row">
            <div class="form-group col-md-12"> <label for="form19">Date</label> <input name="date" type="date" class="form-control" id="form19" required="required"> </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6"> <label for="form19">Heure de départ</label> <input name="time_start" type="time" class="form-control" id="form19" required="required"> </div>
            <div class="form-group col-md-6"> <label for="form19">Heure d'arrivée prévue</label> <input name="time_arrival" type="time" class="form-control" id="form19" required="required"> </div>
          </div>
          <button type="submit" class="btn btn-secondary w-100">Enregistrer vos modifications</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
$content = ob_get_clean();
require('view/backend/template.php');
