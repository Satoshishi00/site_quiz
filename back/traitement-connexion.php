<?php

//connexion à la bdd
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=site_quiz;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

//initialisation des erreurs
$error_mail='';
$error_mdp='';

//initialisation des variables
$mail = '';
$mdp = '';

if(!empty($_POST)){
  $mail = $_POST['email'];
  $mdp = $_POST['mdp'];
  $req = $bdd->prepare("SELECT mail FROM utilisateurs WHERE mail = :mail");
  $req->execute(array('mail' => $mail));
  $donnees = $req->fetch();
  echo "ok $mail $mdp";
  if($donnees){ //si le nb de fois qu'apparait $mail1 dans la table est différent de 0
    $req = $bdd->prepare("SELECT mdp FROM utilisateurs WHERE mail = :mail");
    $req->execute(array('mail' => $mail));
    $data = $req->fetch(0);
    print_r($data['mdp']);
    if (password_verify($mdp,$data['mdp'])){

      //début de la session
      session_start();

      //récupération du nb de pts et de questions dans la bdd
      $req = $bdd->prepare("SELECT points,nb_questions,pseudo FROM utilisateurs WHERE mail = :mail");
      $req->execute(array('mail' => $mail));
      $data = $req->fetch();

      $_SESSION['points']       = $data[0];
      $_SESSION['nb_question']  = $data[1];
      $_SESSION['pseudo']       = $data[2];
      $_SESSION['last_co']      = time();
      $_SESSION['user_ip']      = $_SERVER['REMOTE_ADDR'];

      echo "$_SESSION[points]";
      echo "$_SESSION[nb_question]";
      echo "$_SESSION[pseudo] ";
      echo "$_SESSION[last_co]";
      echo "$_SESSION[user_ip]";
      // header('Location: ../index.php');
      // exit();

    }
    else{
      $error_mdp = "Mauvais mot de passe";
    }
  }
  else{
    $error_mail = "L'adresse email que vous avez saisi n'existe pas";
  }
}


?>
