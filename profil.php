<?php
  include 'html/header.php';
  session_start();
?>

<header class="header-creation-quiz">
  <h1><?= $_SESSION['pseudo'] ?></h1>
</header>

<section class="section-profil">

  <p>Nombre de points : <?= $_SESSION['points'] ?></p>

  <p>Nombre de quiz créés : <?= $_SESSION['nb_quiz'] ?></p>

  <p>Liste des quiz créés</p>

  <p>Pourcentage de bonnes réponses global</p>

  <p>Pourcentage de bonnes réponses détaillé par catégories</p>

</section>


<?php
  include 'html/footer.html';
?>
