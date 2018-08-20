<footer>
  <nav>

      <!-- Si l'utilisateur se connecte on remplace le bouton "se connecter" par "administration" -->
  <?php if (!empty($_SESSION["user"])) {
  ?>
    <a href="index.php?action=admin" class="white button">administration</a>
  	<?php
  } else {
      ?>
      <form class="" action="index.php?action=login" method="post">
        <button type="submit" name="button" class="white button">Se connecter</button>
      </form>
  <?php
    }
  ?>

</nav>
  <a href="index.php?action=mentions" class="white button">mentions légales</a>
</footer>
