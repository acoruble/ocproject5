<?php ob_start();
?>

<div class="py-2 text-center">
  <div class="container">
    <div class="row">
      <div class="mx-auto col-lg-6 col-10">
        <h1>Propose ton trajet</h1>
        <p class="mb-3">When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees.</p>
        <form method="post" action="new-way_post" class="text-left">
          <div class="form-group"> <label for="form16">Conducteur</label> <input name ="driver" type="text" class="form-control" id="form16" value="<?= $fullname->name() ?> <?= $fullname->surname() ?>" disabled></div>
          <div class="form-group">

            <label for="form17">Point de départ</label> <input name ="starting_point" type="text" class="form-control" id="user_input_autocomplete_address" placeholder="Votre adresse de départ..." required="required">
            <div>
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
          </div>

          <div class="form-group">
            <label for="form17">Point d'arrivée</label> <input name="destination" type="text" class="form-control" id="user_input_autocomplete_address_2" placeholder="Votre adresse d'arrivée..." required="required">
            <div>
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
          </div>
          <div class="form-group"> <label for="form18">Véhicule<br></label> <input name="car" type="text" class="form-control" required="required"> </div>
          <div class="form-row">
            <div class="form-group col-md-12"> <label for="form19">Date</label> <input name="date" type="date" class="form-control" required="required"> </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6"> <label for="form19">Heure de départ</label> <input name="time_start" type="time" class="form-control" required="required"> </div>
            <div class="form-group col-md-6"> <label for="form19">Heure d'arrivée prévue</label> <input name="time_arrival" type="time" class="form-control" required="required"> </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12"> <label for="number_passenger">Nombre de places disponibles : </label>
              <select class="form-control" name="number_passenger" required="required">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
            </select>
          </div>
        </div>
          <button type="submit" class="btn btn-secondary w-100">Proposer ce trajet</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
$content = ob_get_clean();
require('view/backend/template.php');
