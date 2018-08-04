
  <?php $title = 'Mon blog'; ?>
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

  <article class="post_view">
    <div class="">
          <img class="postImg" src="<?php echo $post->folder() ;?>"/></img>
    </div>
    <div class="">
      <h3><?php echo $post->title(); ?></h3>
        <p>
          <?php
        echo $post->content();
        ?>
        </p>
        <em>le <?php echo $post->date(); ?></em>
    </div>
  </article>


  <h3>Commentaires</h3>
<?php foreach ($comments as $comment): ?>
  <div class="comment">
    <div class="comment_content">
      <p><strong><?php echo htmlspecialchars($comment->login()); ?></strong> le
        <?php echo $comment->date(); ?></p>
      <p>
        <?php echo nl2br(htmlspecialchars($comment->comment())); ?>
      </p>
    </div>
    <div class="comment_button">
        <?php if (!empty($_SESSION["user"])) {
        ?>
        <a href="index.php?action=editComment&id=<?= $_GET['id']?>&comment_id=<?= $comment->id(); ?>"> modifier</a>
				<form class="" action="index.php?action=commentView&id=<?php echo $post->id(); ?>&comment_id=<?= $comment->id(); ?>" method="post">
					<button type="submit" name="5">Supprimer</button>
				</form>
        <?php
    } ?>
          <form class="" action="index.php?action=commentView&id=<?= $_GET[ 'id']; ?>&comment_id=<?= $comment->id();?>" method="post">
            <button type="submit" name="2">Signaler</button>
          </form>
    </div>
  </div>
<?php endforeach; ?>

    <form action="index.php?action=commentView&id=<?= $_GET['id']  ?>" method="post">
      <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
      </div>
      <div>
        <label for="comment">Commentaire</label> <br />
        <textarea id="comment" name="comment"></textarea>
      </div>
      <div>
        <button type="submit" name="1">Commenter</button>
      </div>
    </form>
    <?php include("view/frontend/footer.php"); ?>
    <?php $content = ob_get_clean(); ?>

    <?php require('view/frontend/template.php'); ?>
