<?php ob_start();
  ?>

  <div class="bg-primary text-body py-2">
    <div class="container">
      <div class="row">
        <div class="d-flex flex-column justify-content-center col-md-12 shadow p-3">
          <h3 class="display-4 mb-3 text-center">Bonjour <?= $_SESSION['nom'] ?>, bienvenue dans votre espace de gestion des trajets.</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="container">
            <div class="row mx-auto col-md-10 col-md-offset-2 table-responsive shadow">
              <a href="new-way" class="btn btn-xs float-right btn-secondary mt-1">Proposer un nouveau trajet</a>
              <table class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                    <th class="text-center text-body">Etat du trajet</th>
                    <th class="text-center text-body">Date du trajet<br></th>
                  </tr>
                </thead>
                <?php foreach ($someWay as $oneWay) {
                echo $oneWay;
              }
              ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
$content = ob_get_clean();
require('view/backend/template.php');
