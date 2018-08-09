<?php
class Article {
  private $_title;
  private $_content;
  private $_timing;
  private $_serving;
  private $_category;
  private $_folder;
  private $_date;
  private $_id;

  public function __construct(Array $data){
    $this->hydrate($data);
  }

  public function hydrate(Array $data){
    if(isset($data["title"])){
      $this->setTitle($data[ "title"]);
    }
    if(isset($data["content"])){
      $this->setContent($data[ "content"]);
    }
    if(isset($data["timing"])){
      $this->setTiming($data[ "timing"]);
    }
    if(isset($data["serving"])){
      $this->setServing($data[ "serving"]);
    }
    if(isset($data["category"])){
      $this->setCategory($data[ "category"]);
    }
    if(isset($data["folder"])){
      $this->setFolder($data[ "folder"]);
    }
    if(isset($data["date_publish"])){
      $this->setDate($data[ "date_publish"]);
    }
    if(isset($data["id"])){
      $this->setId($data[ "id"]);
    }
  }

  // Getters
  public function title(){
    return $this->_title;
  }

  public function content(){
    return $this->_content;
  }

  public function timing(){
    return $this->_timing;
  }

  public function serving(){
    return $this->_serving;
  }

  public function category(){
    return $this->_category;
  }

  public function folder(){
    return $this->_folder;
  }

  public function date(){
    return $this->_date;
  }
  public function id(){
    return $this->_id;
  }

  // Setters
  public function setTitle($title){
    if(is_string($title)){
      $this->_title = $title;
    }

  }
  public function setContent($content){
    if(is_string($content)){
      $this->_content = $content;
    }
  }
  public function setTiming($timing){
    if(is_string($timing)){
      $this->_timing = $timing;
    }
  }
  public function setServing($serving){
    if(is_string($serving)){
      $this->_serving = $serving;
    }
  }
  public function setcategory($category){
    if(is_string($category)){
      $this->_category = $category;
    }
  }
  public function setFolder($folder){
    if(is_string($folder)){
      $this->_folder = $folder;
    }
  }
  public function setDate($date){
    $this->_date = $date;
  }
  public function setId($id){
    $this->_id = $id;
  }
}
