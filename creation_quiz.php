<?php
  include 'html/header.html';
?>

<header class="header-creation-quiz">
  <h1>Création Quiz</h1>
</header>

<section>

  <form class="form-creation-quiz" action="index.html" method="post">

    <div class="form-group">
      <label for="exampleFormControlSelect1">Catégorie</label>
      <select class="form-control" id="exampleFormControlSelect1">
        <option>Cat1</option>
        <option>Cat2</option>
        <option>Cat3</option>
        <option>Cat4</option>
        <option>Cat5</option>
      </select>
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Nom du quiz</label>
      <input type="text" class="form-control" placeholder="Entrez le nom du quiz">
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Nombre de questions</label>
      <input type="number" class="form-control" placeholder="Entrez le nombre de question du quiz">
    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description sommaire du quiz</label>
      <textarea class="form-control" rows="3"></textarea>
    </div>


    <div class="button-creer">
      <button type="submit" class="btn btn-primary">Suivant</button>
    </div>

  </form>

</section>


<?php
  include 'html/footer.html';
?>
