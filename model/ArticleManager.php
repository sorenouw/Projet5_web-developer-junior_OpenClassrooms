<?php

namespace MiamDelice\Blog\Model;

class ArticleManager extends Manager
{
    public function add(Article $article)
    {
        $req = $this->getDb()->prepare("INSERT INTO post (title, content, timing, serving, category, folder, date_publish) VALUES (:title, :content, :timing, :serving, :category, :folder, now()) ");
        $req->execute(
            array
            (
                'title'=> $article->title(),
                'content'=> $article->content(),
                'timing' => $article->timing(),
                'serving' => $article->serving(),
                'category' => $article->category(),
                'folder'=> $article->folder(),
            )
        );
    }

    public function getList()
    {
        $articles = [];
        $req = $this->getDb()->query("SELECT id, title, folder,  DATE_FORMAT(date_publish, '%d/%m/%Y à %Hh%imin%ss') AS date_publish FROM post ORDER BY date_publish DESC LIMIT 0, 12");
        while ($data = $req->fetch()) {
            $articles[]=new Article($data);
        }
        return $articles;
    }

    public function getCategory(Article $article)
    {
        $articles = [];
        $req = $this->getDb()->prepare("SELECT * FROM post WHERE category = :category ORDER BY date_publish DESC");
        $req->execute(
            array
            (
                'category'=> $article->category(),
            )
        );
        while ($data = $req->fetch()) {
            $articles[]=new Article($data);
        }
        return $articles;
    }

    public function getPost($id)
    {
        $req = $this->getDb()->prepare("SELECT id, title, content, timing, serving, category, folder, DATE_FORMAT(date_publish, '%d/%m/%Y à %Hh%imin%ss') AS date_publish FROM post WHERE id = :id");
        $req->execute(
            array
            (
                'id'=> $id,
            )
        );
        $getPost = new Article($req->fetch());
        return  $getPost;
    }

    public function editPost(Article $article)
    {
        $req = $this->getDb()->prepare("UPDATE post SET title = :title, content = :content, timing = :timing, serving = :serving, category = :category WHERE id = :id");
        $req->execute(
            array
            (
                'title' => $article->title(),
                'content'=> $article->content(),
                'timing' => $article->timing(),
                'serving' => $article->serving(),
                'category' => $article->category(),
                'id'=> $article->id(),
            )
        );
    }

    public function delete(Article $article)
    {
        $req= $this->getDb()->prepare("DELETE FROM post WHERE id = :id");
        $req->execute(
            array
            (
                'id'=> $article->id(),
            )
        );
    }

    public function checkPost($id)
    {
        $req = $this->getDb()->prepare("SELECT * FROM post WHERE id = :id");
        $req->execute(
            array
            (
                'id'=> $id,
            )
        );
        $getPost = $req->fetch();
        return  $getPost;
    }
}
