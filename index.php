<?php
  include 'html/header.php';

  // session_start();

  //si l'utilisateur vien de s'inscrire
  if( !empty($_SESSION['new_inscription']) ) {
    include "modal.php";
    ?>
    <!-- Affichage d'une modal  -->
    <script>
      $(document).ready(function(){
        $('#id-popup-inscription').modal('show'); //affichage de la pop-up au chargement de la page
      });
    </script>";
    <?php
    $_SESSION['new_inscription'] = '';
  }

  //si l'utilisateur vient de se connecter
  if( !empty($_SESSION['new_connexion']) ) {
    include "modal.php";
    ?>
    <!-- Affichage d'une modal  -->
    <script>
      $(document).ready(function(){
        $('#id-popup-connexion').modal('show'); //affichage de la pop-up au chargement de la page
      });
    </script>";
    <?php $_SESSION['new_connexion'] = '';
  }

  //si l'utilisateur vient de créer un quiz
  if( !empty($_SESSION['new_quiz']) ) {
    include "modal.php";
    ?>
    <!-- Affichage d'une modal  -->
    <script>
      $(document).ready(function(){
        $('#id-popup-creation-quiz').modal('show'); //affichage de la pop-up au chargement de la page
      });
    </script>";
    <?php $_SESSION['new_quiz'] = '';
  }


?>

<header class="header-accueil">
  <h1>Accueil</h1>
</header>

<section class="espace_cartes">

  <?php

  //compter le nombre de quiz
  $bdd = new PDO('mysql:host=localhost;dbname=site_quiz;charset=utf8', 'root', '');
  $req = $bdd->prepare("SELECT COUNT(id) FROM quiz ");
  $req->execute();
  $data = $req->fetch(0);
  $nb_quiz = $data[0];

  for($i=$nb_quiz;$i>0;$i--){
    $req = $bdd->prepare("SELECT * FROM quiz WHERE id = :id");
    $req->execute(array('id' => $i));
    $data = $req->fetch(0);
    echo
      "<div class=carte_quiz>
        <div class='card text-center'>
          <div class=card-header>
            $data[categorie]
          </div>
          <div class=card-body>
            <h5 class=card-title>$data[nom]</h5>
            <p class=card-text>$data[description]</p>
            <p class=card-text>$data[nb_questions] questions</p>

            <a href='repondre_quiz.php/?nom_quiz=$data[nom]' class='btn btn-primary'>Lancer le quiz</a>
          </div>
          <div class='card-footer text-muted'>
            $data[date_creation]

          </div>
        </div>
      </div>";
  }

  // $req = $bdd->prepare("SELECT * FROM quiz WHERE id = :id");
  // $req->execute('id' = $i);
  // $data = $req->fetch(0);
  // print_r($data);

  ?>



</section>


<?php
  include 'html/footer.html';
?>
