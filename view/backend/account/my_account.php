<?php ob_start();
  ?>

  <div class="bg-primary text-body py-2" >
    <div class="container">
      <div class="row">
        <div class="d-flex flex-column justify-content-center col-md-12 shadow p-3">
          <h3 class="display-4 mb-3 text-center">Bonjour M/Mme, bienvenue dans votre espace personnel.</h3>
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
                <div class="col-md-12 p-3">
                  <div class="row">
                    <div class="col-md-12"><a class="btn btn-outline-info float-right" href="#">Modifier mes informations<br></a></div>
                  </div><img class="d-block rounded-circle mx-auto pb-2" src="https://static.pingendo.com/img-placeholder-3.svg">
                  <h2 class="text-capitalize text-center">Coruble Anne-Lise</h2>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h4 class="text-center">Avis :</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-3 bg-primary"></div>
                    <div class="col-md-6">
                      <p class="">Paragraph. Then, my friend, when darkness overspreads my eyes, and heaven and earth seem to dwell in my soul and absorb its power, like the form of a beloved mistress, then I often think with longing.</p>
                    </div>
                    <div class="col-md-3 bg-primary"></div>
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
