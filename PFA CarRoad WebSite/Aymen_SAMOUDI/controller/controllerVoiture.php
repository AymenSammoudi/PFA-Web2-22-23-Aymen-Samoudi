
<?php
//$controller = "utilisateur";
require_once ("{$ROOT}{$DS}model{$DS}ModelVoiture.php"); // chargement du modèle
require_once ("{$ROOT}{$DS}model{$DS}ModelAgence.php");
require_once ("{$ROOT}{$DS}model{$DS}Model.php");

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="readAll";	
	
switch ($action) {
    case "readAll":
        $pagetitle = "Liste des Voitures";
        $view = "readAll";
       	$voit = ModelVoiture::getAll('ModelVoiture');//appel au modèle pour gerer la BD
        require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
        break;
    
    case "detail":
        $pagetitle = "Detail de voiture";
        $view = "detail";
       	$d = ModelVoiture::getVoiture($_REQUEST['id']);
        
        require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
        break;
    

//--------------------------------------------------------------------------------------
	
		
	
}
?>


