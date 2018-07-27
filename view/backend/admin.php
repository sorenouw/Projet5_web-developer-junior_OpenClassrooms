<?php $title = 'admin'; ?>

<?php ob_start(); ?>

<header class="admin white">
	<p><?php echo 'Bienvenue ' . $_SESSION["user"]?></p>
	<a href="index.php" class="red">Accueil</a>
	<a href="index.php?action=disconnect" class="red">déconnection</a>
</header>


<p class="center"><a href="index.php?action=newPost" class="red">Ajouter une recette</a></p>
<div class="admin_page">
	<section class="admin_post">
    <h2>Liste des recettes</h2>
		<table>
<?php foreach ($articles as $post): ?>
  <tr>
    <td>
      <h4><?php echo htmlspecialchars($post->title()); ?></h4>
    </td>
    <td>
      <a class="red" href="index.php?action=editPost&id=<?php echo $post->id(); ?>">Éditer</a>
    </td>
    <td>
      <a class="red" href="index.php?action=commentView&id=<?php echo $post->id(); ?>">Lire</a>
    </td>
    <td>
			<a class="red" href="index.php?action=deletePost&id=<?php echo $post->id(); ?>">Supprimer</a>
    </td>
  </tr>
<?php endforeach; ?>
		</table>
	</section>

	<section class="admin_comment">
    <h2>Liste des commentaires signalés</h2>
    <table>
      <?php foreach ($getReported as $comment): ?>
        <tr>
          <td><p><strong><?php echo htmlspecialchars($comment->login()); ?></strong> le <?php echo $comment->date(); ?><p/></td>
<td><p><?php echo nl2br(htmlspecialchars($comment->comment())); ?></p></td>
<td>
	<a href="index.php?action=deleteComment&id=<?php echo $comment->id(); ?>">Supprimer</a>
</td>

        </tr>

      <?php endforeach; ?>
    </table>

	</section>
</div>


		<?php $content = ob_get_clean(); ?>

		<?php require('view/frontend/template.php'); ?>
