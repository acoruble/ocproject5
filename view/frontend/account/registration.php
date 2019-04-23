<?php ob_start();
  ?>

<div class="py-4 text-center">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="mx-auto rounded bg-light shadow col-lg-5 py-2">
        <h1>Rejoins-nous :</h1>
        <p class="mb-3">When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees.</p>
        <form method="post" action="index?action=registration_post" class="text-left">
          <div class="form-group"> <label for="name">Nom</label> <input name ="name" type="text" class="form-control" id="form16" placeholder="Nom" required> </div>
          <div class="form-group"> <label for="surname">Prénom</label> <input name ="surname" type="text" class="form-control" id="form17" placeholder="Prénom" required> </div>
          <div class="form-group"> <label for="email">E-mail</label> <input name ="email" type="email" class="form-control" id="form18" placeholder="email@email.com" required> </div>
          <div class="form-row">
            <div class="form-group col-md-6"> <label for="password">Mot de passe</label> <input name ="password" type="password" class="form-control" id="form19" placeholder="••••" required> </div>
            <div class="form-group col-md-6"> <label for="password2">Vérification mot de passe</label> <input name ="password2" type="password" class="form-control" id="form20" placeholder="••••" required> </div>
          </div>
          <div class="form-group">
            <div class="form-check"> <input class="form-check-input" type="checkbox" id="form21" value="on" required> <label class="form-check-label" for="form21">Je suis d'accord avec <a href="index.php?action=CGU" class="text-secondary">Les conditions d'utilisations </a>du site du co-voiturage du pays flèchois</label> </div>
          </div> <button type="submit" class="btn btn-secondary w-100">Nous rejoindre</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
$content = ob_get_clean();
require('view/frontend/template.php');
