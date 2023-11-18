 <?php if((!isset($_SESSION['idAdmin'])))
{
    header("location: index.php?controller=admin&action=log_admin");
}
  else{
  ?>
<div class="card mx-auto mt-5 w-75 mb-3">
  <div class="card-header">
    <center>
       <div>
        <h1 class="text-success">Transaction Confirmer</h1>
      </div>
    </center>
  </div>
    <div class="card-body">
       <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                  <th>Nom de client</th>
                  <th>Mail</th>
                  <th>Telephone</th>
                  <th>Depart</th>
                  <th>Retour</th>
                  <th>Marque voiture</th>
                  <th>Montant Total</th>
             
              </tr>
            </thead>
             <tbody>
             <!--RECUPERE LES INFORMATION DES RESERVATION-->    
             <?php Model::affich_list_reservation_accepter(); ?>
             </tbody>        
          </table>
        </div>
      </div>
   </div>
<?php } ?>