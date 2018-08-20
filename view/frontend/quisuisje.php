<?php $meta = "Mais qui se trouve dérrière MiamDelice ? C'est ici que vous trouverez réponse à cette question."; ?>
<?php $title = 'Miamdelice :  Mentions légales'; ?>
<?php ob_start(); ?>
<?php include("view/frontend/nav.php"); ?>
<?php include("view/frontend/headerImg.php"); ?>
<img src="public/img/logo.png" alt="" class="headerLogo">

<h2>Qui est dérrière MiamDélice ?</h2>

<img src="public/img/me.jpg" alt="" class="me">

<?php include("view/frontend/footer.php"); ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="public/js/slide.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>
