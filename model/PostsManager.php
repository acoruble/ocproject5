<?php

require_once("Manager.php");

class ReviewsManager extends Manager
{
  public function existReview($id)
  {
    $db = $this->dbConnect();
    $exist = $db->prepare('SELECT ID FROM reviews WHERE ID=?');
    $exist->execute(array($id));
    $correct = $exist->fetch();
    return $correct;
  }

  public function createReview($title, $content)
  {
    $db = $this->dbConnect();
    $createReview = $db->prepare('INSERT INTO reviews(title, content) VALUES(:title, :content)');
    $createReview -> execute(array(
      'title' => $title,
      'content' => $content,
    ));
  }


  public function getFirstReview()
  {
    $db = $this->dbConnect();
    $firstReview = $db->query('SELECT ID, title, content FROM reviews ORDER BY ID');
    $data = $firstReview->fetch();
    return new Reviews($data);
  }

  public function getReviews($ID)
  {
    $db = $this->dbConnect();
    $reviewsById = $db->prepare('SELECT ID, title, content FROM reviews WHERE ID=? LIMIT 0,1 ');
    $reviewsById->execute(array($ID));
    $data = $reviewsById->fetch();
    return new Reviews($data);
  }


  public function getListReviews() {
    $reviews=[];
    $db = $this->dbConnect();
    $listReviews = $db->query('SELECT * FROM reviews ORDER BY ID');
    while($data = $listReviews->fetch())
    {
      $reviews[] = new Reviews($data);
    }
    return $reviews;
  }

  public function update($id, $title, $content) {
    $db = $this->dbConnect();
    $update = $db->prepare('UPDATE reviews SET content = :content, title = :title WHERE ID=:id');
    $update->execute(array(
      'id' => $id,
      'title' => $title,
      'content' => $content,
    ));
  }

  public function delete($chapter) {
    $db = $this->dbConnect();
    $delete= $db->prepare('DELETE FROM reviews WHERE ID=?');
    $delete->execute(array($chapter));
  }

}
