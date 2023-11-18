<div class="container">
  <center>
    <div class="card w-50" style="margin-top: 8rem;">
      <div class="card-header" style="background-color: rgba(0, 0, 0, 0.678)!important; color: #fff;">
        Détails de réservation client
      </div>
      <div class="card-body" style="background: #dfdfdf;">
        <h3 class="card-title"><span style="color: #f8a807;"><?= $_SESSION['marque_det'] ?></span></h3>
        <p class="card-text text-justify">Nom :<span style="color: #cb1703;"><?= $_SESSION['nom_trans']; ?></span> <br> Prenom : <span style="color: #cb1703;"><?= $_SESSION['prenom_trans']; ?></span> <br> Email : <span style="color: #cb1703;"><?= $_SESSION['email_trans']; ?></span> <br> Numero de telephone : <span style="color: #cb1703;"><?= $_SESSION['numtel_trans']; ?></span></p>
      </div>
      <div class="card-footer text-muted">
        Nombre de jour(s) : <?= $_SESSION['nbjour_trans'] ?> jour(s)
      </div>
    </div>
  </center>
</div>