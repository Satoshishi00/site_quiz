<?php
  include 'html/header_connexion.html';
?>


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
      echo "ok";
      
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


<header class="header-connexion">
  <h1>Connexion</h1>
</header>

<section>

  <form class="form-inscription" method="post" action="">

    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Entrez votre email" required>
      <small class="small-error"><?=$error_mail?></small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Mot de passe</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="mdp" placeholder="Entrez votre mot de passe" required>
      <small class="small-error"><?=$error_mdp?></small>
    </div>
    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
    </div>

    <button type="submit" class="btn btn-primary">Se connecter</button>

    <div class="inscription">
      <p>Vous n'avez pas encore de compte ? :o</p>
      <a href="inscription.php" class="btn btn-primary">S'inscrire</a>
    </div>

    <a class="mdp_oublie" href="mdp_oublie.php">Mot de passe oublié ?</a>
  </form>



</section>

<?php
  include 'html/footer_connexion.html';
?>
