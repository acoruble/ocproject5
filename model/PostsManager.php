<?php

require_once("Manager.php");

class PostsManager extends Manager
{
  public function existPost($id)
  {
    $db = $this->dbConnect();
    $exist = $db->prepare('SELECT ID FROM posts WHERE ID=?');
    $exist->execute(array($id));
    $correct = $exist->fetch();
    return $correct;
  }

  public function createPost($title, $content)
  {
    $db = $this->dbConnect();
    $createPost = $db->prepare('INSERT INTO posts(title, content) VALUES(:title, :content)');
    $createPost -> execute(array(
      'title' => $title,
      'content' => $content,
    ));
  }


  public function getFirstPost()
  {
    $db = $this->dbConnect();
    $firstPost = $db->query('SELECT ID, title, content FROM posts ORDER BY ID');
    $data = $firstPost->fetch();
    return new Posts($data);
  }

  public function getPosts($ID)
  {
    $db = $this->dbConnect();
    $postsById = $db->prepare('SELECT ID, title, content FROM posts WHERE ID=? LIMIT 0,1 ');
    $postsById->execute(array($ID));
    $data = $postsById->fetch();
    return new Posts($data);
  }


  public function getListPosts() {
    $posts=[];
    $db = $this->dbConnect();
    $listPosts = $db->query('SELECT * FROM posts ORDER BY ID');
    while($data = $listPosts->fetch())
    {
      $posts[] = new Posts($data);
    }
    return $posts;
  }

  public function update($id, $title, $content) {
    $db = $this->dbConnect();
    $update = $db->prepare('UPDATE posts SET content = :content, title = :title WHERE ID=:id');
    $update->execute(array(
      'id' => $id,
      'title' => $title,
      'content' => $content,
    ));
  }

  public function delete($chapter) {
    $db = $this->dbConnect();
    $delete= $db->prepare('DELETE FROM posts WHERE ID=?');
    $delete->execute(array($chapter));
  }

}
