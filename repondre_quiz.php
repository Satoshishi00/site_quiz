<?php
  include 'header.php';
?>

<header class="header-repondre-quiz">
  <h1>Nom du quiz</h1>
</header>

<section class="section-rep-quiz">

  <form class="form-rep-quiz" action="index.html" method="post">

    <div class="qcm">

      <div class="question">
        <label class="label-question-num">i</label>
        <label class="label-question-affichage">Question</label>
      </div>

      <div class="rep">
        <label class="label-rep-num" for="exampleFormControlInput1">Réponse 1</label>
        <input type="radio" aria-label="Radio button for following text input" name="question1" >
        <label class="label-rep-affichage" for="exampleFormControlInput1">re1</label>
      </div>

      <div class="rep">
        <label class="label-rep-num" for="exampleFormControlInput1">Réponse 2</label>
        <input type="radio" aria-label="Radio button for following text input" name="question1" >
        <label class="label-rep-affichage" for="exampleFormControlInput1">re1</label>
      </div>

      <div class="rep">
        <label class="label-rep-num" for="exampleFormControlInput1">Réponse 3</label>
        <input type="radio" aria-label="Radio button for following text input" name="question1" >
        <label class="label-rep-affichage" for="exampleFormControlInput1">re1</label>
      </div>

      <div class="rep">
        <label class="label-rep-num" for="exampleFormControlInput1">Réponse 4</label>
        <input type="radio" aria-label="Radio button for following text input" name="question1" >
        <label class="label-rep-affichage" for="exampleFormControlInput1">re1</label>
      </div>



      <!-- <h2>Question n°i</h2>


      <div class="input-question">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <label class="label-question" for="exampleFormControlInput1">Question</label>
            </div>
          </div>
          <input type="text" class="form-control" aria-label="Text input with radio button" placeholder="Rentrez votre question">
        </div>
      </div>


      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <label for="exampleFormControlInput1">Réponse 1</label>
            <input type="radio" aria-label="Radio button for following text input" name="question1" >
          </div>
        </div>
        <input type="text" class="form-control" aria-label="Text input with radio button" placeholder="Rentrez la réponse n°1">
      </div>

      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <label for="exampleFormControlInput1">Réponse 2</label>
            <input type="radio" aria-label="Radio button for following text input" name="question1">
          </div>
        </div>
        <input type="text" class="form-control" aria-label="Text input with radio button" placeholder="Rentrez la réponse n°2">
      </div>

      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <label for="exampleFormControlInput1">Réponse 3</label>
            <input type="radio" aria-label="Radio button for following text input" name="question1">
          </div>
        </div>
        <input type="text" class="form-control" aria-label="Text input with radio button" placeholder="Rentrez la réponse n°3">
      </div>

      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <label for="exampleFormControlInput1">Réponse 4</label>
            <input type="radio" aria-label="Radio button for following text input" name="question1">
          </div>
        </div>
        <input type="text" class="form-control" aria-label="Text input with radio button" placeholder="Rentrez la réponse n°4">
      </div> -->

    </div>

  </form>

</section>


<?php
  include 'footer.php';
?>
