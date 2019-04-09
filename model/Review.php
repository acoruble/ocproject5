<?php

class Review extends ReviewManager
{

  protected $id,
  $author,
  $way_id,
  $target,
  $rating,
  $content;


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

  public function setAuthor($author)
  {
    $this->author = $author;
  }

  public function setWay_id($way_id)
  {
    $this->way_id = $way_id;
  }

  public function setTarget($target)
  {
    $this->target = $target;
  }

  public function setRating($rating)
  {
    $this->rating = $rating;
  }

  public function setContent($content)
  {
    $this->content = $content;
  }


  public function id()
  {
    return $this->id;
  }

  public function author()
  {
    return $this->author;
  }

  public function way_id()
  {
    return $this->way_id;
  }

  public function target()
  {
    return $this->target;
  }

  public function rating()
  {
    return $this->rating;
  }

  public function content()
  {
    return $this->content;
  }

}
