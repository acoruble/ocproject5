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

  public function get($id)
  {
    $ways=[];
    $db = $this->dbConnect();
    $way = $db->prepare('SELECT * FROM way WHERE ID = ? ORDER BY Date_way DESC');
    $way->execute(array($id));
    while($data = $way->fetch())
    {
      $ways[] = new way($data);
    }
    return $ways;
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

  public function create($driver,$starting_point,$destination,$car,$date,$time_start,$time_arrival)
  {
    var_dump($driver,$starting_point,$destination,$car,$date,$time_start,$time_arrival);
    $db = $this->dbConnect();
    $newWay = $db->prepare('INSERT INTO way (Driver, Passenger, Starting_point, Destination, Car, Date_way, Time_start, Time_arrival) VALUES (:driver, :passenger, :starting_point, :destination, :car, :date_way, :time_start, :time_arrival)');
    $newWay -> execute(array(
      'driver' => $driver,
      'passenger' => 0,
      'starting_point' => $starting_point,
      'destination' => $destination,
      'car' => $car,
      'date_way' =>$date,
      'time_start' => $time_start,
      'time_arrival' => $time_arrival
    ));
  }

  public function update($id,$starting_point,$destination,$passenger,$car,$date_way,$time_start,$time_arrival)
  {
    $db = $this->dbConnect();
    $updateWay = $db->prepare('UPDATE way SET Driver = :driver, Starting_point = :starting_point, Destination = :destination, Passenger = :passenger, Car = :car, Date_way = :date_way, Time_start = :time_start, Time_arrival = :time_arrival WHERE  ID = :id');
    $updateWay -> execute(array(
      'id' => $id,
      'driver' => $driver,
      'starting_point' => $starting_point,
      'destination' => $destination,
      'passenger' => $passenger,
      'car' => $car,
      'date_way' =>$date_way,
      'time_start' => $time_start,
      'time_arrival' => $time_arrival
    ));
  }

  public function delete($id)
  {
    $db = $this->dbConnect();
    $delete= $db->prepare('DELETE FROM way WHERE ID=?');
    $delete->execute(array($id));
  }
}
