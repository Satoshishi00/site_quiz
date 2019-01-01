<?php
  include 'html/header.html';
?>

<?php

session_start();

if( empty($_SESSION['error_nom']) AND empty($_SESSION['error_categorie']) ) {
  //initialisation des erreurs
  $_SESSION['error_nom'] = '';
  $_SESSION['error_categorie'] = '';
}

?>

<header class="header-creation-quiz">
  <h1>Création Quiz</h1>
</header>

<section>

  <form class="form-creation-quiz" action="back/traitement-creation_quiz.php" method="post">

    <div class="form-group">
      <label for="exampleFormControlSelect1">Catégorie</label>
      <select class="form-control" name="categorie" value="<?php if (isset($_POST['categorie'])){echo $_POST['categorie'];} ?>">
        <option>Catégorie</option>
        <option>Cat1</option>
        <option>Cat2</option>
        <option>Cat3</option>
        <option>Cat4</option>
        <option>Cat5</option>
      </select>
      <small class="small-error"><?= $_SESSION['error_categorie'] ?></small>
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Nom du quiz</label>
      <input type="text" class="form-control" name="nom" placeholder="Entrez le nom du quiz" value="<?php if (isset($_POST['nom'])){echo $_POST['nom'];} ?>" required>
      <small class="small-error"><?= $_SESSION['error_nom'] ?></small>
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Nombre de questions</label>
      <input type="number" class="form-control" name="nb_questions" min="1" max="40" placeholder="Entrez le nombre de question du quiz" value="<?php if (isset($_POST['nb_quesitons'])){echo $_POST['nb_questions'];} ?>" required>
    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description sommaire du quiz</label>
      <textarea class="form-control" rows="3" name="description" maxlength="100" placeholder="Décrivez votre quiz en moins de 100 caractères (facultatif)" value="<?php if (isset($_POST['description'])){echo $_POST['description'];} ?>"></textarea>
    </div>


    <div class="button-creer">
      <button type="submit" class="btn btn-primary">Suivant</button>
    </div>

  </form>

</section>


<?php

  //initialisation des erreurs
  $_SESSION['error_nom'] = '';
  $_SESSION['error_categorie'] = '';

  include 'html/footer.html';
?>
