<?php $title = 'MiamDelice : éditer une recette';  ?>

<?php ob_start(); ?>
<?php include("view/frontend/nav.php"); ?>
<img src="public/img/logo.png" alt="" class="headerLogo">

  <h2>Modifier cet article.</h2>
  <img class="postImg" src="<?php echo $editPost->folder() ;?>"/></img>
  <form class="" action="index.php?action=editPost&id=<?= $editPost->id(); ?>" method="post">
    <p>Titre</p>
    <textarea  cols="30" rows="1" name="title"><?php echo nl2br(htmlspecialchars($editPost->title())); ?></textarea>
    <p>Temps de préparation</p>
    <textarea  cols="30" rows="1" name="timing"><?php echo nl2br(htmlspecialchars($editPost->timing())); ?></textarea>
    <p>Nombre de pesonnes</p>
    <textarea  cols="30" rows="1" name="serving"><?php echo nl2br(htmlspecialchars($editPost->serving())); ?></textarea>
    <p>Catégorie</p>
    <select name="category" >
      <option value="1" <?php if($editPost->category() == "1"){ echo ' selected';}?>>Entrée</option>
      <option value="2" <?php if($editPost->category() == "2"){ print ' selected';}?>>Plat</option>
      <option value="3" <?php if($editPost->category() == "3"){ print ' selected';}?>>Douceur</option>
  </select>
    <p>post</p>
    <textarea class="editor" cols="50" rows="10" name="post"><?php echo nl2br(htmlspecialchars($editPost->content())); ?></textarea>
    <button class="pink button" type="submit" name="3">Modifier !</button>
  </form>



	<?php $content = ob_get_clean(); ?>

	<?php require('view/frontend/template.php'); ?>
