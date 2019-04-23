<?php ob_start();
  ?>

<div class="py-5 text-center h-100" style="">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="mx-auto col-lg-4 rounded bg-light shadow p-4">
        <h1 class="mb-4">Connexion</h1>
        <form method="post" action="index.php?action=session">
          <div class="form-group"> <input name ="email" type="email" class="form-control" placeholder="E-mail" id="form9"> </div>
          <div class="form-group mb-3"> <input name ="password" type="password" class="form-control" placeholder="Mot de passe" id="form10"> <small class="form-text text-muted text-right">
              <a href="index.php?action=password_forgotten"> Recover password</a>
            </small> </div> <button type="submit" class="btn btn-secondary">Se connecter</button>
        </form>
        <div class="row justify-content-center">
          <div class="col-md-12"><a class="btn btn-primary" href="index.php?action=password_forgotten">Mot de passe oublié ?</a></div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
$content = ob_get_clean();
require('view/frontend/template.php');
