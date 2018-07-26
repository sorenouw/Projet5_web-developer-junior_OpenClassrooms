<?php

class ArticleManager extends Manager {

  public function add(Article $article){
    $req = $this->getDb()->prepare("INSERT INTO post (title, content,date_publish) VALUES (:title, :content, now()) ");
    $req->execute(array(
      'title'=> $article->title(),
      'content'=> $article->content(),
    ));
   }

   public function getList(){
     $articles = [];
     $req = $this->getDb()->query("SELECT id, title, content, DATE_FORMAT(date_publish, '%d/%m/%Y à %Hh%imin%ss') AS date_publish FROM post ORDER BY date_publish DESC LIMIT 0, 9");
     while ($data = $req->fetch()){
       $articles[]=new Article($data);
     }
     return $articles;
   }

   public function getPost($id){
     $req = $this->getDb()->prepare("SELECT id, title, content, DATE_FORMAT(date_publish, '%d/%m/%Y à %Hh%imin%ss') AS date_publish FROM post WHERE id = :id");
     $req->execute(array(
       'id'=> $id,
     ));
     $getPost = new Article($req->fetch());
     return  $getPost;

   }

   public function editPost(Article $article){
     $req = $this->getDb()->prepare("UPDATE post SET content = :content WHERE id = :id");
     $req->execute(array(
     'content'=> $article->content(),
     'id'=> $article->id(),
     ));
   }

   public function delete(Article $article){
     $req= $this->getDb()->prepare("DELETE FROM post WHERE id = :id");
     $req->execute(array(
             'id'=> $article->id(),
         ));
   }

   public function checkPost($id){
     $req = $this->getDb()->prepare("SELECT * FROM post WHERE id = :id");
     $req->execute(array(
       'id'=> $id,
     ));
     $getPost = $req->fetch();
     return  $getPost;

   }
}
