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
$_SESSION['error_pseudo'] = '';
$_SESSION['error_mail'] = '';
$_SESSION['error_mdp'] = '';

//initialisation des variables
$pseudo = '';
$mail1 = '';
$mail2 = '';
$mdp1 = '';
$mdp2 = '';

if(!empty($_POST)){
  $pseudo = $_POST["pseudo"];
  $mail1 = $_POST['email1'];
  $mail2 = $_POST['email2'];
  $mdp1 = $_POST['mdp1'];
  $mdp2 = $_POST['mdp2'];

  //test si pseudo existe dans la table
  $req = $bdd->prepare("SELECT pseudo FROM utilisateurs WHERE pseudo = :pseudo");
  $req->execute(array('pseudo' => $pseudo));
  $donnees = $req->fetch();
  if(!$donnees){ //si le nb de fois qu'apparait $pseudo dans la table est différent de 0
    if(strlen($pseudo)>=3){
      //test si email existe dans la table
      $req = $bdd->prepare("SELECT mail FROM utilisateurs WHERE mail = :mail");
      $req->execute(array('mail' => $mail1));
      $donnees = $req->fetch();
      if(!$donnees){ //si le nb de fois qu'apparait $mail1 dans la table est différent de 0
        if($mail1 === $mail2){
          if(strlen($mdp1)>=6){
            if($mdp1 === $mdp2){
              $pass_hache = password_hash($mdp1, PASSWORD_DEFAULT);
              $req = $bdd->prepare('INSERT INTO utilisateurs(pseudo, mail, mdp, date_inscription, date_derniere_connexion)
                                    VALUES(:pseudo, :mail, :mdp, NOW(), NOW())');
              $req->execute(array(
                                    'pseudo' => $pseudo,
                                    'mail' => $mail1,
                                    'mdp' => $pass_hache
                                    ));

              //récupération du nb de pts et de questions dans la bdd
              $req = $bdd->prepare("SELECT points,nb_questions FROM utilisateurs WHERE mail = :mail");
              $req->execute(array('mail' => $mail1));
              $data = $req->fetch();

              $_SESSION['points']       = $data[0];
              $_SESSION['nb_quiz']      = $data[1];
              $_SESSION['pseudo']       = $_POST["pseudo"];
              $_SESSION['last_co']      = time();
              //récupération de ip de l'utilisateur en session
              $_SESSION['user_ip']      = $_SERVER['REMOTE_ADDR'];
							$_SESSION['new_inscription']	= "1";

							$_SESSION['points'] += 10;
							$req = $bdd->prepare('UPDATE utilisateurs SET points= :points nb_quiz= :nb_quiz WHERE pseudo= :pseudo');
						  $req->execute(array('pseudo' =>   $_SESSION['pseudo'],
						                      'points' =>   $_SESSION['points']));

              header('Location: ../index.php');
              exit();

            }
            else{
              $error_mdp = "Les mots de passes saisis sont différents";
							$_SESSION['error_mdp'] = "Les mots de passes saisis sont différents";
				      echo $_SESSION['error_mdp'];
				      header('Location: ../inscription.php');
            }
          }
          else{
            $error_mdp = "Votre mot de passe doit faire au moins 6 caractères";
						$_SESSION['error_mdp'] = "Votre mot de passe doit faire au moins 6 caractères";
						echo $_SESSION['error_mdp'];
						header('Location: ../inscription.php');
          }
        }
        else{
          $error_mail = "Les adresses mail sont différentes";
					$_SESSION['error_mail'] = "Les adresses mail sont différentes";
					echo $_SESSION['error_mail'];
					header('Location: ../inscription.php');
        }
      }
      else{
        $error_mail = "Cet email existe déjà";
				$_SESSION['error_mail'] = "Cet email existe déjà";
				echo $_SESSION['error_mail'];
				header('Location: ../inscription.php');
      }
    }
    else{
      $error_pseudo = "Votre pseudo doit être compris entre 3 et 20 caractères";
			$_SESSION['error_pseudo'] = "Votre pseudo doit être compris entre 3 et 20 caractères";
			echo $_SESSION['error_pseudo'];
			header('Location: ../inscription.php');
		}
  }
  else{
    $error_pseudo = "Votre pseudo existe déjà";
		$_SESSION['error_pseudo'] = "Votre pseudo existe déjà";
		echo $_SESSION['error_pseudo'];
		header('Location: ../inscription.php');
  }
}


?>
