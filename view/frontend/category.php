<?php $meta = "Tout(e) les " . $category . " réalisé(e)s par MiamDelice"; ?>
<?php $title = 'MiamDelice : ' . $category ; ?>
<?php ob_start(); ?>
<?php include("view/frontend/nav.php"); ?>
<?php include("view/frontend/headerImg.php"); ?>

<img src="public/img/logo.png" alt="" class="headerLogo">

  <h2> <?php echo $category ?> </h2>

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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="public/js/slide.js"></script>
<?php include("view/frontend/footer.php"); ?>
<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>
