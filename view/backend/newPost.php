<?php $title = 'Nouveau Post'; ?>

<?php ob_start(); ?>
        <p><a class="red" href="index.php?action=admin">Retour à l'interface d'admninistration</a></p>


<form action="index.php?action=newPost" method="post" enctype="multipart/form-data">
  <div>
      <label for="title">Titre</label><br />
      <input type="text" id="title" name="title" />
  </div>
  <div>
    <input type="file" name="image" />
  </div>
  <div>
      <label for="content">Contenu</label> <br />
      <textarea class="editor" id="content" name="content" rows="10" cols="80"></textarea>
  </div>
    <div>
        <button class="red" type="submit" name="5">Poster !</button>
    </div>
</form>
<?php $content = ob_get_clean(); ?>

	<?php require('view/frontend/template.php'); ?>
