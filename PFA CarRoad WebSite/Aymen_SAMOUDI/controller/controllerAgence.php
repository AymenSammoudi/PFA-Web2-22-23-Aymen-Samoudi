<?php
//$controller = "utilisateur";
require_once ("{$ROOT}{$DS}model{$DS}ModelAgence.php");
require_once ("{$ROOT}{$DS}model{$DS}ModelVoiture.php");  // chargement du modèle

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="loginag";	
	
switch ($action) {
    case "loginag":
        $pagetitle = "Login en tant que agence";
        $view = "loginag";
       	//appel au modèle pour gerer la BD
        require ("{$ROOT}{$DS}view{$DS}view.php");//"redirige" vers la vue
        break;

	case "registreag":	
        $pagetitle = "Registre en tant que utilisateur";
		$view = "registreag";
		require ("{$ROOT}{$DS}view{$DS}view.php");
			
			
		break;

	//FORMULAIRE LOGIN Client---------------------------------------/
	case "loggedoutagence": 
	 if(isset($_REQUEST['logoutag-submit'])){
	   session_start();
       unset($_SESSION['agenceId']);
       unset($_SESSION['agenceUid']);
       header("Location: index.php");
       $view="loggedoutagence";
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
	case "formregistre_agence":
		if(isset($_REQUEST['registre_agence_submit'])){
			 $username=$_POST['pseudo_ag'];
			 $nom=$_POST['nom_ag'];
			 $email=$_POST['email_ag'];
			 $tel=$_POST['num_ag'];
			 $address=$_POST['addr_ag'];
			 $pwd=$_POST['password_ag'];
			 $pwdrepeat=$_POST['password_confirm_ag'];

			if(empty($username) || empty($nom) || empty($email) || empty($tel) || empty($address) || empty($pwd) || empty($pwdrepeat)){
				header("Location: index.php?controller=agence&error=emptyfields&nom_ag=".$username."&email_ag".$email);
				exit();
				}
				else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
				    header("Location: index.php?controller=agence&error=invalidmailuname");
				}
				else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					header("Location: index.php?controller=agence&error=invalidmail&nom_ag=".$username);
				exit();
				}
				else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
					header("Location: index.php?controller=agence&error=invaliduname&mail=".$email);
				exit();
				}
				else if($pwd !== $pwdrepeat){
				    header("Location: index.php?controller=agence&error=passwordcheck&nom_cl=".$username."&email_ag".$email);
				    exit();
				}
			else{
                 
                   	$reg = new ModelAgence($username, $nom, $email, $tel, $address, $pwd, $pwdrepeat);
                   	$reg->registre_agence($username, $nom, $email, $tel, $address, $pwd);
                   	$pagetitle = "Registre Agence";
				   
				   require ("{$ROOT}{$DS}view{$DS}view.php");     
			}
			
		}
		else{
	          header("Location: index.php?controller=agence&action=loginag");
              exit();
            }
		break;
