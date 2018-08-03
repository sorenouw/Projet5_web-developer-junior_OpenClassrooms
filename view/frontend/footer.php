<footer>
  <nav>

      <!-- Si l'utilisateur se connecte on remplace le bouton "se connecter" par "administration" -->
  <?php if (!empty($_SESSION["user"])) {
  ?>
    <em><a href="index.php?action=admin" class="white">administration</a></em>
  	<?php
  } else {
      ?>
      <form class="" action="index.php?action=login" method="post">
        <button type="submit" name="button" class="white">Se connecter</button>
      </form>
  <?php
    }
  ?>

</nav>
  <em><a href="index.php?action=mentions" class="white">mentions légales</a></em>
</footer>
