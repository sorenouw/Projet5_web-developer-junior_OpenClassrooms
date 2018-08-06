<?php $title = 'edit post'; ?>

<?php ob_start(); ?>
<body>
  <h2>Modifier cet article.</h2>
  <img class="postImg" src="<?php echo $editPost->folder() ;?>"/></img>
  <form class="" action="index.php?action=editPost&id=<?= $editPost->id(); ?>" method="post">
    <p>Title</p>
    <textarea  cols="10" rows="1" name="title"><?php echo nl2br(htmlspecialchars($editPost->title())); ?></textarea>
    <p>post</p>
    <textarea class="editor" cols="50" rows="10" name="post"><?php echo nl2br(htmlspecialchars($editPost->content())); ?></textarea>
    <button class="red" type="submit" name="3">Modifier !</button>
  </form>



	<?php $content = ob_get_clean(); ?>

	<?php require('view/frontend/template.php'); ?>
