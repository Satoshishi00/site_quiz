<?php

//début de la session
session_start();

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
$_SESSION['error_mail'] = '';
$_SESSION['error_mdp'] = '';

//initialisation des variables
$mail = '';
$mdp = '';

if(!empty($_POST)){
  $mail = $_POST['email'];
  $mdp = $_POST['mdp'];
  $req = $bdd->prepare("SELECT mail FROM utilisateurs WHERE mail = :mail");
  $req->execute(array('mail' => $mail));
  $donnees = $req->fetch();
  if($donnees){ //si le nb de fois qu'apparait $mail1 dans la table est différent de 0

    $req = $bdd->prepare("SELECT mdp FROM utilisateurs WHERE mail = :mail");
    $req->execute(array('mail' => $mail));
    $data = $req->fetch(0);
    if (password_verify($mdp,$data['mdp'])){

      //récupération du nb de pts et de questions dans la bdd
      $req = $bdd->prepare("SELECT points,nb_questions,pseudo FROM utilisateurs WHERE mail = :mail");
      $req->execute(array('mail' => $mail));
      $data = $req->fetch();

      $_SESSION['points']       = $data[0];
      $_SESSION['nb_quiz']      = $data[1];
      $_SESSION['pseudo']       = $data[2];
      $_SESSION['user_ip']      = $_SERVER['REMOTE_ADDR'];
      $_SESSION['last_co']      = time();


      $req = $bdd->prepare('UPDATE utilisateurs SET date_derniere_connexion=NOW() WHERE mail= :mail');
      $req->execute(array('mail' => $mail));


      header('Location: ../index.php');
      exit();

    }
    else{
      $_SESSION['error_mdp'] = "Mauvais mot de passe";
      echo $_SESSION['error_mdp'];
      header('Location: ../connexion.php');
    }
  }
  else{
    $_SESSION['error_mail'] = "L'adresse email que vous avez saisi n'existe pas";
    echo $_SESSION['error_mail'];
    header('Location: ../connexion.php');
  }
}


?>
