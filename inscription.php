<?php
  include 'html/header_connexion.html';
?>

<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=site_quiz;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$error_pseudo='';
$error_mail='';
$error_mdp='';

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

  $req = $bdd->prepare("SELECT pseudo FROM utilisateurs WHERE pseudo = :pseudo");
  $req->execute(array('pseudo' => $pseudo));
  $donnees = $req->fetch();
  if(!$donnees){ //si le nb de fois qu'apparait $pseudo dans la table est différent de 0
    if(strlen($pseudo)>=3){
      $req = $bdd->prepare("SELECT mail FROM utilisateurs WHERE mail = :mail");
      $req->execute(array('mail' => $mail1));
      $donnees = $req->fetch();
      if(!$donnees){ //si le nb de fois qu'apparait $mail1 dans la table est différent de 0
        if($mail1 === $mail2){
          if(strlen($mdp1)>=6){
            if($mdp1 === $mdp2){
              $pass_hache = password_hash($mdp1, PASSWORD_DEFAULT);
              $req = $bdd->prepare('INSERT INTO utilisateurs(pseudo, mail, mdp, date_inscription)
                                    VALUES(:pseudo, :mail, :mdp, NOW())');
              $req->execute(array(
                                    'pseudo' => $pseudo,
                                    'mail' => $mail1,
                                    'mdp' => $pass_hache
                                    ));
              session_start();

              $_SESSION['pseudo']       = $_POST["pseudo"];

              $_SESSION['user_ip']      = $_SERVER['REMOTE_ADDR'];

            }
            else{
              $error_mdp = "Les mots de passes saisis sont différents";
            }
          }
          else{
            $error_mdp = "Votre mot de passe doit faire au moins 6 caractères";
          }
        }
        else{
          $error_mail = "Les emails de passes sont différentes";
        }
      }
      else{
        $error_mail = "Cet email existe déjà";
      }
    }
    else{
      $error_pseudo = "Votre pseudo doit être compris entre 3 et 20 caractères";
    }
  }
  else{
    $error_pseudo = "Votre pseudo existe déjà";
  }
}
else{
  $error = "Veuillez remplir tous les champs";
}



// echo 'Vous êtes inscrit ! ';

?>

<header class="header-inscription">
  <h1>Inscription</h1>
</header>

<section class="section-inscription">

  <form class="form-inscription" method="post">

    <div class="form-group">
      <label for="exampleInputEmail1">Pseudo</label>
      <input type="text" class="form-control" name="pseudo" placeholder="Entrez un pseudo" min="3" maxlength="20" required>
      <small class="small-error"><?= $error_pseudo ?></small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input type="email" class="form-control" name="email1" aria-describedby="emailHelp" placeholder="Entrez votre email" required>
      <small class="small-error"><?= $error_mail ?></small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Corfirmation Email</label>
      <input type="email" class="form-control" name="email2" aria-describedby="emailHelp" placeholder="Confirmez votre email" required>
      <small class="small-error"><?= $error_mail ?></small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Mot de passe</label>
      <input type="password" class="form-control" name="mdp1" placeholder="Entrez votre mot de passe" maxlength="23" required>
      <small class="small-error"><?= $error_mdp ?></small>
      </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Confirmation mot de passe</label>
      <input type="password" class="form-control" name="mdp2" placeholder="Confirmez votre mot de passe" maxlength="23" required>
    </div>


    <button type="submit" class="btn btn-primary">S'inscrire</button>

    <div class="inscription">
      <p>Vous avez déjà un compte ? :)</p>
      <a href="connexion.php" class="btn btn-primary">Se connecter</a>
    </div>

  </form>

</section>



<?php
  include 'html/footer_connexion.html';
?>
