<?php ob_start();
?>

<div class="text-center text-md-right py-2" style="background-image: url(https://static.pingendo.com/cover-bubble-dark.svg);	background-position: right bottom;	background-size: cover;	background-repeat: repeat; background-attachment: fixed;" >
  <div class="container">
    <div class="row text-center">
      <div class="mx-auto mx-md-0 ml-md-auto p-1" style="">
        <h3 class="display-3 text-center">I feel the charm</h3>
        <p class="lead" style="">Of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents.</p>
      </div>
    </div>
  </div>
</div>
<div class="text-center py-2" style="">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr class="table-secondary">
                <th class="text-center"><?= $way->status() ?></th>
                <th class="text-center">Trajet du 03/03/2019</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Conducteur</td>
                <td><?= $driver->name() ?></td>
              </tr>
              <tr>
                <td>Voiture</td>
                <td><?= $way->car() ?></td>
              </tr>
              <tr>
                <td>Passagers</td>
                <td><?= $passenger_name ?> <?= $passenger_surname?>
                </td>
                </tr>
                <tr>
                  <td style="">Point de départ</td>
                  <td><?= $way->starting_point() ?></br></td>
                </tr>
                <tr>
                  <td>Destination</td>
                  <td><?= $way->destination() ?></br></td>
                </tr>
                <tr>
                  <td>Date</td>
                  <td><?= $way->date_way() ?></br></td>
                </tr>
                <tr>
                  <td>Heure de départ</td>
                  <td><?= $way->time_start() ?></br></td>
                </tr>
                <tr>
                  <td>Heure d'arrivée prévue</td>
                  <td><?= $way->time_arrival() ?></br></td>
                </tr>
                <tr></tr>
              </tbody>
              <?= $_booking_or_not ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  $content = ob_get_clean();
  require('view/backend/template.php');
