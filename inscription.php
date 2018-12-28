<?php
  include 'header_connexion.php';
?>

<header class="header-inscription">
  <h1>Inscription</h1>
</header>

<section>

  <form class="form-inscription">

    <div class="form-group">
      <label for="exampleInputEmail1">Pseudo</label>
      <input type="text" class="form-control" placeholder="Entrez un pseudo">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre email">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Corfirmation Email</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Confirmez votre email">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Mot de passe</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Entrez votre mot de passe">
      <small id="passwordlHelp" class="form-text text-muted">Votre mot de passe doit faire entre 6 et 23 caractères et doit contenir au moins une lettre et un chiffre</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Confirmation mot de passe</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirmez votre mot de passe">
    </div>

    <button type="submit" class="btn btn-primary">S'inscrire</button>

    <div class="inscription">
      <p>Vous avez déjà un compte ? :)</p>
      <a href="connexion.php" class="btn btn-primary">Se connecter</a>
    </div>

  </form>

</section>

<?php
  include 'footer_connexion.php';
?>
