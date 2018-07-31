<?php


class ImageManager extends Manager
{
    public function add(Image $imagePath)
    {
      $req = $this->getDb()->prepare("INSERT INTO images (folder, image, postId) VALUES (:folder,:image,:postId)");
      $req->execute(array(
        'folder'=> $imagePath->folder(),
        'image'=> $imagePath->image(),
        'postId'=> $imagePath->postId(),
      ));

    }
    public function getImage($id){
      $req = $this->getDb()->prepare("SELECT * FROM images WHERE postId = :postId");
      $req->execute(array(
        'postId'=> $id,
      ));
      $getImage =  $req->fetch();
      return  $getImage;

    }
}