/*****************************************************************************************************/
       case "formlogin_agence":
       if(isset($_POST['login_agence-submit'])){

			$mailuid = $_POST['mailpseudo_ag'];
			$password = $_POST['pwdin_ag'];
			if(empty($mailuid) || empty($password)){
				header("Location: ../index.php?error=emptyfields");
			    exit();
            }
            else{
            	 $log = new ModelAgence($mailuid, $password);
                 $log->login_agence($mailuid, $password);
                 $pagetitle = "Login Agence";
				 $view = "formlogin_agence";
				 require ("{$ROOT}{$DS}view{$DS}view.php");
            }
          }
          break;

       case "loggedoutagence": 
		 if(isset($_REQUEST['logoutag-submit'])){
		   session_start();
	       session_unset();
	       session_destroy();
	       header("Location: index.php");
	       $view="loggedoutagence";
	       require ("{$ROOT}{$DS}view{$DS}view.php");
       }
         break; 

      case "insertvoit":
          $pagetitle = "Inserée Votre Voitures";
		  $view = "insertvoit";
		  require ("{$ROOT}{$DS}view{$DS}view.php");
		  break;
    /*********************** L'agence doit insere voitures***************************/
      case "insertsubmit":
	  
	   if(isset($_POST['testdb'])){
  
		  $pic="Imageuploads/".$_FILES['img'] ['name'];
		  $tp=pathinfo($pic, PATHINFO_EXTENSION);
		  if($_FILES['img'] ['size']>1000000){
		    print "Votre Image est plus large";
		  }
		  else{
		    if($tp!="jpg" && $tp!="JPG" && $tp!="jpeg" && $tp!="JPEG" && $tp!="heif" && $tp!="png"){
          ?>
		       <script>
      alert("Le format d'image n'est pas compatible" );
      window.location = "index.php?controller=agence&action=insertvoit";
    </script>
    <?php
		    }
		    else{
            
        $data=move_uploaded_file($_FILES['img']['tmp_name'],$pic);      
         ModelVoiture::setVoiture($_POST['marquev'], $_POST['descri'], $_POST['immatri'], $_POST['prixj'], $_POST['genre'], $pic);
          $pagetitle="Inserée Votre Voitures";
          $view = "insertvoit";
          require ("{$ROOT}{$DS}view{$DS}view.php");
          header("Location: index.php?controller=agence&success=ajoute");
          
        
      }
  }
}
     break; 

       case "readVoit":
         $pagetitle = "Liste de Votre Voitures";
        $view = "readVoit";
       	$voit = ModelVoiture::getAgenceVoit('ModelVoiture');
       	  if(isset($_POST['suppvoit'])){
	 	        	$pagetitle = "Liste de Votre Voitures";
                     $view = "readVoit";
              	ModelVoiture::supprimer_voiture($_REQUEST['id']);
              
            }
       
        require ("{$ROOT}{$DS}view{$DS}view.php");
        
	 	      
     
        break;

        case "annuler":
         $pagetitle = "Liste de Votre Voitures";
        $view = "readVoit";
       	ModelVoiture::annuler_op($_GET['id']);
        require ("{$ROOT}{$DS}view{$DS}view.php");
        break;

        case "accept":
         $pagetitle = "Liste de Votre Voitures";
        $view = "readVoit";
       	ModelVoiture::accept_op($_GET['id']);
        require ("{$ROOT}{$DS}view{$DS}view.php");
        break;

	 	
       

        case "ediit":
           if(isset($_REQUEST['accept_modif'])){
    	$mq=$_REQUEST['marqueupdt'];
    	$dsc=$_REQUEST['descriupdt'];
    	$imm=$_REQUEST['immatriupdt'];
    	$pr=$_REQUEST['prixjupdt'];
    	
         Model::modifier_voiture($_GET['id'], $mq, $dsc, $imm, $pr);
       }
        
	 	   $pagetitle = "Modifier Votre Voiture";
        $view = "modifVoiture";
        require ("{$ROOT}{$DS}view{$DS}view.php");
     
        break;


        case "sync": 
        Model::recuper_date($_GET['id']);
        $date_de_retour = new DateTime($_SESSION['date_ret']); 
        $date_pc_local = new DateTime(date("Y-m-d"));
        $interval = $date_de_retour->diff($date_pc_local); 

         if($interval->format('%a') > 0 ) {
        ?>
        <script>
			alert("Il ne reste plus que <?= $interval->format('%a') ?> jour(s) restant(s)" );
			window.location = "index.php?controller=agence&action=readVoit";
		</script>
		<?php
    }
    else{
    	Model::update_voit_date($_GET['id']);
    ?>	
         <script>
			alert("Le Voiture Libre" );
			window.location = "index.php?controller=agence&action=readVoit";
		</script>
		<?php
   }
    break;

    case "info_client":

        Model::get_client_louer($_GET['id']);
        $pagetitle = "Détail Client Réserveé";
        $view = "detailclient";
        require ("{$ROOT}{$DS}view{$DS}view.php");
}                           
?>
      


