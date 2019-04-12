<?php ob_start();
?>

<div class="bg-primary text-body py-3">
  <div class="container">
    <div class="row">
      <div class="d-flex flex-column justify-content-center col-md-12 shadow p-3">
        <h3 class="text-center">Bonjour Chef, bienvenue dans votre espace de modération.</h3>
      </div>
    </div>
  </div>
</div>
<div class="py-2" style="" >
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-12 shadow">
            <div class="row">
              <div class="col-md-12 p-3">
                <div class="table-responsive" style="">
                  <table class="table table-bordered ">
                    <thead class="table-secondary text-secondary text-center text-uppercase">
                      <tr>
                        <th>Auteur</th>
                        <th>Destinataire</th>
                        <th>Message<br></th>
                        <th>ACTION<br></th>
                        <th>Trajet<br></th>
                      </tr>
                    </thead>
                    <?php foreach ($someReviews as $oneReview) {
                    echo $oneReview;
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
    </div>
  </div>
</div>

<?php
$content = ob_get_clean();
require('view/backend/template.php');
