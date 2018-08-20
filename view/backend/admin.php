<?php $title = "MiamDelice : espace d'administration ;" ?>

<?php ob_start(); ?>

<header class="admin_header white">
	<p class="hideImg"><?php echo 'Bienvenue ' . $_SESSION["user"]?></p>
	<nav class="admin_nav">
		<a href="index.php" class="pink button">Accueil</a>
		<a href="index.php?action=newPost" class="pink button">Nouveau post</a>
		<a href="index.php?action=disconnect" class="pink button">déconnection</a>

	</nav>
</header>

<h2>Bienvenue sur votre espace d'administration. </h2>
<p>Vous pouvez créer, éditer ou supprimer les articles et commentaires de votre blog.</p>


<div class="admin_page">
	<div class="admin_toggle">
		<button class="pink button toggle1" autofocus>Recettes</button class="pink button">
		<button class="white button toggle2">Commentaires signalés</button class="pink button">
	</div>

	<section class="admin_post">

		<table>
<?php foreach ($articles as $post): ?>
  		<tr>
				<td class="hideImg">
					<img src="<?php echo $post->folder() ;?>"/>
				</td>
    		<td>
      		<h4><?php echo htmlspecialchars($post->title()); ?></h4>
    		</td>
				<td class="hideDate">
					<p><?php echo htmlspecialchars($post->date()); ?></p>
				</td>
    		<td>
      		<a class="pink button" href="index.php?action=editPost&id=<?php echo $post->id(); ?>">Éditer</a>
    		</td>
    		<td>
      		<a class="pink button" href="index.php?action=commentView&id=<?php echo $post->id(); ?>">Lire</a>
    		</td>
    		<td>
					<a class="red button" href="index.php?action=deletePost&id=<?php echo $post->id(); ?>">Supprimer</a>
    		</td>
  	</tr>
<?php endforeach; ?>
		</table>
	</section>

	<section class="admin_comment">
    <table>
      <?php foreach ($getReported as $comment): ?>
        <tr>
          	<td>
							<p><strong><?php echo htmlspecialchars($comment->login()); ?></strong> le <?php echo $comment->date(); ?><p/>
						</td>
						<td>
							<p><?php echo nl2br(htmlspecialchars($comment->comment())); ?></p>
						</td>
						<td>
							<a class="pink button" href="index.php?action=deleteComment&id=<?php echo $comment->id(); ?>">Supprimer</a>
						</td>
        </tr>

      <?php endforeach; ?>
    </table>

	</section>
</div>

        <script type="text/javascript" src="public/js/admin.js"></script>
		<?php $content = ob_get_clean(); ?>

		<?php require('view/frontend/template.php'); ?>
