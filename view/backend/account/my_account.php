<?php ob_start();
?>
<div class=" text-body py-2" >
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="bg-primary d-flex flex-column justify-content-center col-md-8 shadow p-2 rounded">
        <h3 class="display-4 mb-2 text-center">Bonjour <?= $_SESSION['nom'] ?>, bienvenue dans votre espace personnel.</h3>
        <p class="mb-4 lead">Seem to dwell in my soul and absorb its power, like the form of a beloved mistress, then I often think with longing, Oh, would I could describe these conceptions.</p>
      </div>
    </div>
  </div>
</div>
<div class="py-2">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="row justify-content-center">
          <div class="bg-primary col-md-12 shadow rounded">
            <div class="row justify-content-center text-center">
              <div class="col-md-12 p-1"><a class="btn btn-outline-info float-right" href="index.php?admin=account_management">Modifier mes informations<br></a></div>
              <!-- <div class="col-md-6 p-1"> -->
              </div>
              <div class="row justify-content-center text-center">
                <div class="col-md-12">
                  <h2 class="text-capitalize text-center text-secondary"><?= $you->name() ?> <?= $you->surname() ?></h2>
                  <p class="text-center"><?= $average ?> / 5 </br> (Note moyenne des avis reçus)</p>
                </div>
              </div>
                <h4 class="text-center">Avis :</h4>
                <div class="row justify-content-center text-center">
                  <div class="col-md-12 p-1">
                    <?php foreach($reviews as $review)
                    { ?>
                      <p>
                        "<?= $review->content() ?>"
                      </p>
                    <?php } ?>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
$content = ob_get_clean();
require('view/backend/template.php');
