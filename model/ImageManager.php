<?php


class imageManager extends Manager
{
    public function add($imagePath)
    {
      $req = $this->getDb()->prepare("INSERT INTO images VALUES(:folder,:image,:postId)");
      $req->execute(array(
        'folder'=> $imagePath->folder(),
        'image'=> $imagePath->image(),
        'postId'=> $imagePath->postId(),
      ));

    }
}
