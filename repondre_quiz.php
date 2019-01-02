<?php
  include 'html/header.php';

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

  $resultat = array();

  //initialisation des résultats
  for($i=0;$i<$nb_questions;$i++){
    $resultat[$i] = "";
  }


  //analyse des réponses
  if(!empty($_POST)){
    for($i=0;$i<$nb_questions;$i++){
      if ($question["$i"]['bonne_rep'] == $_POST["question_$i"]){
        $resultat[$i] = "<div id=good_rep> Vous avez juste à la question n°" . ($i+1) . "</div>";
      }
      else{
        $resultat[$i] = "<div id=bad_rep> Vous avez faux à la question n°" . ($i+1) . "</div>";
      }
    }
  }

  print_r($resultat);

?>

<header class="header-repondre-quiz">
  <h1><?= htmlspecialchars($_GET["nom_quiz"]) ?></h1>
</header>

<section class="section-rep-quiz">

  <form class="form-rep-quiz" action="" method="post">

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
            <input type=radio  name=question_$i value=1>
            <label class=label-rep-affichage>" . $question[$i]['rep1'] . "</label>
          </div>

          <div class=rep>
            <label class=label-rep-num>Réponse 2</label>
            <input type=radio  name=question_$i value=2>
            <label class=label-rep-affichage>" . $question[$i]['rep2'] . "</label>
          </div>

          <div class=rep>
            <label class=label-rep-num>Réponse 3</label>
            <input type=radio  name=question_$i value=3>
            <label class=label-rep-affichage>" . $question[$i]['rep3'] . "</label>
          </div>

          <div class=rep>
            <label class=label-rep-num>Réponse 4</label>
            <input type=radio  name=question_$i value=4>
            <label class=label-rep-affichage>" . $question[$i]['rep4'] . "</label>
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
