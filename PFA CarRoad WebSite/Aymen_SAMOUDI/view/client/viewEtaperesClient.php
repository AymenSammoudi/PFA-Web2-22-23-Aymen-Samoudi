<?php if(!isset($_SESSION['clientId'])){
  header("Location: index.php?controller=client&action=login");
  exit();
}
  else{
    if(isset($_GET['click'])){
      if($_GET['click'] == 'vide'){
           unset($_SESSION['reser']);
        }   
   }
  ?>
<div class="container">
  <div class="row d-flex justify-content-center align-items-center" style="margin-top: 100px">
    <div class="col-lg-8">
      <br><br>
        <div class="card mb-3">
          <div class="card-header text-center" style="background-color: rgba(0, 0, 0, 0.678)!important; color: #fff; border: 2px solid #000">
            <h2>Détails de réservation</h2>
          </div>
          <div class="card-body" style="background: #dfdfdf;">
            <div class="table-responsive">
              <table class="table " id="dataTable" width="100%" cellspacing="0" style="border: 1px solid black; border-collapse: collapse;">
                <thead>
                  <tr>
                    <th style="border: 1px solid black; border-collapse: collapse;">Marque</th>
                    <th style="border: 1px solid black; border-collapse: collapse;">Prix par jour</th>
                    <th style="border: 1px solid black; border-collapse: collapse;">Nombre de jour</th>
                    <th style="border: 1px solid black; border-collapse: collapse;">Date de depart</th>
                    <th style="border: 1px solid black; border-collapse: collapse;">Montant</th>
                  </tr>
                </thead>
                <tbody style="font-size: 20px">
                    
                  <?php 
                    if (!empty($_SESSION['cart'])) {
                      $total=0;
                      foreach($_SESSION['cart'] as $keys => $values){
                  ?>
                  <tr>
                    <td style="border: 1px solid black; border-collapse: collapse;"><?php echo $values['rr']; ?></td>
                    <td style="border: 1px solid black; border-collapse: collapse;"><?php echo $values['prix'] ." DT" ?></td>
                    <td style="border: 1px solid black; border-collapse: collapse;"><?php echo $values['nbjour']; ?></td>
                    <td style="border: 1px solid black; border-collapse: collapse;"><?php echo $values['datedep']; ?></td>
                    <td style="border: 1px solid black; border-collapse: collapse;"><?php echo number_format($values['prix'] * $values['nbjour'], 2) ." DT" ?></td>
                  </tr>
                  <?php 
                    $total=$total+($values['prix']* $values['nbjour']);
                    $nbjs=$values['nbjour'];
                    }
                  ?>
                          
                </tbody>
                <?php
                  }
                ?>
              </table>
            </div>
          </div>
        </div>
    </div>
   

  <div class="col-lg-4">
    <br>
    <div class="card mb-3" style="border: 2px solid #f8a807">
      <div class="container">
        <div class="card-body">
          <form role="form" method="post" action="index.php?controller=client&action=complet&trans=adds">
            <h5><i class="fas fa-user-alt fa-lg" style="color: #cb1703;"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $_SESSION['clientNom'] ?> <?php echo $_SESSION['clientPrenom'] ?></h5><br>
            <h5><i class="far fa-envelope fa-lg" style="color: #cb1703;"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $_SESSION['clientEmail'] ?></h5><br>
            <h5><i class="fas fa-mobile-alt fa-lg" style="color: #cb1703;"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; +216 <?php echo $_SESSION['telephonecl'] ?></h5><br>
            
            <?php 
            // Affectation le nombre de jour a date local 'pc'
              $d = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
              $date_ret=strftime('%Y-%m-%d', strtotime('+ '.$nbjs .' days', $d));
            ?>

            <h5><i class="fas fa-calendar" style="color: #cb1703;"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date de Retour:<input type="date" name="del" style="width: 206px" value="<?= $date_ret ?>" readonly></h5><br>
            <h2>Récapitulatif de la réservation</h2><br>
            <div class="row">
              <div class="col-lg-7" >
                <h5 style="color: #f8a807; font-weight: bold;">Total</h5><br>
              </div>                            
              <div align="right" class="col-lg-4">
                <h5 style="color: #cb1703; font-weight: bold;"><?php echo $total ." DT" ?></h5><br>
              </div> 
            </div>
            <center><button type="submit" onclick="return confirm('Souhaitez-vous soumettre une réservation?')" class="btn btn-lg btn-warning">Soumettre la réservation</button></center>
          </form>  
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
<?php } ?>