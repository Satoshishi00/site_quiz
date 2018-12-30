<?php
  include 'html/header.html';
?>

<header class="header-accueil">
  <h1>Accueil</h1>
</header>

<section class="espace_cartes">

  <?php

  //compter le nombre de quiz
  $bdd = new PDO('mysql:host=localhost;dbname=site_quiz;charset=utf8', 'root', '');
  $req = $bdd->prepare("SELECT COUNT(id) FROM quiz ");
  $req->execute();
  $data = $req->fetch(0);
  $nb_quiz = $data[0];

  for($i=$nb_quiz;$i>0;$i--){
    $req = $bdd->prepare("SELECT * FROM quiz WHERE id = :id");
    $req->execute(array('id' => $i));
    $data = $req->fetch(0);
    print_r($data);
    echo
      "<div class=carte_quiz>
        <div class='card text-center'>
          <div class=card-header>
            $data[categorie]
          </div>
          <div class=card-body>
            <h5 class=card-title>$data[nom]</h5>
            <p class=card-text>$data[description]</p>
            <p class=card-text>$data[nb_questions] questions</p>
            <a href=# class='btn btn-primary'>Lancer le quiz</a>
          </div>
          <div class='card-footer text-muted'>
            2 days ago"
            .$d1 = new DateTime($data[date_creation]);
            $d2 = new DateTime(time());
            $diff = $d1->diff($d2);

            $nb_jours  = $intervale->d;

            // $interval = date_diff($datetime2, $datetime1);
            //
            // $interval_annees = substr($interval->format('%Y'), 0);
            // $interval_mois = substr($interval->format('%m'), 0);
            // $interval_jours = substr($interval->format('%d'), 0);
            // $interval_heures = substr($interval->format('%h'), 0);
            // $interval_minutes = substr($interval->format('%i'), 0);
            // $interval_secondes = substr($interval->format('%s'), 0);;


            print_r($interval_annees);

          "</div>
        </div>
      </div>";
  }

  // $req = $bdd->prepare("SELECT * FROM quiz WHERE id = :id");
  // $req->execute('id' = $i);
  // $data = $req->fetch(0);
  // print_r($data);

  ?>



</section>


<?php
  include 'html/footer.html';
?>
