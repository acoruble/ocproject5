<?php

require_once("Manager.php");

class WayManager extends Manager
{
  public function exist($id)
  {
    $db = $this->dbConnect();
    $exist = $db->prepare('SELECT ID FROM way WHERE ID=?');
    $exist->execute(array($id));
    $correct = $exist->fetch();
    return $correct;
  }

  public function getAll()
  {
    $ways=[];
    $db = $this->dbConnect();
    $way = $db->query('SELECT * FROM way');
    while($data = $way->fetch())
    {
      $ways[]= new way($data);
    }
    return $ways;
  }

  public function getByDriver($id_driver)
  {
    $db = $this->dbConnect();
    $way = $db->prepare('SELECT * FROM way WHERE DRIVER = ?');
    $way->execute(array($id_driver));
    $data = $way->fetch();
    return new Way($data);
  }

  public function getById($id_way)
  {
    $db = $this->dbConnect();
    $way = $db->prepare('SELECT * FROM way WHERE ID = ?');
    $way->execute(array($id_way));
    $data = $way->fetch();
    return new Way($data);
  }

  public function listWay($driver)
  {
    $ways=[];
    $db = $this->dbConnect();
    $way = $db->prepare('SELECT * FROM way WHERE Driver = ? ORDER BY Date_way DESC');
    $way->execute(array($driver));
    while($data = $way->fetch())
    {
      $ways[] = new way($data);
    }
    return $ways;
  }

  public function listWayPassenger1($passenger)
  {
    $ways=[];
    $db = $this->dbConnect();
    $way = $db->prepare('SELECT * FROM way WHERE Passenger_1 = ? ORDER BY Date_way DESC');
    $way->execute(array($passenger));
    while($data = $way->fetch())
    {
      $ways[] = new way($data);
    }
    return $ways;
  }

  public function listWayPassenger2($passenger)
  {
    $ways=[];
    $db = $this->dbConnect();
    $way = $db->prepare('SELECT * FROM way WHERE Passenger_2 = ? ORDER BY Date_way DESC');
    $way->execute(array($passenger));
    while($data = $way->fetch())
    {
      $ways[] = new way($data);
    }
    return $ways;
  }

  public function listWayPassenger3($passenger)
  {
    $ways=[];
    $db = $this->dbConnect();
    $way = $db->prepare('SELECT * FROM way WHERE Passenger_3 = ? ORDER BY Date_way DESC');
    $way->execute(array($passenger));
    while($data = $way->fetch())
    {
      $ways[] = new way($data);
    }
    return $ways;
  }

  public function listWayPassenger4($passenger)
  {
    $ways=[];
    $db = $this->dbConnect();
    $way = $db->prepare('SELECT * FROM way WHERE Passenger_4 = ? ORDER BY Date_way DESC');
    $way->execute(array($passenger));
    while($data = $way->fetch())
    {
      $ways[] = new way($data);
    }
    return $ways;
  }

  public function listWayPassenger5($passenger)
  {
    $ways=[];
    $db = $this->dbConnect();
    $way = $db->prepare('SELECT * FROM way WHERE Passenger_5 = ? ORDER BY Date_way DESC');
    $way->execute(array($passenger));
    while($data = $way->fetch())
    {
      $ways[] = new way($data);
    }
    return $ways;
  }

  public function listWayPassenger6($passenger)
  {
    $ways=[];
    $db = $this->dbConnect();
    $way = $db->prepare('SELECT * FROM way WHERE Passenger_6 = ? ORDER BY Date_way DESC');
    $way->execute(array($passenger));
    while($data = $way->fetch())
    {
      $ways[] = new way($data);
    }
    return $ways;
  }

  public function search($date)
  {
    $ways=[];
    $db = $this->dbConnect();
    $way = $db->prepare('SELECT * FROM way WHERE Date_way = ?');
    $way->execute(array($date));
    while($data = $way->fetch())
    {
      $ways[] = new way($data);
    }
    return $ways;
  }

  public function distance($lat1, $lng1, $lat2, $lng2, $unit = 'k') {
    $earth_radius = 6378137;   // Terre = sphère de 6378km de rayon
    $rlo1 = deg2rad($lng1);
    $rla1 = deg2rad($lat1);
    $rlo2 = deg2rad($lng2);
    $rla2 = deg2rad($lat2);
    $dlo = ($rlo2 - $rlo1) / 2;
    $dla = ($rla2 - $rla1) / 2;
    $a = (sin($dla) * sin($dla)) + cos($rla1) * cos($rla2) * (sin($dlo) * sin($dlo));
    $d = 2 * atan2(sqrt($a), sqrt(1 - $a));
    //
    $meter = ($earth_radius * $d);
    if ($unit == 'k') {
      return $meter / 1000;
    }
    return $meter;
  }

