<?php
class Image {
  private $_folder;
  private $_image;
  private $_postId;


  public function __construct(Array $data){
    $this->hydrate($data);
  }

  public function hydrate(Array $data){
    if(isset($data["folder"])){
      $this->setFolder($data[ "folder"]);
    }
    if(isset($data["image"])){
      $this->setImage($data[ "image"]);
    }
    if(isset($data["postId"])){
      $this->setPostId($data[ "postId"]);
    }
  }

  // Getters
  public function folder(){
    return $this->_folder;
  }

  public function image(){
    return $this->_image;
  }

  public function postId(){
    return $this->_postId;
  }

  // Setters
  public function setFolder($folder){
    if(is_string($folder)){
      $this->_folder = $folder;
    }

  }
  public function setImage($image){
    if(is_string($image)){
      $this->_image = $image;
    }
  }
  public function setPostId($postId){
    $this->_postId = $postId;
  }
}
