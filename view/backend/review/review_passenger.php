<?php ob_start();
?>

<div class="container-fluid py-3">
  <div class="row justify-content-center">
    <div class="bg-primary rounded mx-auto col-md-6 p-2">
      <h1 class="text-center text-body">Comment s'est passé votre trajet avec <?= $driver->name() ?> <?= $driver->surname() ?> ?</h1>
      <form method="post" action="index.php?admin=review_passenger_post&way_id=<?= $way->id() ?>&driver_id=<?= $way->driver() ?>">
        <div class="form-group"> <input name="target" type="hidden" class="form-control" id="form16" value="<?= $driver->id() ?>"></div>
        <div class="form-group">
          <label for="range_review" class="lead text-center text-body">Merci de laisser votre avis :</label>
          <select class="form-control" name="rating">
            <option value="5">Excellent</option>
            <option value="4">Bon</option>
            <option value="3">Moyen</option>
            <option value="2">Mauvais</option>
            <option value="1">Au secours !</option>
          </select>
        </div>
        <div class="form-group"> <textarea name="content" class="form-control" rows="3" placeholder="Votre avis est important !"></textarea> </div>
        <button type="submit" class="btn btn-secondary w-100">Envoyer votre avis</button>
      </form>
    </div>
  </div>
</div>


<?php
$content = ob_get_clean();
require('view/backend/template.php');
