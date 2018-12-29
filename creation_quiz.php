<?php
  include 'header.php';
?>

<h1>Création Quiz</h1>

<section>

  <form class="" action="index.html" method="post">

    <div class="question">
      <h2>Question n°i</h2>

      <div class="form-group">
        <label for="exampleFormControlInput1">question</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Rentrez votre question">
      </div>

      <div class="input-group">

        <div class="input-group-prepend">
          <div class="input-group-text">
            <label for="exampleFormControlInput1">Réponse 1 :</label>
            <input type="radio" aria-label="Radio button for following text input" name="question1" >
          </div>
        </div>
        <input type="text" class="form-control" aria-label="Text input with radio button" placeholder="Rentrez la réponse n°1">
      </div>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <label for="exampleFormControlInput1">rep2</label>
            <input type="radio" aria-label="Radio button for following text input" name="question1">
          </div>
        </div>
        <input type="text" class="form-control" aria-label="Text input with radio button" placeholder="Rentrez la réponse n°2">
      </div>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <input type="radio" aria-label="Radio button for following text input" name="question1">
          </div>
        </div>
        <input type="text" class="form-control" aria-label="Text input with radio button" placeholder="Rentrez la réponse n°3">
      </div>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <input type="radio" aria-label="Radio button for following text input" name="question1">
          </div>
        </div>
        <input type="text" class="form-control" aria-label="Text input with radio button" placeholder="Rentrez la réponse n°4">
      </div>
    </div>

  </form>

</section>


<?php
  include 'footer.php';
?>
