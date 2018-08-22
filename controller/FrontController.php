<?php

use \MiamDelice\Blog\Model\Article;
use \MiamDelice\Blog\Model\ArticleManager;
use \MiamDelice\Blog\Model\Comment;
use \MiamDelice\Blog\Model\CommentManager;
use \MiamDelice\Blog\Model\Database;
use \MiamDelice\Blog\Model\Manager;
use \MiamDelice\Blog\Model\User;
use \MiamDelice\Blog\Model\UserManager;

class FrontController
{
    public function home()
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->getList();

        include 'view/frontend/home.php';
    }
    public function category()
    {
        $articleManager = new ArticleManager();
        $id = $_GET['id'];
        $category;
        switch ($id) {
        case 1:
            $category =   "Entrée";
            break;
        case 2:
            $category =     "Plats";
            break;
        case 3:
            $category =    "Desserts";
            break;
        }

        $article = new Article(
            array(
            'category'=>$id,
            )
        );
        $articles = $articleManager->getCategory($article);

        $commentManager = new CommentManager();
        $postId = $_GET['id'];
        $comment = new Comment(
            array(
            'postId'=>$postId,
            )
        );
        $comments = $commentManager->getList($comment);

        include 'view/frontend/category.php';
    }
    public function commentView()
    {
        // Récupération du billet
        $articleManager = new ArticleManager();
        $id = $_GET['id'];
        $checkPost = $articleManager->checkPost($id);
        if ($checkPost) {
            $post = $articleManager->getPost($id);

            // post de commentaire
            if (isset($_POST['1']) && !empty($_POST)) {
                $auteur = $_POST['author'];
                $commentaire = $_POST['comment'];
                $postId = $_GET['id'];
                $validation = true;
                if (empty($auteur) || empty($commentaire)) {
                    $validation = false;
                    $_SESSION["flash"] = "Vous avez oublier de remplir le champ Auteur ou le champ Commentaire.";
                }
                if ($validation === true) {
                    $commentManager = new CommentManager();
                    $comment = new Comment(
                        array(
                        'login'=> $auteur,
                        'comment'=> $commentaire,
                        'postId'=> $postId,
                        )
                    );
                    $commentManager->add($comment);
                }
            } elseif (isset($_POST['2'])) {
                $id = $_GET['comment_id'];
                $commentManager = new CommentManager();
                $comment = new Comment(
                    array(
                    'id'=> $id,
                    )
                );
                $commentManager->report($comment);
                $_SESSION["flash"] = "Vous avez bien signaler le commentaire.";
            } elseif (isset($_POST['5'])) {
                $id = $_GET['comment_id'];
                $commentManager = new CommentManager();
                $comment = new Comment(
                    array(
                    'id'=> $id,
                    )
                );
                $commentManager->delete($comment);
            }

            //  récupération des Commentaires
            $commentManager = new CommentManager();
            $postId = $_GET['id'];
            $comment = new Comment(
                array(
                'postId'=>$postId,
                )
            );
            $comments = $commentManager->getList($comment);

            include 'view/frontend/commentView.php';
        } else {
            header("location:index.php?action=404");
        }
    }


    public function login()
    {
        if (!empty($_POST['login']) && !empty($_POST['password'])) {
            $userManager = new UserManager();
            $login = $_POST["login"];
            $password = $_POST["password"];
            $user = new User(
                array(
                'login' => $login,
                'password' => $password,
                )
            );
            $data = $userManager->getUser($user);
            if ($data!=false) {
                $message = "Connexion réussie";
                $_SESSION["user"] = $login;
                header("location:index.php?action=admin");
            } else {
                $message = "Le nom d'utilisateur ou le mot de passe est érroné";
            }
        } elseif (!empty($_POST['login']) || !empty($_POST['password'])) {
            $message = "Le nom d'utilisateur ou le mot de passe est érroné";
        }
        include 'view/frontend/login.php';
    }

    public function errorPage()
    {
        include 'view/frontend/errorPage.php';
    }
    public function mentions()
    {
        include 'view/frontend/mentions.php';
    }
    public function qui()
    {
        include 'view/frontend/quisuisje.php';
    }
    public function disconnect()
    {
        session_destroy();
        header("location:index.php");
    }
}
