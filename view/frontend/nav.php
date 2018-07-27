<header class="white headerFixed">
<a href="index.php" class="red">Accueil</a>
<nav>

  <!-- Si l'utilisateur se connecte on remplace le bouton "se connecter" par "administration" -->

  <?php if (!empty($_SESSION["user"])) {
  ?>
    <em><a href="index.php?action=admin" class="red">Administration</a></em>
  	<?php
  } else {
      ?>
      <form class="" action="index.php?action=login" method="post">
        <button type="submit" name="button" class="">Se connecter</button>
      </form>
  <?php
    }
  ?>
</nav>
</header>
