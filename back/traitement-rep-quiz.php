<?php

session_start();

//initialisation du nb de bonnes réponses
$_SESSION['bonne_rep'] = 0;
$_SESSION['ration-bonne-rep'] = $_SESSION['bonne_rep']/$_SESSION['nb_questions'];

//analyse des réponses
if(!empty($_POST)){
  for($i=0;$i<$_SESSION['nb_questions'];$i++){
    if ($_SESSION['array-question']["$i"]['bonne_rep'] == $_POST["question_$i"]){
      $_SESSION['resultat'][$i] = "<div id=good_rep> Vous avez juste à la question n°" . ($i+1) . "</div>";
      $_SESSION['bonne_rep'] += 1;
    }
    else{
      $_SESSION['resultat'][$i] = "<div id=bad_rep> Vous avez faux à la question n°" . ($i+1) . "</div>";
    }
  }
  $_SESSION['rep_quiz'] = 1;
  $_SESSION['points-reponse-quiz'] = 2*$_SESSION['bonne_rep'];
  //redirection
  header('Location: ../repondre_quiz.php');
  exit();

}

?>
