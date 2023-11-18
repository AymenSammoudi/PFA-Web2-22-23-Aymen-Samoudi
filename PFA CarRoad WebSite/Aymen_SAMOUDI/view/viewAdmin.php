
<?php

//require_once("{$ROOT}{$DS}view{$DS}header.php");
require_once($ROOT.$DS."view".$DS."headerAdmin.php");

// Si $controleur='voiture' et $view='readAll',
// alors $filepath=".../view/voiture/"
//       $filename="viewReadAllVoiture.php";
// et on charge '.../view/voiture/viewReadAllVoiture.php'
$filepath = "{$ROOT}{$DS}view{$DS}{$controller}{$DS}"; 

// détermine le chemin de la vue en fonction du controller qu'on utilise
$filepath = $ROOT.$DS."view".$DS.$controller.$DS;
$filename = "view".ucfirst($view).ucfirst($controller).'.php'; // détermine le nom du fichier
require_once($filepath.$filename);
require_once($ROOT.$DS."view".$DS."footerAdmin.php");
//require_once("{$ROOT}{$DS}view{$DS}footer.php");
?>
</body>
</html> 