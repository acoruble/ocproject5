<?php ob_start();
  ?>

  <div class="bg-primary text-body py-2" >
    <div class="container">
      <div class="row">
        <div class="d-flex flex-column justify-content-center col-md-12 shadow p-3">
          <h3 class="display-4 mb-3 text-center">Bonjour <?= $_SESSION['nom'] ?>, bienvenue dans votre espace personnel.</h3>
          <p class="mb-4 lead">Seem to dwell in my soul and absorb its power, like the form of a beloved mistress, then I often think with longing, Oh, would I could describe these conceptions.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12 shadow">
              <div class="row">
                <div class="col-md-12 p-1"><a class="btn btn-outline-info float-right" href="index.php?admin=account_management">Modifier mes informations<br></a></div>
                <div class="col-md-6 p-1">
                    <h2 class="text-capitalize text-center"><?= $you->name() ?> <?= $you->surname() ?></h2>
                  <!-- <img class="img-fluid d-block rounded-circle" src="https://static.pingendo.com/img-placeholder-3.svg"> -->
              </div>
                <div class="col-md-6">
                  <h4 class="text-center">Avis :</h4>
              <!-- </div>
              <div class="row"> -->
                  <div class="row">
                    <div class="col-md-12">
                      <p class="text-justify">Paragraph. Then, my friend, when darkness overspreads my eyes, and heaven and earth seem to dwell in my soul and absorb its power, like the form of a beloved mistress, then I often think with longing.</p>
                    </div>
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