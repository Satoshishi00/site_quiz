<?php

//initialisation des erreurs
$error_categorie = '';
$error_nom = '';

//initialisation des variables
$categorie = '';
$nom = '';
$nb_questions = '';
$description = '';

if(!empty($_POST)){
  $categorie = $_POST['categorie'];
  $nom = $_POST['nom'];
  $nb_questions = htmlspecialchars($_POST['nb_questions']);
  $description = htmlspecialchars($_POST['description']);
  if($categorie !== "Catégorie"){
    if(strlen($nom) >= 4 AND strlen($nom) <=23){

      //début de la session
      session_start();
      $_SESSION['categorie_quiz']     = $categorie;
      $_SESSION['nom_quiz']           = $nom;
      $_SESSION['nb_questions']       = $nb_questions;
      $_SESSION['description']        = $description;

      // echo "$_SESSION[categorie_quiz] ";
      // echo "$_SESSION[nom_quiz] ";
      // echo "$_SESSION[nb_questions] ";
      // echo "$_SESSION[description] ";

      header('Location: ../creation_quiz2.php');
      exit();

    }
    else {
      $error_nom = "Le nom de votre quiz doit faire au moins 4 caractères";
    }
  }
  else{
    $error_categorie = "Veuillez sélectionner une catégorie";
  }
}

?>
