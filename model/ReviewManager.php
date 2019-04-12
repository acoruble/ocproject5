<?php

require_once("Manager.php");

class ReviewManager extends Manager
{
  public function existReview($way_id)
  {
    $db = $this->dbConnect();
    $exist = $db->prepare('SELECT author FROM review WHERE Way_ID=?');
    $exist->execute(array($way_id));
    $author = $exist->fetch();
    return $author;
  }

  public function createReview($author, $way_id, $target, $rating, $content)
  {
    $db = $this->dbConnect();
    $createReview = $db->prepare('INSERT INTO review(Status, Author, Way_ID, Target, Rating, Content) VALUES(:status, :author, :way_id, :target, :rating, :content)');
    $createReview -> execute(array(
      'status' => "En attente de validation",
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
    $someReviews = $db->prepare('SELECT * FROM review WHERE target=? AND status="Validé"');
    $someReviews->execute(array($id_target));
    while ($data = $someReviews->fetch())
    {
      $reviews[] = new Review($data);
    }
    return $reviews;
  }


  public function getListReview() {
    $review=[];
    $status = "En attente de validation";
    $db = $this->dbConnect();
    $listReview = $db->prepare('SELECT * FROM review WHERE Status = :status ORDER BY ID');
    $listReview -> execute(array(
      'status' => $status,
    ));
    while($data = $listReview->fetch())
    {
      $review[] = new Review($data);
    }
    return $review;
  }

  // public function update($id, $title, $content) {
  //   $db = $this->dbConnect();
  //   $update = $db->prepare('UPDATE review SET content = :content, title = :title WHERE ID=:id');
  //   $update->execute(array(
  //     'id' => $id,
  //     'title' => $title,
  //     'content' => $content,
  //   ));
  // }

  public function validation($id) {
    $status = "Validé";
    $db = $this->dbConnect();
    $validation = $db->prepare('UPDATE review SET Status = :status WHERE ID = :id');
    $validation -> execute (array(
      'id' => $id,
      'status' => $status,
    ));
  }

  public function delete($id) {
    $db = $this->dbConnect();
    $delete= $db->prepare('DELETE FROM review WHERE ID=?');
    $delete->execute(array($id));
  }

}
