<?php
  include 'html/header_connexion.html';
?>


<?php

//initialisation des erreurs
$error_pseudo='';
$error_mail='';
$error_mdp='';

?>

<header class="header-inscription">
  <h1>Inscription</h1>
</header>

<section class="section-inscription">

  <form class="form-inscription" method="post" action="back/traitement-inscription.php">

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