  public function create($driver,$passenger,$starting_point,$destination,$car,$date,$time_start,$time_arrival)
  {
    $db = $this->dbConnect();
    $newWay = $db->prepare
    ('INSERT INTO way (Status, Driver, Passenger, Starting_point, Destination, Car, Date_way, Time_start, Time_arrival, Passenger_1, Passenger_2, Passenger_3, Passenger_4, Passenger_5, Passenger_6)
    VALUES (:status, :driver, :passenger, :starting_point, :destination, :car, :date_way, :time_start, :time_arrival, :passenger_1, :passenger_2, :passenger_3, :passenger_4, :passenger_5, :passenger_6)');
    $newWay -> execute(array(
      'status' => 'En cours',
      'driver' => $driver,
      'passenger' => $passenger,
      'starting_point' => $starting_point,
      'destination' => $destination,
      'car' => $car,
      'date_way' =>$date,
      'time_start' => $time_start,
      'time_arrival' => $time_arrival,
      'passenger_1' => null,
      'passenger_2' => null,
      'passenger_3' => null,
      'passenger_4' => null,
      'passenger_5' => null,
      'passenger_6' => null
    ));
  }

  public function update($id, $status, $driver, $passenger, $starting_point, $destination, $car, $date_way,
  $time_start, $time_arrival, $passenger_1, $passenger_2, $passenger_3, $passenger_4, $passenger_5, $passenger_6)
  {
    $db = $this->dbConnect();
    $update = $db->prepare('UPDATE way
      SET Status = :status, Driver = :driver, Passenger = :passenger, Starting_point = :starting_point,
      Destination = :destination, Car = :car, Date_way = :date_way, Time_start = :time_start, Time_arrival = :time_arrival,
      Passenger_1 = :passenger_1, Passenger_2 = :passenger_2, Passenger_3 = :passenger_3,
      Passenger_4 = :passenger_4, Passenger_5 = :passenger_5, Passenger_6 = :passenger_6
      WHERE  ID = :id');
      $test = $update->execute(array(
        'status' => $status,
        'driver' => $driver,
        'passenger' => $passenger,
        'starting_point' => $starting_point,
        'destination' => $destination,
        'car' => $car,
        'date_way' => $date_way,
        'time_start' => $time_start,
        'time_arrival' => $time_arrival,
        'passenger_1' => $passenger_1,
        'passenger_2' => $passenger_2,
        'passenger_3' => $passenger_3,
        'passenger_4' => $passenger_4,
        'passenger_5' => $passenger_5,
        'passenger_6' => $passenger_6,
        'id' => $id,
      ));
    }

    public function booking_1($id, $passenger_id)
    {
      $db = $this->dbConnect();
      $update = $db->prepare('UPDATE way
        SET Passenger_1 = :passenger_id
        WHERE  ID = :id');
        $update->execute(array(
          'passenger_id' => $passenger_id,
          'id' => $id,
        ));
      }

      public function booking_2($id, $passenger_id)
      {
        $db = $this->dbConnect();
        $update = $db->prepare('UPDATE way
          SET Passenger_2 = :passenger_id
          WHERE  ID = :id');
          $update->execute(array(
            'passenger_id' => $passenger_id,
            'id' => $id,
          ));
        }

        public function booking_3($id, $passenger_id)
        {
          $db = $this->dbConnect();
          $update = $db->prepare('UPDATE way
            SET Passenger_3 = :passenger_id
            WHERE  ID = :id');
            $update->execute(array(
              'passenger_id' => $passenger_id,
              'id' => $id,
            ));
          }

          public function booking_4($id, $passenger_id)
          {
            $db = $this->dbConnect();
            $update = $db->prepare('UPDATE way
              SET Passenger_4 = :passenger_id
              WHERE  ID = :id');
              $update->execute(array(
                'passenger_id' => $passenger_id,
                'id' => $id,
              ));
            }

            public function booking_5($id, $passenger_id)
            {
              $db = $this->dbConnect();
              $update = $db->prepare('UPDATE way
                SET Passenger_5 = :passenger_id
                WHERE  ID = :id');
                $update->execute(array(
                  'passenger_id' => $passenger_id,
                  'id' => $id,
                ));
              }

              public function booking_6($id, $passenger_id)
              {
                $db = $this->dbConnect();
                $update = $db->prepare('UPDATE way
                  SET Passenger_6 = :passenger_id
                  WHERE  ID = :id');
                  $update->execute(array(
                    'passenger_id' => $passenger_id,
                    'id' => $id,
                  ));
                }

                public function delete($id)
                {
                  $db = $this->dbConnect();
                  $delete= $db->prepare('DELETE FROM way WHERE ID=?');
                  $delete->execute(array($id));
                }

                private static $apikey = 'AIzaSyD-kwrdW3ZTGHLRA2k66UeuZHL3F9ySGoU';
                public function getPoints($address)
                {
                  //valeurs vide par défaut
                  $data = array('address' => '', 'lat' => '', 'lng' => '', 'city' => '', 'department' => '', 'region' => '', 'country' => '', 'postal_code' => '');
                  //on formate l'adresse
                  $address = str_replace(" ", "+", $address);
                  //on fait l'appel à l'API google map pour géocoder cette adresse
                  $json = file_get_contents("https://maps.google.com/maps/api/geocode/json?key=" . self::$apikey . "&address=$address&sensor=false&region=fr");
                  $json = json_decode($json);
                  //on enregistre les résultats recherchés
                  if ($json->status == 'OK' && count($json->results) > 0) {
                    $res = $json->results[0];
                    //adresse complète et latitude/longitude
                    $data['address'] = $res->formatted_address;
                    $data['lat'] = $res->geometry->location->lat;
                    $data['lng'] = $res->geometry->location->lng;
                    foreach ($res->address_components as $component) {
                      //ville
                      if ($component->types[0] == 'locality') {
                        $data['city'] = $component->long_name;
                      }
                      //départment
                      if ($component->types[0] == 'administrative_area_level_2') {
                        $data['department'] = $component->long_name;
                      }
                      //région
                      if ($component->types[0] == 'administrative_area_level_1') {
                        $data['region'] = $component->long_name;
                      }
                      //pays
                      if ($component->types[0] == 'country') {
                        $data['country'] = $component->long_name;
                      }
                      //code postal
                      if ($component->types[0] == 'postal_code') {
                        $data['postal_code'] = $component->long_name;
                      }
                    }
                  }
                  return $data;
                }
              }
