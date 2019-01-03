<?php
  include 'html/header.php';


  //si l'utilisateur vien de répondre au quiz
  if( !empty($_SESSION['rep_quiz']) ) {
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
  print_r($_SESSION['nom_quiz']);
  print_r($_SESSION['nb_questions']);
  print_r($_SESSION['array-question']);

  $bdd = new PDO('mysql:host=localhost;dbname=site_quiz;charset=utf8', 'root', '');

  $resultat = array();

  //initialisation des résultats
  for($i=0;$i<$_SESSION['nb_questions'];$i++){
    $resultat[$i] = "";
  }

  //initialisation du nb de bonnes réponses
  $_SESSION['bonne_rep'] = 0;
  print_r($_SESSION['nb_questions']);
  print_r($_SESSION['array-question']);
  //$_SESSION['ration-bonne-rep'] = $_SESSION['bonne_rep']/$_SESSION['nb_questions'];

  //analyse des réponses
  if(!empty($_POST)){
    for($i=0;$i<$_SESSION['nb_questions'];$i++){
      if ($_SESSION['array-question']["$i"]['bonne_rep'] == $_POST["question_$i"]){
        $resultat[$i] = "<div id=good_rep> Vous avez juste à la question n°" . ($i+1) . "</div>";
        $_SESSION['bonne_rep'] += 1;
      }
      else{
        $resultat[$i] = "<div id=bad_rep> Vous avez faux à la question n°" . ($i+1) . "</div>";
      }
    }

  }

?>

<header class="header-repondre-quiz">
  <h1><?= $_SESSION['nom_quiz'] ?></h1>
</header>

<section class="section-rep-quiz">

  <form class="form-rep-quiz" action="" method="post">

    <?php

      for($i=0;$i<$_SESSION['nb_questions'];$i++){
        echo "
        <div class=qcm>

          <div class=question>
            <label class=label-question-num>" . ($i+1) . "</label>
            <label class=label-question-affichage>" . $_SESSION['array-question'][$i]['question'] . "</label>
          </div>

          <div class=rep>
            <label class=label-rep-num>Réponse 1</label>
            <input type=radio  name=question_$i value=1>
            <label class=label-rep-affichage>" . $_SESSION['array-question'][$i]['rep1'] . "</label>
          </div>

          <div class=rep>
            <label class=label-rep-num>Réponse 2</label>
            <input type=radio  name=question_$i value=2>
            <label class=label-rep-affichage>" . $_SESSION['array-question'][$i]['rep2'] . "</label>
          </div>

          <div class=rep>
            <label class=label-rep-num>Réponse 3</label>
            <input type=radio  name=question_$i value=3>
            <label class=label-rep-affichage>" . $_SESSION['array-question'][$i]['rep3'] . "</label>
          </div>

          <div class=rep>
            <label class=label-rep-num>Réponse 4</label>
            <input type=radio  name=question_$i value=4>
            <label class=label-rep-affichage>" . $_SESSION['array-question'][$i]['rep4'] . "</label>
          </div>

        </div>";

        echo $resultat[$i];
      }

    ?>

    <button type="submit" class="btn btn-primary">Valider</button>






  </form>

</section>


<?php
  include 'html/footer.html';
?>
