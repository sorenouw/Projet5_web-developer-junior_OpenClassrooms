<?php $meta = "MiamDelice c'est un blog de recettes de cusines familiales pour faire plaisir à ses enfants"; ?>
<?php $title = 'Miamdelice : Recettes de cusine.'; ?>

<?php ob_start(); ?>
<?php include("view/frontend/nav.php"); ?>
<?php include("view/frontend/headerImg.php"); ?>

<img src="public/img/logo.png" alt="" class="headerLogo">
  <h1>Bienvenue sur le blog de recettes de cuisine MiamDelice</h1>
  <p>Dans les souvenirs d'enfance de chaque bon cuisinier se trouve une grande cuisine, une cuisinière en marche, un gâteau qui cuit et une maman.</p>


  <h2>Dérnières recettes</h2>

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

  <h2>#MiamDélice </h2>
 <div id="instafeed"></div>


<?php include("view/frontend/footer.php"); ?>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="public/js/slide.js"></script>
<script type="text/javascript" src="public/js/instafeed.min.js"></script>
<script type="text/javascript" src="public/js/instafeed.js"></script>





<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>
