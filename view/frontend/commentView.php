  <?php $meta = "Vous pouvez retrouver la recette : " . $post->title() . " ainsi que les commentaires publiés par les internautes"; ?>
  <?php $title = 'Miamdelice : ' . $post->title(); ?>
  <?php ob_start(); ?>
  <?php include("view/frontend/nav.php"); ?>
  <?php include("view/frontend/headerImg.php"); ?>


<img src="public/img/logo.png" alt="" class="headerLogo">

<?php

// commentaire signalé ou erreur pour commenter
if (isset($_SESSION["flash"])) {
    ?>
<h5>
<?php
echo $_SESSION["flash"]; ?>
</h5>
<?php
  unset($_SESSION["flash"]);
}
?>

  <article class="">
    <div class="post_view">
      <div class="postImg">
            <img class="postImg" src="<?php echo $post->folder() ;?>"/></img>
      </div>
      <div class="postText">
                <h3><?php echo $post->title(); ?></h3>
                <p><?php echo $post->timing(); ?> <i class="fas fa-stopwatch"></i></p>
                <p>Pour <?php echo $post->serving(); ?> personnes. <i class="fas fa-utensils"></i></p>
                    <p>le <?php echo $post->date(); ?></p>
      </div>
    </div>


    <p><?php echo $post->content();?></p>

  </article>


  <h3>Commentaires</h3>
<?php foreach ($comments as $comment): ?>
  <div class="comment">
    <div class="comment_title">
      <p><strong><?php echo htmlspecialchars($comment->login()); ?></strong> le
        <?php echo $comment->date(); ?></p>
    </div>
    <div class="comment_content">
      <p>
        <?php echo nl2br(htmlspecialchars($comment->comment())); ?>
      </p>
    </div>
    <div class="comment_button">
        <?php if (!empty($_SESSION["user"])) {
        ?>
        <button class="green button" type="button" name="button"><a class="green"  href="index.php?action=editComment&id=<?= $_GET['id']?>&comment_id=<?= $comment->id(); ?>"> modifier</a></button>

				<form class="" action="index.php?action=commentView&id=<?php echo $post->id(); ?>&comment_id=<?= $comment->id(); ?>" method="post">
					<button class="red button" type="submit" name="5">Supprimer</button>
				</form>
        <?php
    } ?>
          <form class="" action="index.php?action=commentView&id=<?= $_GET[ 'id']; ?>&comment_id=<?= $comment->id();?>" method="post">
            <button class="red button" type="submit" name="2">Signaler</button>
          </form>
    </div>
  </div>
<?php endforeach; ?>

    <form action="index.php?action=commentView&id=<?= $_GET['id']  ?>" method="post">
      <div>
        <input type="text" id="author" name="author" placeholder="Votre nom" />
      </div>
      <div>
        <textarea rows="4" cols="40" id="comment" name="comment" placeholder="Commentez ici !"></textarea>
      </div>
      <div>
        <button type="submit" class="pink button" name="1">Commenter</button>
      </div>
    </form>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="public/js/slide.js"></script>
    <?php include("view/frontend/footer.php"); ?>
    <?php $content = ob_get_clean(); ?>

    <?php require('view/frontend/template.php'); ?>
