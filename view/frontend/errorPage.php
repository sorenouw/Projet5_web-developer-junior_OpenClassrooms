<?php $title = 'Miamdelice : Erreur 404'; ?>
<?php ob_start(); ?>


  <img src="public/img/404.png" alt="" class="">
  <br>
  <a class="pink button" href="index.php">Accueil !</a>


<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>
