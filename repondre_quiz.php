<?php
  include 'html/header.html';

  $bdd = new PDO('mysql:host=localhost;dbname=site_quiz;charset=utf8', 'root', '');
  $req = $bdd->prepare("SELECT id,nb_questions FROM quiz WHERE nom = :nom");
  $req->execute(array('nom' => $_GET["nom_quiz"]));
  $data = $req->fetch(0);
  $id_quiz = $data['id'];
  $nb_questions = $data['nb_questions'];


  $req = $bdd->prepare("SELECT question,rep1,rep2,rep3,rep4,bonne_rep FROM questions WHERE id_quiz = :id_quiz LIMIT $nb_questions");
  $req->execute(array(  'id_quiz' => $id_quiz,
                        ));
  $question = $req->fetchAll();
?>

<header class="header-repondre-quiz">
  <h1><?= htmlspecialchars($_GET["nom_quiz"]) ?></h1>
</header>

<section class="section-rep-quiz">

  <form class="form-rep-quiz" action="index.html" method="post">

    <?php

      for($i=0;$i<$nb_questions;$i++){
        echo "
        <div class=qcm>

          <div class=question>
            <label class=label-question-num>" . ($i+1) . "</label>
            <label class=label-question-affichage>" . $question[$i]['question'] . "</label>
          </div>

          <div class=rep>
            <label class=label-rep-num>Réponse 1</label>
            <input type=radio  name=question_$i >
            <label class=label-rep-affichage>" . $question[$i]['rep1'] . "</label>
          </div>

          <div class=rep>
            <label class=label-rep-num>Réponse 2</label>
            <input type=radio  name=question_$i >
            <label class=label-rep-affichage>" . $question[$i]['rep2'] . "</label>
          </div>

          <div class=rep>
            <label class=label-rep-num>Réponse 3</label>
            <input type=radio  name=question_$i >
            <label class=label-rep-affichage>" . $question[$i]['rep3'] . "</label>
          </div>

          <div class=rep>
            <label class=label-rep-num>Réponse 4</label>
            <input type=radio  name=question_$i >
            <label class=label-rep-affichage>" . $question[$i]['rep4'] . "</label>
          </div>

        </div>";
      }

    ?>




  </form>

</section>


<?php
  include 'html/footer.html';
?>
