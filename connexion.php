<?php
  include 'html/header_connexion.html';
?>


<?php

//initialisation des erreurs
$error_mail='';
$error_mdp='';

?>


<header class="header-connexion">
  <h1>Connexion</h1>
</header>

<section>

  <form class="form-inscription" method="post" action="back/traitement-connexion.php">

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
