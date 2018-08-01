<?php $title = 'Miam Délice : Recettes de cusine.'; ?>
<?php ob_start(); ?>
<?php include("view/frontend/nav.php"); ?>
<?php include("view/frontend/headerImg.php"); ?>

<img src="public/img/logo.png" alt="" class="headerLogo">
<section class="index_posts">

    <?php foreach ($articles as $article): ?>

      <figure>
          <a href="index.php?action=commentView&id=<?php echo $article->id() ?>"><img src="<?php echo $article->folder() ;?>"/></img></a>
        <figcaption>
          <p><strong><?php echo htmlspecialchars($article->title()); ?></strong></p>
        </figcaption>
      </figure>


  <?php endforeach; ?>

</section>

<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>
