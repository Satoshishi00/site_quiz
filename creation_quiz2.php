<?php
  include 'html/header.html';
?>

<header class="header-creation-quiz">
  <h1>Création Quiz</h1>
</header>

<section>

  <form class="form-creation-quiz" action="index.html" method="post">

  <?php

    session_start();
    for( $i=1; $i <= $_SESSION['nb_questions'] ; $i++ ){

    echo
    "<div class=question>
        <h2>Question n°$i</h2>


        <div class=input-question>
          <div class=input-group>
            <div class=input-group-prepend>
              <div class=input-group-text>
                <label class=label-question for=exampleFormControlInput1>Question</label>
              </div>
            </div>
            <input type=text class=form-control aria-label=Text input with radio button placeholder='Rentrez votre question'>
          </div>
        </div>


        <div class=input-group>
          <div class=input-group-prepend>
            <div class=input-group-text>
              <label for=exampleFormControlInput1>Réponse 1</label>
              <input type=radio aria-label=Radio button for following text input name=question1 >
            </div>
          </div>
          <input type=text class=form-control aria-label=Text input with radio button placeholder='Rentrez la réponse n°1'>
        </div>

        <div class=input-group>
          <div class=input-group-prepend>
            <div class=input-group-text>
              <label for=exampleFormControlInput1>Réponse 2</label>
              <input type=radio aria-label=Radio button for following text input name=question1>
            </div>
          </div>
          <input type=text class=form-control aria-label=Text input with radio button placeholder='Rentrez la réponse n°2'>
        </div>

        <div class=input-group>
          <div class=input-group-prepend>
            <div class=input-group-text>
              <label for=exampleFormControlInput1>Réponse 3</label>
              <input type=radio aria-label=Radio button for following text input name=question1>
            </div>
          </div>
          <input type=text class=form-control aria-label=Text input with radio button placeholder='Rentrez la réponse n°3'>
        </div>

        <div class=input-group>
          <div class=input-group-prepend>
            <div class=input-group-text>
              <label for=exampleFormControlInput1>Réponse 4</label>
              <input type=radio aria-label=Radio button for following text input name=question1>
            </div>
          </div>
          <input type=text class=form-control aria-label=Text input with radio button placeholder='Rentrez la réponse n°4'>
        </div>

      </div>";

    }

  ?>


    <div class="button-creer">
      <button type="submit" class="btn btn-primary">Créer</button>
    </div>

  </form>

</section>


<?php
  include 'html/footer.html';
?>
