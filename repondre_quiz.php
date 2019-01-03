<?php
  include 'html/header.php';

  //si l'utilisateur vient de répondre au quiz
  if( !empty($_SESSION['rep_quiz']) ) {
    include "modal.php";
    ?>
    <!-- Affichage d'une modal  -->
    <script>
      $(document).ready(function(){
        $('#id-popup-reponse-quiz').modal('show'); //affichage de la pop-up au chargement de la page
      });
    </script>
    <?php
    $_SESSION['new_inscription'] = '';
  }

  //affichage données de la page
  // print_r($_SESSION['nom_quiz']);
  // print_r($_SESSION['nb_questions']);
  // print_r($_SESSION['array-question']);
  // print_r($_SESSION['resultat']);



?>

<header class="header-repondre-quiz">
  <h1><?= $_SESSION['nom_quiz'] ?></h1>
</header>

<section class="section-rep-quiz">

  <form class="form-rep-quiz" action="back/traitement-rep-quiz.php" method="post">

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

        echo $_SESSION['resultat'][$i];
      }

    ?>

    <button type="submit" class="btn btn-primary">Valider</button>






  </form>

</section>


<?php
  include 'html/footer.html';
?>
