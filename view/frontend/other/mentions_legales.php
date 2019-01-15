<?php ob_start();
  ?>

Page en construction :-)

Crédit Photo 1ère page : PsamatheM
https://commons.wikimedia.org/wiki/File:Le_Loir_at_La_Fleche_1.jpg

  <?php
$content = ob_get_clean();
require('view/frontend/template.php');
