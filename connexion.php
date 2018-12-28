<?php
  include 'header_connexion.php';
?>

<header class="header-connexion">
  <h1>Connexion</h1>
</header>

<section>

  <form class="form-inscription">

    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre email">
      <small id="emailHelp" class="form-text text-muted">Nous nous engageons à ne divulguer votre email à personne</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Mot de passe</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Entrez votre mot de passe">
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
  include 'footer_connexion.php';
?>
