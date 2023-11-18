<?php
//$controller = "utilisateur";
require_once ("{$ROOT}{$DS}model{$DS}ModelAdmin.php"); // chargement du modèle

if(isset($_REQUEST['action']))  
/* recupère l'action passée dans l'URL*/
  $action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
  else $action="log_admin"; 
  
switch ($action) {

case "log_admin":
        $pagetitle = "Connexion d'administrateur";
        $view = "login";
        //appel au modèle pour gerer la BD
        require ("{$ROOT}{$DS}view{$DS}viewAdmin.php");//"redirige" vers la vue
        break;

 case "clients":
        $pagetitle = "Listes de clients";
        $view = "index";
        //appel au modèle pour gerer la BD
        require ("{$ROOT}{$DS}view{$DS}viewAdmin.php");//"redirige" vers la vue
        break;
case "agences":
        $pagetitle = "Listes des agences";
        $view = "agences";
        //appel au modèle pour gerer la BD
        require ("{$ROOT}{$DS}view{$DS}viewAdmin.php");//"redirige" vers la vue
        break;

 case "formlogin":
     if(isset($_REQUEST['login_admin-submit'])){
     	$mailuid = $_POST['mailpseudo_ad'];
        $password = $_POST['pwdin_ad'];
         if(empty($mailuid) || empty($password)){
	            header("Location: index.php?controller=admin&error=champs_vide");
                exit();
            }
            else
            {

                $log = new ModelAdmin($mailuid, $password);
                 $log->login_admin($mailuid, $password);
                 $pagetitle = "Connexion d'administrateur";
				   $view = "index";
				   require ("{$ROOT}{$DS}view{$DS}viewAdmin.php");
                   break;
            }
     }   

case "loggedoutadmin":
     if(isset($_REQUEST['logout-admin-submit'])){
     	session_unset();
     	session_destroy();
        $pagetitle = "Connexion d'administrateur";
     	$view="login";
     	require ("{$ROOT}{$DS}view{$DS}viewAdmin.php");
        break;
     }

case "accepte_agence":
        $pagetitle = "Listes des agences";
        $view = "agences";
        ModelAdmin::accepte_agence($_GET['id']);
        //appel au modèle pour gerer la BD
        require ("{$ROOT}{$DS}view{$DS}viewAdmin.php");//"redirige" vers la vue
        break;           
case "refuser_agence":
        $pagetitle = "Listes des agences";
        $view = "agences";
        ModelAdmin::refuser_agence($_GET['id']);
        //appel au modèle pour gerer la BD
        require ("{$ROOT}{$DS}view{$DS}viewAdmin.php");//"redirige" vers la vue
        break;  
        
 case "list_confirmer":
        $pagetitle = "Transaction Confirmer";
        $view = "transconfirm";
        require ("{$ROOT}{$DS}view{$DS}viewAdmin.php");//"redirige" vers la vue
        break;
         
}
