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
            <input type=text class=form-control name=question_$i placeholder='Rentrez votre question' required>
          </div>
        </div>


        <div class=input-group>
          <div class=input-group-prepend>
            <div class=input-group-text>
              <label for=exampleFormControlInput1>Réponse 1</label>
              <input type=radio name=question_$i >
            </div>
          </div>
          <input type=text class=form-control name=rep1_$i placeholder='Rentrez la réponse n°1' required>
        </div>

        <div class=input-group>
          <div class=input-group-prepend>
            <div class=input-group-text>
              <label for=exampleFormControlInput1>Réponse 2</label>
              <input type=radio name=question_$i>
            </div>
          </div>
          <input type=text class=form-control name=rep2_$i placeholder='Rentrez la réponse n°2' required>
        </div>

        <div class=input-group>
          <div class=input-group-prepend>
            <div class=input-group-text>
              <label for=exampleFormControlInput1>Réponse 3</label>
              <input type=radio name=question_$i>
            </div>
          </div>
          <input type=text class=form-control name=rep3_$i placeholder='Rentrez la réponse n°3' required>
        </div>

        <div class=input-group>
          <div class=input-group-prepend>
            <div class=input-group-text>
              <label for=exampleFormControlInput1>Réponse 4</label>
              <input type=radio name=question_$i>
            </div>
          </div>
          <input type=text class=form-control name=rep4_$i placeholder='Rentrez la réponse n°4' required>
        </div>

      </div>";

      if(!empty($_POST)){


        $req = $bdd->prepare('INSERT INTO quiz(categorie, nom, nb_questions, description, auteur, date_creation)
                              VALUES(:categorie, :nom, :nb_questions, :description, :auteur, NOW())');
        $req->execute(array(
                              'categorie'     => $_SESSION['categorie_quiz'],
                              'nom'           => $_SESSION['nom_quiz'],
                              'nb_questions'  => $_SESSION['nb_questions'],
                              'description'   => $_SESSION['description'],
                              'auteur'        => $_SESSION['pseudo'],
                              ));

        $req = $bdd->prepare("SELECT id FROM quiz WHERE nom = :nom");
        $req->execute(array('nom' => $_SESSION['nom_quiz']));
        $data = $req->fetch(0);
        print_r($data);



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
