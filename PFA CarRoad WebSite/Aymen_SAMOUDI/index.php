<?php
// __DIR__ est une constante "magique" de PHP qui contient le chemin du dossier courant
$ROOT = __DIR__;
//echo '$ROOT= '.$ROOT;
// DS contient le slash des chemins de fichiers, c'est-à-dire '/' sur Linux et '\' sur Windows
$DS = DIRECTORY_SEPARATOR;

$controleur_default = "accueil" ;

if(!isset($_REQUEST['controller']))

				//$controller récupère $controller_default;
				$controller=$controleur_default;
			else 
				// recupère l'action passée dans l'URL
				$controller = $_REQUEST['controller'];

/*if(!isset($_REQUEST['action']))
	$_REQUEST['action'] = "readAll";*/
				
switch ($controller) {

			case "voiture" :
			session_start();
				require ("{$ROOT}{$DS}controller{$DS}controllerVoiture.php");
				break;
				
			case "accueil" :
			session_start();
				require ("{$ROOT}{$DS}controller{$DS}controllerAccueil.php");
				break;	
			case "client" :
			session_start();
				require ("{$ROOT}{$DS}controller{$DS}controllerClient.php");
				break;

			case "agence" :
			session_start();
				require ("{$ROOT}{$DS}controller{$DS}controllerAgence.php");
				break;

			case "admin" :
			session_start();
				require ("{$ROOT}{$DS}controller{$DS}controllerAdmin.php");
				break;			
			
			
			case "default" :
			session_start();
				require ("{$ROOT}{$DS}controller{$DS}controllerAccueil.php");
				break;
}

?>