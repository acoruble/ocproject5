<?php

class User extends UserManager
{

  protected $errors = [],
            $id,
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
    if (!is_string($name) || empty($name))
    {
      $this->errors[] = self::content_INVALID;
    }
    else
    {
      $this->name = $name;
    }
  }

  public function setSurname($surname)
  {
    if (!is_string($surname) || empty($surname))
    {
      $this->errors[] = self::content_INVALID;
    }
    else
    {
      $this->surname = $surname;
    }
  }

  public function setPassword($password)
  {
    if (!is_string($password) || empty($password))
    {
      $this->errors[] = self::content_INVALID;
    }
    else
    {
      $this->password = $password;
    }
  }

  public function setEmail($email)
  {
    if (!is_string($email) || empty($email))
    {
      $this->errors[] = self::content_INVALID;
    }
    else
    {
      $this->email = $email;
    }
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
