<?php

class Reviews extends ReviewsManager
{

  protected $id,
            $title,
            $content,
            $errors = [];

  const title_INVALID = 1;
  const content_INVALID = 2;


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

  public function setTitle($title)
  {
    if (!is_string($title) || empty($title))
    {
      $this->errors[] = self::title_INVALID;
    }
    else
    {
      $this->title = $title;
    }
  }

  public function setContent($content)
  {
    if (!is_string($content) || empty($content))
    {
      $this->errors[] = self::content_INVALID;
    }
    else
    {
      $this->content = $content;
    }
  }

  public function errors()
  {
    return $this->errors;
  }

  public function id()
  {
    return $this->id;
  }

  public function title()
  {
    return $this->title;
  }

  public function content()
  {
    return $this->content;
  }

}
