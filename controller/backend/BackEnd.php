<?php

/**
*
*/
class backend
{


  // public function connection_post()
  // {
  //   require ('view/backend/account/my_account.php');
  // }








  //
  //   public function displaycreate()
  //   {
  //       require ('view/backend/createreview.php');
  //   }
  //
  //   public function create()
  //   {
  //     if (!is_string($_POST['title']) || empty($_POST['title']) || !is_string($_POST['content']) || empty($_POST['content']))
  //     {
  //       echo "<div class='alert alert-danger' role='alert'>Merci de vérifier votre titre et votre texte.</div>";
  //       require ('view/backend/createreview.php');
  //     }
  //     else {
  //       $reviews = new Reviews();
  //       $reviews->createReview(htmlspecialchars($_POST['title']),$_POST['content']);
  //       header('Location: index.php?admin=board');
  //     }
  //   }
  //
  //   public function delete()
  //   {
  //     $reviews = new Reviews();
  //     $correct = $reviews-> existReview($_GET['idChapterDelete']);
  //     if (!$correct)
  //     {
  //       header('Location: index.php?admin=board');
  //       echo "<div class='alert alert-danger' role='alert'>Nous avons un problème, merci de recommencer votre suppression.</div>";
  //     }
  //     else
  //     {
  //       $reviews->delete($_GET['idChapterDelete']);
  //     }
  //   }
  //
  //   public function update()
  //   {
  //     $reviews = new Reviews();
  //     $correct = $reviews-> existReview($_GET['id']);
  //     if (!$correct)
  //     {
  //       header('Location: index.php?admin=board');
  //       echo "<div class='alert alert-danger' role='alert'>Merci de sélectionner un chapitre.</div>";
  //     }
  //     else
  //     {
  //       $review = $reviews-> getReviews($_GET['id']);
  //       require ('view/backend/updatereview.php');
  //     }
  //   }
  //
  //   public function reviewupdate()
  //   {
  //     $reviews = new Reviews();
  //     $correct = $reviews-> existReview($_POST['id']);
  //     if (!$correct)
  //     {
  //       echo "<div class='alert alert-danger' role='alert'>Merci de sélectionner un chapitre.</div>";
  //     }
  //     else
  //     {
  //     $reviews-> update($_POST['id'], $_POST['title'], $_POST['content']);
  //     }
  //   }
  //
  //   public function control()
  //   {
  //       $reviews = new Reviews();
  //       $correct = $reviews-> existReview($_GET['id']);
  //       if (!$correct)
  //       {
  //         echo "<div class='alert alert-danger' role='alert'>Merci de sélectionner un chapitre.</div>";
  //       }
  //       else
  //       {
  //         $comments = new Comments();
  //         $listComments = $comments->getComments($_GET['titleChapter']);
  //         require ('view/backend/controlcomments.php');
  //       }
  //   }
  //
  //   public function deletecomment()
  //   {
  //     $comments = new Comments();
  //     $correct = $comments-> existComment($_GET['id']);
  //     if (!$correct)
  //     {
  //       echo "<div class='alert alert-danger' role='alert'>Nous avons un problème, merci de recommencer votre signalement.</div>";
  //     }
  //     else
  //     {
  //       $comment = new Comments();
  //       $comment->delete($_GET['id']);
  //     }
  //   }
  //
  //   public function logout()
  //   {
  //     $user = new User();
  //     $user->logout();
  //   }
}
