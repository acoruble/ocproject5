<?php

class Way extends WayManager
{

  protected $id,
  $status,
  $driver,
  $starting_point,
  $destination,
  $passenger,
  $car,
  $date_way,
  $time_start,
  $time_arrival,
  $passenger_1,
  $passenger_2,
  $passenger_3,
  $passenger_4,
  $passenger_5,
  $passenger_6;


  public function __construct(array $data = null)
  {
    if (!empty ($data)) {
      $this->hydrate($data);
    }
  }

  public function hydrate(array $data)
  {
    foreach ($data as $key => $value)
    {
      $method = 'set'.ucfirst($key);
      if (method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }

  public function setId($id)
  {
    $this->id = (int) $id;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function setDriver($driver)
  {
    $this->driver = $driver;
  }

  public function setStarting_point($starting_point)
  {
    $this->starting_point = $starting_point;
  }

  public function setDestination($destination)
  {
    $this->destination = $destination;
  }

  public function setPassenger($passenger)
  {
    $this->passenger = (int) $passenger;
  }

  public function setCar($car)
  {
    $this->car = $car;
  }

  public function setDate_way($date_way)
  {
    $this->date_way = $date_way;
  }

  public function setTime_start($time_start)
  {
    $this->time_start = $time_start;
  }

  public function setTime_arrival($time_arrival)
  {
    $this->time_arrival = $time_arrival;
  }

  public function setPassenger_1($passenger_1)
  {
    $this->passenger_1 = (int) $passenger_1;
  }

  public function setPassenger_2($passenger_2)
  {
    $this->passenger_2 = (int) $passenger_2;
  }

  public function setPassenger_3($passenger_3)
  {
    $this->passenger_3 = (int) $passenger_3;
  }

  public function setPassenger_4($passenger_4)
  {
    $this->passenger_4 = (int) $passenger_4;
  }

  public function setPassenger_5($passenger_5)
  {
    $this->passenger_5 = (int) $passenger_5;
  }

  public function setPassenger_6($passenger_6)
  {
    $this->passenger_6 = (int) $passenger_6;
  }

  public function id()
  {
    return $this->id;
  }

  public function status()
  {
    return $this->status;
  }

  public function driver()
  {
    return $this->driver;
  }

  public function starting_point()
  {
    return $this->starting_point;
  }

  public function destination()
  {
    return $this->destination;
  }

  public function passenger()
  {
    return $this->passenger;
  }

  public function car()
  {
    return $this->car;
  }

  public function date_way()
  {
    return $this->date_way;
  }

  public function time_start()
  {
    return $this->time_start;
  }

  public function time_arrival()
  {
    return $this->time_arrival;
  }

  public function passenger_1()
  {
    return $this->passenger_1;
  }

  public function passenger_2()
  {
    return $this->passenger_2;
  }

  public function passenger_3()
  {
    return $this->passenger_3;
  }

  public function passenger_4()
  {
    return $this->passenger_4;
  }

  public function passenger_5()
  {
    return $this->passenger_5;
  }

  public function passenger_6()
  {
    return $this->passenger_6;
  }

}
