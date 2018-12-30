<?php

session_start();


//initialisation des variables
$categorie = '';
$nom = '';
$nb_questions = '';
$description = '';

if(!empty($_POST)){
  echo "bip";
  $categorie = $_POST['categorie'];
  $nom = $_POST['nom'];
  $nb_questions = htmlspecialchars($_POST['nb_questions']);
  $description = htmlspecialchars($_POST['description']);
  if($categorie !== "Catégorie"){
    echo "bip";
    if(strlen($nom) >= 4 AND strlen($nom) <=23){
      echo "bip";
      $bdd = new PDO('mysql:host=localhost;dbname=site_quiz;charset=utf8', 'root', '');
      $req = $bdd->prepare("SELECT nom FROM quiz WHERE nom = :nom");
      $req->execute(array('nom' => $nom));
      $donnees = $req->fetch();
      echo "bip";
      if(!$donnees){ //si le nb de fois qu'apparait $mail1 dans la table est différent de 0

        //début de la session
        $_SESSION['categorie_quiz']     = $categorie;
        $_SESSION['nom_quiz']           = $nom;
        $_SESSION['nb_questions']       = $nb_questions;
        $_SESSION['description']        = $description;

        echo "$_SESSION[categorie_quiz] ";
        echo "$_SESSION[nom_quiz] ";
        echo "$_SESSION[nb_questions] ";
        echo "$_SESSION[description] ";

        header('Location: ../creation_quiz2.php');
        exit();
      }
      else {
        $_SESSION['error_categorie'] = "";
        $_SESSION['error_nom'] = "Ce nom de quiz existe déjà";
        echo "$_SESSION[error_nom]";
        header('Location: ../creation_quiz.php');
      }
    }
    else {
      $_SESSION['error_categorie'] = "";
      $_SESSION['error_nom'] = "Le nom de votre quiz doit faire au moins 4 caractères";
      echo "$_SESSION[error_nom]";
      header('Location: ../creation_quiz.php');
    }
  }
  else{
    $_SESSION['error_categorie'] = "Veuillez sélectionner une catégorie";
    $_SESSION['error_nom'] = "";
    echo "$_SESSION[error_categorie]";
    header('Location: ../creation_quiz.php');
  }
}

?>
