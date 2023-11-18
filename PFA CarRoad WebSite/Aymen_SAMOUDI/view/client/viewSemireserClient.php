<?php if(!isset($_SESSION['clientId'])){
  header("Location: index.php?controller=client&action=login");
  exit();
}
  else{

if(isset($_POST['addvoit'])){
	if(isset($_SESSION['reser'])){
      $item_array_id= array_column($_SESSION['reser'], "id_voit");
       if(!in_array($_GET['id'], $item_array_id)){
       	$count=count($_SESSION['reser']);
       	$item_array=array('id_voit' => $_GET['id'],
           'rr' => $_POST['marque'],
           'prix' => $_POST['prix'],
           'nbjour' => $_POST['nbjour'],
           'datedep' => $_POST['datedep']
       );
       	$_SESSION['reser'][$count]=$item_array;

       	echo '<script>window.location="index.php?controller=client&action=semi_reservation" </script>';
       }
       else{
       	echo '<script>alert("Le voiture est déjà ajouté au réservation") </script>';

       	 	echo '<script>window.location="index.php?controller=client&action=semi_reservation" </script>';
       }
	}
	else{
		$item_array=array(
			'id_voit' => $_GET['id'],
           'rr' => $_POST['marque'],
           'prix' => $_POST['prix'],
           'nbjour' => $_POST['nbjour'],
           'datedep' => $_POST['datedep']
          
		);
		$_SESSION['reser'][0]=$item_array;
     
	}
	$_SESSION['cart'] = $_SESSION['reser'];
}
if(isset($_GET['del'])){
   if($_GET['del']=='delete'){
   	foreach ($_SESSION['reser'] as $key => $value) {
   		if($value['id_voit']==$_GET['id']){
           unset($_SESSION['reser'][$key]);
           echo '<script>alert("Le voiture selectionné est supprimer de la liste!!"); </script>';
            echo '<script>window.location="index.php?controller=client&action=semi_reservation" </script>';
   		}
   		
   	}
   }
}

?>

<main role="main" class="col-md-9 ml-md col-lg-12 px-3">

<div class="container">
<h2 class="text-danger">Réservation</h2>
<div class="table-responsive">
<table class="table">
<tr>
	<th>Marque</th>
	<th>Prix par jour</th>
	<th>Nombre de jour</th>
	<th>Date de depart</th>
	<th>Montant</th>
</tr>
<?php  
 
if(!empty($_SESSION['reser'])){
	$total=0;
	foreach ($_SESSION['reser'] as $key => $value) {
	?>
	
	<tr>
		<td><?php echo $value['rr']; ?></td>
		<td><?php echo $value['prix']; ?></td>
		<td><?php echo $value['nbjour']; ?></td>
		<td><?php echo $value['datedep']; ?></td>
		<td><?php echo number_format($value['prix'] * $value['nbjour'], 2); ?></td>
		<td><a href="index.php?controller=client&action=semi_reservation&del=delete&id=<?php echo $value['id_voit']; ?>"><span class="text-danger">Supprimer</span></a></td>
      
	</tr>
	<?php $total=$total+($value['prix']* $value['nbjour']); 
}
	?>
    <tr>
    	<td colspan="4" align="right">Total</td>
    	<th align="right"><?php echo number_format($total,2); ?></th>
    	<td><a type="button" class="btn btn-primary" href="index.php?controller=client&action=etapelouer&click=vide">Louer</a></td>
    </tr>
<?php	
  
}
?>

</table>	

</div>
</div>
</main>

<?php } ?>