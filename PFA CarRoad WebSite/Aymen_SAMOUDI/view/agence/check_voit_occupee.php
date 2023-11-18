<?php require_once '../dbhloginup.inc.php';

$query="SELECT date_de_retour FROM loyer WHERE id_voit_l = '".$_GET['id']."'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
while($row = mysqli_fetch_array($result))
              {   
              	$date_ret = $row['date_de_retour'];
              }

$date_de_retour = new DateTime($date_ret); // Date dans le passé
$date_pc_local = new DateTime(date("Y-m-d"));   // Date du jour (2018-09-07 16:10:21)
  // 8 années
$interval = $date_de_retour->diff($date_pc_local);
   // Test date de retour avec le date local si reste jours alors
    if($interval->format('%a') > 0 ) {
        ?>
       <script>
			alert("Il ne reste plus que <?= $interval->format('%a') ?> jour(s) restant(s)" );
			window.location = "../../voiture_agence.php";
		</script>
		<?php
    }
    //Sinon mise le statut de voiture rendre Libre 
   else{
	   $query1="UPDATE voitures SET statut = 'Libre' WHERE id_voiture = '".$_GET['id']."'";
	   mysqli_query($conn, $query1)or die(mysqli_error($conn));
	    ?>
       <script>
			alert("Le Voiture Libre" );
			window.location = "../../voiture_agence.php";
		</script>
		<?php
   }
?>