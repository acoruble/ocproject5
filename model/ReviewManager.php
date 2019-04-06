<?php

require_once("Manager.php");

class ReviewManager extends Manager
{
  public function existReview($way_id)
  {
    $db = $this->dbConnect();
    $exist = $db->prepare('SELECT Target FROM review WHERE Way_ID=?');
    $exist->execute(array($way_id));
    $correct = $exist->fetch();
    return $correct;
  }

  public function createReview($author, $way_id, $target, $rating, $content)
  {
    $db = $this->dbConnect();
    $createReview = $db->prepare('INSERT INTO review(Author, Way_ID, Target, Rating, Content) VALUES(:author, :way_id, :target, :rating, :content)');
    $createReview -> execute(array(
      'author' => $author,
      'way_id' => $way_id,
      'target' => $target,
      'rating' => $rating,
      'content' => $content,
    ));
  }

  //
  // public function getFirstReview()
  // {
  //   $db = $this->dbConnect();
  //   $firstReview = $db->query('SELECT ID, title, content FROM review ORDER BY ID');
  //   $data = $firstReview->fetch();
  //   return new Review($data);
  // }

  public function getReview($id_target)
  {
    $reviews=[];
    $db = $this->dbConnect();
    $someReviews = $db->prepare('SELECT * FROM review WHERE target=?');
    $someReviews->execute(array($id_target));
    while ($data = $someReviews->fetch())
    {
      $reviews[] = new Review($data);
    }
    return $reviews;
  }


  // public function getListReview() {
  //   $review=[];
  //   $db = $this->dbConnect();
  //   $listReview = $db->query('SELECT * FROM review ORDER BY ID');
  //   while($data = $listReview->fetch())
  //   {
  //     $review[] = new Review($data);
  //   }
  //   return $review;
  // }

  public function update($id, $title, $content) {
    $db = $this->dbConnect();
    $update = $db->prepare('UPDATE review SET content = :content, title = :title WHERE ID=:id');
    $update->execute(array(
      'id' => $id,
      'title' => $title,
      'content' => $content,
    ));
  }

  public function delete($chapter) {
    $db = $this->dbConnect();
    $delete= $db->prepare('DELETE FROM review WHERE ID=?');
    $delete->execute(array($chapter));
  }

}
