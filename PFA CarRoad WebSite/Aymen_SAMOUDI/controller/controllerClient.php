<?php
//$controller = "utilisateur";
require_once ("{$ROOT}{$DS}model{$DS}ModelClient.php"); // chargement du modèle

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="login";	
	
switch ($action) {
    case "login":
        $pagetitle = "Connexion d'utilisateur";
        $view = "login";
       	//appel au modèle pour gerer la BD
        require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
        break;

	case "registre":	
        $pagetitle = "Details de l'utilisateur";
		$view = "registre";
		require ("{$ROOT}{$DS}view{$DS}view.php");
			
			
		break;

	//FORMULAIRE LOGIN Client---------------------------------------/
	case "loggedout": 
	 if(isset($_REQUEST['logout-submit'])){
	   session_start();
       unset($_SESSION['clientId']);
	      unset($_SESSION['clientUid']);
	      unset($_SESSION['clientNom']);
	      unset($_SESSION['clientPrenom']);
	      unset($_SESSION['clientEmail']);
	      unset($_SESSION['telephonecl']);      
       header("Location: index.php");
       $view="loggedout";
       require ("{$ROOT}{$DS}view{$DS}view.php");
   }
       break;	
	case "formlogin":
		if(isset($_REQUEST['login_client-submit'])){
			$mailuid = $_POST['mailpseudo_c'];
            $password = $_POST['pwdin_c'];
            if(empty($mailuid) || empty($password)){
	            header("Location: index.php?error=emptyfields");
                exit();
            }
            else{

                $log = new ModelClient($mailuid, $password);
                 $log->Login($mailuid, $password);
                 $pagetitle = "Login";
				   $view = "formlogin";
				   require ("{$ROOT}{$DS}view{$DS}view.php");
            }
		}
	    break;

	//FORMULAIRE REGISTRE Client-----------------------------------------/	
	case "formregistre":
		if(isset($_REQUEST['registre-submit'])){
			 $username=$_POST['pseudo_cl'];
			 $nom=$_POST['nom_cl'];
			 $prenom=$_POST['prenom_cl'];
			 $email=$_POST['email_cl'];
			 $tel=$_POST['tel_cl'];
			 $pwd=$_POST['password_cl'];
			 $pwdrepeat=$_POST['password_confirm_cl'];

			if(empty($username) || empty($nom) || empty($prenom) || empty($email) || empty($pwd) || empty($pwdrepeat)){
			header("Location: index.php?controller=client&action=registre&error=emptyfields&pseudo=".$username."&email".$email);
			exit();
			}
			else if(!preg_match('/^[a-z ]+$/i', $nom)){
				header("Location: index.php?controller=client&action=registre&error=invalidnom_cl&nom=".$nom);
			exit();
			}
			else if(!preg_match("/^[a-z ]+$/i", $prenom)){
				header("Location: index.php?controller=client&action=registre&error=invalidnom_cl&prenom=".$prenom);
			exit();
			}
			else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
			    header("Location: index.php?controller=client&action=registre&error=invalidmailuname");
			}
			else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				header("Location: index.php?controller=client&action=registre&error=invalidmail&nom_cl=".$username);
			exit();
			}
			else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
				header("Location: index.php?controller=client&action=registre&error=invaliduname&mail=".$email);
			exit();
			}
			else if($pwd !== $pwdrepeat){
			    header("Location: index.php?controller=client&action=registre&error=passwordcheck&nom_cl=".$username."&email_cl".$email);
			    exit();
			}
			else{
                 
                   	$reg = new ModelClient($username, $nom, $prenom, $email, $tel, $pwd, $pwdrepeat);
                   	$reg->Registre($username, $nom, $prenom, $email, $tel, $pwd);
                   	$pagetitle = "Registre";
				   $view = "formregistre";
				   require ("{$ROOT}{$DS}view{$DS}view.php");     
			}
			
		}
		else{
	          header("Location: index.php?controller=client&action=login");
              exit();
            }
		break;
/*****************************************************************************************************/
    case "semi_reservation":
   
                   $pagetitle = "Réservation";
				   $view = "semireser";
				   require ("{$ROOT}{$DS}view{$DS}view.php");
				   break;
    case "etapelouer":

                   $pagetitle = "Réservation";
				   $view = "etaperes";
				   require ("{$ROOT}{$DS}view{$DS}view.php");
				   break;
     
     case "list_reser":
                         $pagetitle = "Liste des Réservation";
                          $view = "reservationaffich";
                          require ("{$ROOT}{$DS}view{$DS}view.php");

                          break;
   
              
    case "complet":  
                	
                           ModelClient::insert_loyer();
                          $pagetitle = "Liste des Réservation";
                          $view = "reservationaffich";
                          require ("{$ROOT}{$DS}view{$DS}view.php");

                          break;

            


}                 
?>
      


