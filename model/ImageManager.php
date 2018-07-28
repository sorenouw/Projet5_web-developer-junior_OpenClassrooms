<?php


class UserManager extends Manager
{
    public function add($imagePath)
    {
      $req = $this->getDb()->prepare("INSERT INTO image VALUES(:folder,:image,:postId)");
      $req->execute(array(
        'title'=> $article->title(),
        'content'=> $article->content(),
      ));

    }
}
