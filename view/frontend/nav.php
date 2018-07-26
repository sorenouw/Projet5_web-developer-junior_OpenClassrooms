<header>
<h1><a href="index.php">Jean Forteroche</a></h1>
<nav>

  <!-- Si l'utilisateur se connecte on remplace le bouton "se connecter" par "administration" -->

  <?php if (!empty($_SESSION["user"])) {
  ?>
    <em><a href="index.php?action=admin">Administration</a></em>
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
