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
$pass_hache = password_hash($_POST['mdp1'], PASSWORD_DEFAULT);

if(!empty($_POST)){
  if(strlen($_POST['pseudo'])>=3){
    $req = $bdd->prepare("SELECT mail FROM utilisateurs WHERE mail=mail");
    $req->execute(array($_POST['mail1']));
    $donnees = $req->fetch();
    if(!$donnees){ //si le nombre de mail dans la table est différent de 0
      if($_POST['email1'] === $_POST['email2']){
        if(strlen($_POST['mdp1'])>=6){
          if($_POST['mdp1'] === $_POST['mdp2']){
            $req = $bdd->prepare('INSERT INTO utilisateurs(pseudo, mail, mdp, date_inscription)
                                  VALUES(:pseudo, :mail, :mdp, NOW())');
            $req->execute(array(
                                  'pseudo' => $_POST["pseudo"],
                                  'mail' => $_POST['email1'],
                                  'mdp' => $pass_hache
                                  ));
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
    else{
      $error_mail = "Cet email existe déjà";
    }
  }
  else{
    $error_pseudo = "Votre pseudo doit être compris entre 3 et 20 caractères";
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
      <small id="passwordlHelp" class="form-text text-muted">Votre mot de passe doit faire entre 6 et 23 caractères et doit contenir au moins une lettre et un chiffre</small>
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
