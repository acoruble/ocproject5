<?php

class User extends UserManager
{

  protected $id,
            $name,
            $surname,
            $password,
            $email;

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

  public function setName($name)
  {
      $this->name = $name;
  }

  public function setSurname($surname)
  {
      $this->surname = $surname;
  }

  public function setPassword($password)
  {
      $this->password = $password;
  }

  public function setEmail($email)
  {
      $this->email = $email;
  }

  public function id()
  {
    return $this->id;
  }

  public function name()
  {
    return $this->name;
  }

  public function surname()
  {
    return $this->surname;
  }

  public function password()
  {
    return $this->password;
  }

  public function email()
  {
    return $this->email;
  }

}
