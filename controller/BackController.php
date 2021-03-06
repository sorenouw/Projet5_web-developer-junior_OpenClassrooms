<?php

namespace MiamDelice\Blog\Controller;

use \MiamDelice\Blog\Model\Article;
use \MiamDelice\Blog\Model\ArticleManager;
use \MiamDelice\Blog\Model\Comment;
use \MiamDelice\Blog\Model\CommentManager;
use \MiamDelice\Blog\Model\Database;
use \MiamDelice\Blog\Model\Manager;
use \MiamDelice\Blog\Model\User;
use \MiamDelice\Blog\Model\UserManager;

class BackController
{
    public function admin()
    {

        // Récupération des post
        $articleManager = new ArticleManager();
        $articles = $articleManager->getList();

        // Reported comments
        $commentManager = new CommentManager();
        $getReported = $commentManager->getReported();

        include 'view/backend/admin.php';
    }
    public function deletePost()
    {
        $id = $_GET['id'];
        $articleManager = new ArticleManager();
        $file = $articleManager->getPost($id);

        unlink($file->folder());


        $article = new Article(
            array
            (
                'id'=>$id,
            )
        );
        $articleManager->delete($article);
        // delete all comments of this post
        $commentManager = new CommentManager();
        $comment = new Comment(
            array
            (
                'postId'=> $id,
            )
        );
        $commentManager->deleteAll($comment);

        header('Location: index.php?action=admin');
        include 'view/backend/admin.php';
    }
    public function deleteComment()
    {
        $id = $_GET['id'];
        $commentManager = new CommentManager();
        $comment = new Comment(
            array
            (
                'id'=> $id,
            )
        );
        $commentManager->delete($comment);
        header('Location: index.php?action=admin');
        include 'view/backend/admin.php';
    }
    public function editPost()
    {
        // Récupération du post
        $articleManager = new ArticleManager();
        $id = $_GET['id'];
        $checkPost = $articleManager->checkPost($id);
        if ($checkPost) {
            $editPost = $articleManager->getPost($id);

            // édition
            if (isset($_POST['3']) && !empty($_POST)) {
                $post = $_POST['post'];
                $title = $_POST['title'];
                $timing = $_POST['timing'];
                $serving = $_POST['serving'];
                $category = $_POST['category'];
                $id = $_GET['id'];
                $validation = true;
                if (empty($post)) {
                    $validation = false;
                }
                if ($validation === true) {
                    $articleManager = new ArticleManager();
                    $article = new Article(
                        array
                        (
                            'title'=>$title,
                            'content'=>$post,
                            'timing'=> $timing,
                            'serving'=> $serving,
                            'category'=> $category,
                            'id'=> $id,
                        )
                    );
                    $articleManager->editPost($article);
                    header('Location: index.php?action=admin');
                }
            }
            include 'view/backend/editPost.php';
        } else {
            header("location:index.php?action=404");
        }
    }
    public function editComment()
    {
        // Récupération du commentaire
        $commentManager = new CommentManager();
        $id = $_GET['comment_id'];

        $articleManager = new ArticleManager();
        $post_id = $_GET['id'];

        $checkComment = $commentManager->checkComment($id);
        $checkPost = $articleManager->checkPost($post_id);
        if ($checkComment & $checkPost) {
            $editComment = $commentManager->getComment($id);

            if (isset($_POST['2']) && !empty($_POST)) {
                $newComment = $_POST['comment'];
                $id = $_GET['comment_id'];
                $validation = true;
                if (empty($newComment)) {
                    $validation = false;
                }
                if ($validation === true) {
                    $commentManager = new CommentManager();
                    $comment = new Comment(
                        array
                        (
                            'comment'=>$newComment,
                            'id'=> $id,
                        )
                    );
                    $commentManager->editComment($comment);
                    header('Location: index.php?action=commentView&id=' . $_GET['id']);
                }
            }
            include 'view/backend/editComment.php';
        } else {
            header("location:index.php?action=404");
        }
    }
    public function newPost()
    {
        // poster un article
        if (isset($_POST) && !empty($_POST)) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $timing = $_POST['timing'];
            $serving= $_POST['serving'];
            $category = $_POST['category'];
            $folderPath = "public/uploads/" . basename($_FILES["image"]["name"]);
            $validation = true;
            if (empty($title) && empty($content)) {
                $validation = false;
            }
            if (file_exists($folderPath)) {
                echo "Sorry, file already exists.";
                $validation = false;
            }
            if ($validation === true) {
                move_uploaded_file($_FILES["image"]["tmp_name"], "public/uploads/" . $_FILES["image"]["name"]);
                $articleManager = new ArticleManager();
                $article = new Article(
                    array
                    (
                        'title'=> $title,
                        'content'=> $content,
                        'timing'=> $timing,
                        'serving'=> $serving,
                        'category'=> $category,
                        'folder'=> $folderPath,
                    )
                );
                $articleManager->add($article);
            }
            header('Location: index.php');
        }
        include 'view/backend/newPost.php';
    }
}
