<?php $title = 'Nouveau Post'; ?>

<?php ob_start(); ?>
<?php include("view/frontend/nav.php"); ?>
<img src="public/img/logo.png" alt="" class="headerLogo">

        <p><a class="red" href="index.php?action=admin">Retour à l'interface d'admninistration</a></p>


<form action="index.php?action=newPost" method="post" enctype="multipart/form-data">
  <div>
      <label for="title">Titre</label><br />
      <input type="text" id="title" name="title" />
  </div>
  <div class="custom-file-container" data-upload-id="upload">
      <label>Votre image <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
      <label class="custom-file-container__custom-file" >
          <input name="image" type="file" class="custom-file-container__custom-file__custom-file-input" accept="*" multiple>
          <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
          <span class="custom-file-container__custom-file__custom-file-control"></span>
      </label>
      <div class="custom-file-container__image-preview"></div>
  </div>
  <div>
      <label for="timing">Timing</label><br />
      <input type="text" id="timing" name="timing" />
  </div>
  <div>
      <label for="serving">Serving</label><br />
      <input type="text" id="serving" name="serving" />
  </div>
  <input list="category" name="category" value="">
  <datalist id="category" >
    <option value="1">Entrée</option>
    <option value="2">Plat</option>
    <option value="3">Douceur</option>
</datalist>
  <div>
      <label for="content">Contenu</label> <br />
      <textarea class="editor" id="content" name="content" rows="10" cols="80"></textarea>
  </div>
    <div>
        <button class="red" type="submit" name="5">Poster !</button>
    </div>
</form>

<script src="https://unpkg.com/file-upload-with-preview"></script>
<script>var upload = new FileUploadWithPreview('upload')</script>
<?php $content = ob_get_clean(); ?>

	<?php require('view/frontend/template.php'); ?>
