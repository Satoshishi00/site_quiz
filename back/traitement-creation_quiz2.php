<?php

session_start();

if(!empty($_POST)){

  $bdd = new PDO('mysql:host=localhost;dbname=site_quiz;charset=utf8', 'root', '');

  //insertion du quiz dans la bdd
  $req = $bdd->prepare('INSERT INTO quiz(categorie, nom, nb_questions, description, auteur, date_creation)
                        VALUES(:categorie, :nom, :nb_questions, :description, :auteur, NOW())');
  $req->execute(array(
                        'categorie'     => $_SESSION['categorie_quiz'],
                        'nom'           => $_SESSION['nom_quiz'],
                        'nb_questions'  => $_SESSION['nb_questions'],
                        'description'   => $_SESSION['description'],
                        'auteur'        => $_SESSION['pseudo'],
                        ));

  //récupération de l'id du quiz créé dans la bdd
  $req = $bdd->prepare("SELECT id FROM quiz WHERE nom = :nom");
  $req->execute(array('nom' => $_SESSION['nom_quiz']));
  $data = $req->fetch(0);
  $id_quiz = $data['id'];

  for ( $i=1;$i<=$_SESSION['nb_questions'];$i++){
    //insertion des questions associées à l'id du quiz à la bdd
    $req = $bdd->prepare('INSERT INTO questions(question, rep1, rep2, rep3, rep4, bonne_rep, id_quiz)
                          VALUES(:question, :rep1, :rep2, :rep3, :rep4, :bonne_rep, :id_quiz )');
    $req->execute(array(
                          'question'       => $_POST["question_$i"],
                          'rep1'           => $_POST["rep1_$i"],
                          'rep2'           => $_POST["rep2_$i"],
                          'rep3'           => $_POST["rep3_$i"],
                          'rep4'           => $_POST["rep4_$i"],
                          'bonne_rep'      => $_POST["bonne_rep_$i"],
                          'id_quiz'        => $id_quiz
                          ));
  }
  header('Location: ../index.php');
  exit();
}

?>
