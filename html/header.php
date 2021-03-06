<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Super Quiz</title>
  </head>
  <body>
    <?php session_start();?>
    <header>
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="/site_quiz/accueil.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/site_quiz/creation_quiz.php">Créer un quiz</a>
        </li>
        <div class="barre_utilisateur">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?=$_SESSION['pseudo']?></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/site_quiz/profil.php">Mon profil</a>
              <a class="dropdown-item" href="/site_quiz/parametres.php">Paramètres</a>
              <!-- <a class="dropdown-item" href="#">Something else here</a> -->
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/site_quiz/back/deconnexion.php">Se déconnecter</a>
            </div>
          </li>
        </div>


        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#" tabaccueil="-1" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>
    </header>
