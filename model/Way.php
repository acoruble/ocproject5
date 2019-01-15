<?php

class Way extends WayManager
{

  protected $id,
            $driver,
            $starting_point,
            $destination,
            $passenger,
            $car,
            $date_way,
            $time_start,
            $time_arrival;


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
      $this->passenger = $passenger;
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

  public function id()
  {
    return $this->id;
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

}
