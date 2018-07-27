<?php $title = 'Miam Délice : Recettes de cusine.'; ?>
<?php ob_start(); ?>
<?php include("view/frontend/nav.php"); ?>
<?php include("view/frontend/headerImg.php"); ?>

<img src="public/img/logo.png" alt="" class="headerLogo">
<section class="index_posts">

  <?php foreach ($articles as $article): $content = substr($article->content(), 0, 500); ?>

    <div class="index_post">
        <h3><?php echo htmlspecialchars($article->title()); ?></h3>
        <em>Publié le <?php echo htmlspecialchars($article->date()); ?></em>
        <p><?php echo $content . ".."; ?></p>
        <a href="index.php?action=commentView&id=<?php echo $article->id() ?>">Lire ce chapitre</a>
    </div>

  <?php endforeach; ?>

</section>

<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>
