<?php

  session_start();

  htmlspecialchars($_GET["nom_quiz"]);

  $bdd = new PDO('mysql:host=localhost;dbname=site_quiz;charset=utf8', 'root', '');
  $req = $bdd->prepare("SELECT id,nb_questions FROM quiz WHERE nom = :nom");
  $req->execute(array('nom' => $_GET["nom_quiz"]));
  $data = $req->fetch(0);
  $id_quiz = $data['id'];
  $nb_questions = $data['nb_questions'];

  $_SESSION['nb_questions'] = $nb_questions;

  $req = $bdd->prepare("SELECT question,rep1,rep2,rep3,rep4,bonne_rep FROM questions WHERE id_quiz = :id_quiz LIMIT $nb_questions");
  $req->execute(array(  'id_quiz' => $id_quiz,
                        ));
  $_SESSION['array-question'] = $req->fetchAll();

  $_SESSION['nom_quiz'] = $_GET["nom_quiz"];


  $_SESSION['resultat']=array();
  //initialisation des résultats des questions
  for($i=0;$i<$_SESSION['nb_questions'];$i++){
    $_SESSION['resultat'][$i] = "";
  }

  //initialisation de la réponse au Quiz
  $_SESSION['rep_quiz'] = 0;

  print_r($_SESSION['nom_quiz']);
  print_r($_SESSION['nb_questions']);
  print_r($_SESSION['array-question']);

  header('Location: ../../repondre_quiz.php');
  exit();
?>
