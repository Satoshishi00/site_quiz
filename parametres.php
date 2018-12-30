<?php
  include 'html/header.html';
?>

<?php

  session_start();

  echo "$_SESSION['pseudo']";

?>

<header class="header-creation-quiz">
  <h1>Paramètres</h1>
</header>

<section class="section-parametres">

  <h2><?= $_SESSION['pseudo']  ?></h2>

  <div class="bloc">
    <a href="#">Changer adresse mail</a>
  </div>


  <div class="bloc">
    <a href="#">Changer mot de passe</a>
  </div>

  <div class="bloc">
    <p>
      <a href="#">Réinitialiser le compte</a>
      <br>
      Cette opération réinitialise les points à 0 ainsi que toutes les statistiques
    </p>
  </div>


</section>


<?php
  include 'html/footer_connexion.html';
?>
