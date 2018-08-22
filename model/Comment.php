<?php

namespace MiamDelice\Blog\Model;

class Comment
{
    private $login;
    private $comment;
    private $date;
    private $id;
    private $post_id;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        if (isset($data["login"])) {
            $this->setLogin($data[ "login"]);
        }
        if (isset($data["comment"])) {
            $this->setContent($data[ "comment"]);
        }
        if (isset($data["date_publish"])) {
            $this->setDate($data[ "date_publish"]);
        }
        if (isset($data["id"])) {
            $this->setId($data[ "id"]);
        }
        if (isset($data["postId"])) {
            $this->setPostId($data[ "postId"]);
        }
    }

    // Getters
    public function login()
    {
        return $this->login;
    }

    public function comment()
    {
        return $this->comment;
    }

    public function date()
    {
        return $this->date;
    }

    public function id()
    {
        return $this->id;
    }

    public function postId()
    {
        return $this->post_id;
    }

    // Setters
    public function setLogin($login)
    {
        if (is_string($login)) {
            $this->login = $login;
        }
    }

    public function setContent($comment)
    {
        if (is_string($comment)) {
            $this->comment = $comment;
        }
    }
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPostId($postId)
    {
        $this->post_id = $postId;
    }
}
