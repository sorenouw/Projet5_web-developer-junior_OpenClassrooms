<?php

namespace MiamDelice\Blog\Model;

class Article
{
    private $title;
    private $content;
    private $timing;
    private $serving;
    private $category;
    private $folder;
    private $date;
    private $id;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        if (isset($data["title"])) {
            $this->setTitle($data[ "title"]);
        }
        if (isset($data["content"])) {
            $this->setContent($data[ "content"]);
        }
        if (isset($data["timing"])) {
            $this->setTiming($data[ "timing"]);
        }
        if (isset($data["serving"])) {
            $this->setServing($data[ "serving"]);
        }
        if (isset($data["category"])) {
            $this->setCategory($data[ "category"]);
        }
        if (isset($data["folder"])) {
            $this->setFolder($data[ "folder"]);
        }
        if (isset($data["date_publish"])) {
            $this->setDate($data[ "date_publish"]);
        }
        if (isset($data["id"])) {
            $this->setId($data[ "id"]);
        }
    }

    // Getters
    public function title()
    {
        return $this->title;
    }

    public function content()
    {
        return $this->content;
    }

    public function timing()
    {
        return $this->timing;
    }

    public function serving()
    {
        return $this->serving;
    }

    public function category()
    {
        return $this->category;
    }

    public function folder()
    {
        return $this->folder;
    }

    public function date()
    {
        return $this->date;
    }

    public function id()
    {
        return $this->id;
    }

    // Setters
    public function setTitle($title)
    {
        if (is_string($title)) {
            $this->title = $title;
        }
    }

    public function setContent($content)
    {
        if (is_string($content)) {
            $this->content = $content;
        }
    }

    public function setTiming($timing)
    {
        if (is_string($timing)) {
            $this->timing = $timing;
        }
    }

    public function setServing($serving)
    {
        if (is_string($serving)) {
            $this->serving = $serving;
        }
    }

    public function setcategory($category)
    {
        if (is_string($category)) {
            $this->category = $category;
        }
    }

    public function setFolder($folder)
    {
        if (is_string($folder)) {
            $this->folder = $folder;
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
}
