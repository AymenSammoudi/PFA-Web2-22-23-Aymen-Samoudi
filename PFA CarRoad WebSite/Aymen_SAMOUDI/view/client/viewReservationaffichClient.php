<?php if(!isset($_SESSION['clientId'])){
  header("Location: index.php?controller=client&action=login");
  exit();
}
  else{
  ?>
<div class="card mx-auto mt-5 w-75 mb-3">
  <div class="card-header">
    <center>
       <div>
        <h1 class="text-primary">Liste de Réservation</i></h1>
      </div>
    </center>
  </div>
    <div class="card-body">
       <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                  <th>ID</th>
                  <th>Date de depart</th>
                  <th>Date de retour</th>
                  <th>Marque</th>
                  <th>Total</th>
                  <th>Demande</th>
              </tr>
            </thead>
             <tbody>
             <!--RECUPERE LES INFORMATION DES RESERVATION-->    
            <?php Model::info_reservation(); ?>  
             </tbody>        
          </table>
        </div>
      </div>
   </div>
<?php } ?>
