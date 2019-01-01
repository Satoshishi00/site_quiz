<!-- modale d'inscription -->
<div class="modal fade" id="id-popup-inscription"  data-dismiss>
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Tire de la PopUp -->
      <div class="modal-header">
        <h4 class="modal-title" id="titrePopUp">Félicitation vous êtes inscrit !</h4>
        <!-- Bouton de fermuture de la popup -->
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

      </div>

      <div class="modal-body">
        <p class="lead">Bienvenue <?=$_SESSION['pseudo']?></p>
        <p>Vous gagnez 10 points pour votre inscription</p>
      </div>
      <div class="modal-footer">
        <a href="index.php" class="btn btn-primary pull-left">Recevoir</a>
      </div>

    </div>
  </div>
</div>


<!-- modale de connexion -->
<div class="modal fade" id="id-popup-connexion"  data-dismiss>
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Tire de la PopUp -->
      <div class="modal-header">
        <h4 class="modal-title" id="titrePopUp">Bienvenue <?=$_SESSION['pseudo']?></h4>
        <!-- Bouton de fermuture de la popup -->
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

      </div>

      <div class="modal-body">
        <p class="lead">Content de vous revoir</p>
        <p>Vous gagnez 5 points pour vous être connecté</p>
      </div>
      <div class="modal-footer">
        <a href="index.php" class="btn btn-primary pull-left">Recevoir</a>
      </div>

    </div>
  </div>
</div>


<!-- modale de création de quiz -->
<div class="modal fade" id="id-popup-creation-quiz"  data-dismiss>
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Tire de la PopUp -->
      <div class="modal-header">
        <h4 class="modal-title" id="titrePopUp">Félicitation <?=$_SESSION['pseudo']?></h4>
        <!-- Bouton de fermuture de la popup -->
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

      </div>

      <div class="modal-body">
        <p class="lead">Votre quiz "<?=$_SESSION['nom_quiz']?>" a été créé</p>
        <p>Vous gagnez <?=$_SESSION['points-creation-quiz']?> points</p>
      </div>
      <div class="modal-footer">
        <a href="index.php" class="btn btn-primary pull-left">Recevoir</a>
      </div>

    </div>
  </div>
</div>
