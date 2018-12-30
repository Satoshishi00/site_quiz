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

$pass_hache = password_hash($_POST['mdp1'], PASSWORD_DEFAULT);

if(!empty($_POST)){
  if(!empty($_POST['pseudo'])){
    if(strlen($_POST['pseudo'])>=3 AND strlen($_POST['pseudo'])<=20){
      if(!empty($_POST['mail1'])){

      }
      else{
        $error_mail1 = "Rentrez une adresse mail"
      }
    }
    else{
      $error = "Votre pseudo doit être compris entre 3 et 20 caractères";
    }
  }
  else{
    $error = "Veuillez Saisir un pseudo";
  }
}
else{
  $error = "Veuillez remplir tous les champs";
}

$req = $bdd->prepare('INSERT INTO utilisateurs(pseudo, mail, mdp, date_inscription)
                      VALUES(:pseudo, :mail, :mdp, NOW())');
$req->execute(array(
                      'pseudo' => $_POST["pseudo"],
                      'mail' => $_POST['email1'],
                      'mdp' => $pass_hache
                      ));

// echo 'Vous êtes inscrit ! ';

?>

<header class="header-inscription">
  <h1>Inscription</h1>
</header>

<section class="section-inscription">

  <form class="form-inscription" method="post">

    <div class="form-group">
      <label for="exampleInputEmail1">Pseudo</label>
      <input type="text" class="form-control" name="pseudo" placeholder="Entrez un pseudo">
      <small class="small-error"><?= $error ?></small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input type="email" class="form-control" name="email1" aria-describedby="emailHelp" placeholder="Entrez votre email">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Corfirmation Email</label>
      <input type="email" class="form-control" name="email2" aria-describedby="emailHelp" placeholder="Confirmez votre email">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Mot de passe</label>
      <input type="password" class="form-control" name="mdp1" placeholder="Entrez votre mot de passe">
      <small id="passwordlHelp" class="form-text text-muted">Votre mot de passe doit faire entre 6 et 23 caractères et doit contenir au moins une lettre et un chiffre</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Confirmation mot de passe</label>
      <input type="password" class="form-control" name="mdp2" placeholder="Confirmez votre mot de passe">
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
