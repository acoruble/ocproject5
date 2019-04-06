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
                <div class="py-3 text-center">
                  <div class="container">
                    <div class="row">
                      <div class="mx-auto col-lg-6 col-10">
                        <h1>Modifier mes informations :</h1>
                        <p class="mb-3">When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees.</p>
                        <form method="post" action="index.php?admin=update_account" class="text-left">
                          <div class="form-group"> <label for="email">Nouvel e-mail</label> <input name ="email" type="email" class="form-control" id="form18" placeholder="<?= $you->email() ?>" required> </div>
                          <input name ="name" type="hidden" class="form-control" value="<?= $you->name() ?>" required>
                          <input name ="surname" type="hidden" class="form-control" value="<?= $you->surname() ?>" required>
                          <div class="form-row">
                            <div class="form-group col-md-6"> <label for="password">Indiquer votre nouveau mot de passe</label> <input name ="password" type="password" class="form-control" id="form19" placeholder="••••" required> </div>
                            <div class="form-group col-md-6"> <label for="password2">Vérification du nouveau mot de passe</label> <input name ="password2" type="password" class="form-control" id="form20" placeholder="••••" required> </div>
                          </div>
                          <div class="form-group">
                            <div class="form-check"> <input class="form-check-input" type="checkbox" id="form21" value="on" required> <label class="form-check-label" for="form21">Je suis toujours d'accord avec <a href="index.php?action=CGU" class="text-secondary">Les conditions d'utilisations </a>du site du co-voiturage du pays flèchois</label> </div>
                          </div> <button type="submit" class="btn btn-secondary w-100">Mettre à jour mes informations</button>
                        </form>
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
</div>
  <?php
$content = ob_get_clean();
require('view/backend/template.php');
