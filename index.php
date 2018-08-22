<?php
session_start();

require "vendor/autoload.php";


$loader = new Nette\Loaders\RobotLoader;

// Add directories for RobotLoader to index
$loader->addDirectory(__DIR__ . '/controller');
$loader->addDirectory(__DIR__ . '/model');

// And set caching to the 'temp' directory
$loader->setTempDirectory(__DIR__ . '/temp');
$loader->register(); // Run the RobotLoader


use MiamDelice\Blog\Controller\BackController;
use MiamDelice\Blog\Controller\FrontController;

  $frontController = new FrontController();
  $backController = new BackController();


if (empty($_SERVER["QUERY_STRING"])) {
    $frontController->home();
} elseif (isset($_GET['action'])) {
    if ($_GET['action'] == 'commentView') {
        $frontController->commentView();
    }
    if ($_GET['action'] == 'category') {
        $frontController->category();
    } elseif ($_GET['action'] == 'login') {
        $frontController->login();
    } elseif ($_GET['action'] == 'disconnect') {
        $frontController->disconnect();
    } elseif ($_GET['action'] == 'admin') {
        $backController->admin();
    } elseif ($_GET['action'] == 'editPost') {
        $backController->editPost();
    } elseif ($_GET['action'] == 'editComment') {
        $backController->editComment();
    } elseif ($_GET['action'] == 'newPost') {
        $backController->newPost();
    } elseif ($_GET['action'] == 'deletePost') {
        $backController->deletePost();
    } elseif ($_GET['action'] == 'deleteComment') {
        $backController->deleteComment();
    } elseif ($_GET['action'] == '404') {
        $frontController->errorPage();
    } elseif ($_GET['action'] == 'mentions') {
        $frontController->mentions();
    } elseif ($_GET['action'] == 'qui') {
        $frontController->qui();
    }
} else {
    listPosts();
}
