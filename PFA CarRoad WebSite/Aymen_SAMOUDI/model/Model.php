<?php
require_once ("{$ROOT}{$DS}config{$DS}Conf.php"); 

class Model{
	  //Connection par la variable $pdo a la base de donnee
	private static $pdo;

	public static function Init(){
		$host = Conf::getHostname();
		$dbname = Conf::getDatabase();

    
		$login = Conf::getLogin();
		$pass = Conf::getPassword();
		try{
			self::$pdo = new PDO("mysql:host=$host;dbname=$dbname",$login,$pass);
		} catch(PDOException $e) {
				die ($e->getMessage()); 
		}
		
	}
/********************************************************************/
//Recupere tous les voiture par getAll(ModelVoiture'passe en parametre')
    public function getAll($obj){
    
    $var = [];
	  $sql="SELECT * FROM voitures ORDER BY statut";
    $stmt=Model::$pdo->prepare($sql);
    $stmt->execute();
    while($data=$stmt->fetch(PDO::FETCH_ASSOC))
    {
    	$var[]=new $obj($data);
    
    }

  return $var;
    $stmt->closeCursor();

}
/*-----------------------------------------------------------------------*/
/*Recupere une seul voiture--------------------------------------------------*/
public function getVoiture($id){
    
  $sql="SELECT * FROM voitures WHERE id_voiture='".$id."'";
    $stmt=Model::$pdo->prepare($sql);
    $stmt->execute([$id]);

    $results=$stmt->fetchAll();
    return $results;
}
/////////////////////////////////////////////////////////////////////////////
/*----------------Cree une voiture------------------------------------------*/
public function setVoiture($marquename, $descripvoit, $matri, $prix, $genre, $imgs){
 
  $sql="INSERT INTO voitures(marque, description, immat, prix_parj, genre,img, statut, id_agence_voit) VALUES(?, ?, ?, ?, ?, ?, 'Libre', '".$_SESSION['agenceId']."')";
    $stmt=Model::$pdo->prepare($sql);
    $stmt->execute([$marquename, $descripvoit, $matri, $prix, $genre, $imgs]);
    }
/////////////////////////////////////////////////////////////////////////////

//Affiche les voitures d'un acgence :)//////////////////////////
public function getAgenceVoit($obj){
    
    $var = [];
    $sql="SELECT * FROM voitures WHERE id_agence_voit = '".$_SESSION['agenceId']."'";
    $stmt=Model::$pdo->prepare($sql);
    $stmt->execute();
    while($data=$stmt->fetch(PDO::FETCH_ASSOC))
    {
        $var[]=new $obj($data);
    
    }

    return $var;
    $stmt->closeCursor();

}
/****************************Registre Agence********************************/
 public function registre_agence($username, $nom, $email, $tel, $address, $pwd){
    
    $sql = 'SELECT pseudo_ag,mail_ag FROM agence WHERE pseudo_ag=:unameag';
  
     $stmt = Model::$pdo->prepare($sql);
     if(!$stmt){
      header("Location: index.php?error=sqlerror");
         exit();
  }
  else{
    $stmt->bindParam(':unameag',$username,PDO::PARAM_STR);
         $stmt->execute();
       
      
        $resultCheck=$stmt->rowCount();
        if($resultCheck>0){
          header("Location: index.php?error=usertaken&mail=".$email);
                exit();
        }
    else{
      $sql= "INSERT INTO agence (pseudo_ag, nom_agence, mail_ag, tel_ag,adress_agence, dmd, pwd_ag, id_admin_ag) VALUES (:unameag, :nomag, :mailag, :telag, :addressag, 'En attent', :pwdag, '".$_SESSION['idAdmin']."')";
          $stmt=Model::$pdo->prepare($sql);
      if(!$stmt){
        header("Location: index.php?error=sqlerror");
            exit();
      }
      else{
        $hashedpwd=md5($pwd);
          $stmt->bindParam(':unameag',$username,PDO::PARAM_STR);
           $stmt->bindParam(':nomag',$nom,PDO::PARAM_STR);
           $stmt->bindParam(':mailag',$email,PDO::PARAM_STR);
           $stmt->bindParam(':telag',$tel,PDO::PARAM_STR);
           $stmt->bindParam(':addressag',$address,PDO::PARAM_STR);
           $stmt->bindParam(':pwdag',$hashedpwd,PDO::PARAM_STR);
           $stmt->execute();
            header("Location: index.php?signup=success");
                exit();
      }
    }
  }

$stmt->close();
}
 
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  public function login_agence($mailuid, $password){
      
      $sql = 'SELECT * FROM agence WHERE pseudo_ag=? OR mail_ag=?';
       $stmt=Model::$pdo->prepare($sql);
  
  if(!$stmt){
      header("Location: index.php?error=sqlerrorrrrr");
      exit();
  }
    else{
        $stmt->bindParam(1, $mailuid, PDO::PARAM_STR);
        $stmt->bindParam(2, $mailuid, PDO::PARAM_STR);
        $stmt->execute();
    if($row=$stmt->fetch(PDO::FETCH_ASSOC)){
         $pwdCheck=md5($password);
         $pwd_base=$row['pwd_ag'];
         $pwdverif = strcmp($pwd_base, $pwdCheck);
        if($row['dmd']=='En attent'){
          header("Location: index.php?error=votre_compte_en_attent");
          exit();
        }
        else if($row['dmd']=='Refuser')  {
          header("Location: index.php?error=votre_compte_refuser");
          exit();
        }
       else if($pwdverif != 0){
         header("Location: index.php?error=wrongpwd");
         exit();
         }
         else if($pwdverif==0){
          session_start();
          $_SESSION['agenceId']=$row['id_agence'];
          $_SESSION['agenceUid']=$row['pseudo_ag'];
          header("Location: index.php?login=success");
         exit();
         }
         else{
         header("Location: index.php?error=wrongpwd");
         exit();
         }
    }
    else{
      header("Location: index.php?error=no_user");
            exit();
    }
  }
  }


//****************************Login Agence ********************************************/

//-----------------------------------------------------------------------/
    public function check_statut_voiture($idd){

      $sql="SELECT statut_op FROM contrat WHERE id_voiture = '".$idd."' ";
            $result = Model::$pdo->query($sql) or die(Model::$pdo->error());
             while($row = $result->fetch())
              {   
                $_SESSION['stat'] = $row['statut_op'];
              }
    }
/*********************Annule l'operation de ce client*/
    public function annuler_op($idget){
      $sql="UPDATE voitures SET statut='Libre' WHERE id_voiture='".$idget."'";
      Model::$pdo->query($sql)or die(Model::$pdo->error());
     ?>
        <script>
        alert("L'operation à ete annuler" );
        window.location = "index.php?controller=agence&action=readVoit";
       </script>

   <?php
        $sql="UPDATE contrat SET statut_op='Annuler' WHERE statut_op='En attent' AND id_voiture='".$idget."'";
      Model::$pdo->query($sql)or die(Model::$pdo->error());
    }
/*********************Accepte l'operation de ce client*/
    public function accept_op($idget){
      $sql="UPDATE contrat SET statut_op='Accepter' WHERE statut_op='En attent' AND id_voiture='".$idget."'";
      Model::$pdo->query($sql)or die(Model::$pdo->error());
      ?>
        <script>
      alert("L'operation à ete accepter" );
      window.location = "index.php?controller=agence&action=readVoit";
    </script>
    <?php
    }

 //Supprimer le voiture///
   public function supprimer_voiture($idget){
    $sql="DELETE FROM voitures WHERE id_voiture= '".$idget."'";
      $stmt = Model::$pdo->prepare($sql); 
        $stmt->execute();
        echo '<script>alert("Le Voiture a éte supprimer !") </script>';

          echo '<script>window.location="index.php?controller=agence&action=readVoit" </script>';
   }  

 //Modifier le voiture///
   public function modifier_voiture($idget, $mq, $dsc, $imm, $pr){
    $sql="UPDATE voitures SET marque='".$mq."', description='".$dsc."', immat='".$imm."', prix_parj='".$pr."' WHERE id_voiture= '".$idget."' ";
     $stmt=Model::$pdo->prepare($sql);
      $stmt->execute();
        echo '<script>alert("Le Voiture a éte Modifier !") </script>';

          echo '<script>window.location="index.php?controller=agence&action=readVoit" </script>';

   }   
   /************************************************************/
 // Recuper les donnee dans les champs 'input' modifie voiture////
   public function recuper_donnee($idget){
    $sql = 'SELECT id_voiture, marque, description, prix_parj, immat FROM voitures WHERE id_voiture = '.$idget. '';
    $result = Model::$pdo->query($sql) or die(Model::$pdo->error());
              while($row = $result->fetch())
              {   
               $_SESSION['ids']= $row['id_voiture'];
               $_SESSION['maq'] = $row['marque'];
               $_SESSION['dssc'] = $row['description'];
               $_SESSION['prp'] = $row['prix_parj'];
               $_SESSION['immai'] = $row['immat'];
              }  
   }

 // J'ai recupere le date de retour pour verifie le duree    
  public function recuper_date($idret){
    $sql="SELECT date_ret FROM reservation as R,contrat as C, voitures as V WHERE R.id_reser = C.id_reser AND V.id_voiture = C.id_voiture AND V.id_voiture = '".$idret."'";
     $result = Model::$pdo->query($sql) or die(Model::$pdo->error());
      while($row = $result->fetch())
              {   
                $_SESSION['date_ret'] = $row['date_ret'];
              }
  }
 //-----------------------si le date est attend le statut voiture modifier en libre
  public function update_voit_date($idret){
     $sql="UPDATE voitures SET statut = 'Libre' WHERE id_voiture = '".$idret."'";
      Model::$pdo->query($sql)or die(Model::$pdo->error());
  }


/*************************REGISTRE CLIENT**************************************/

   public function Registre($username, $nom, $prenom, $email, $tel, $pwd){
       	$sql = 'SELECT pseudo_c,email_c FROM client WHERE pseudo_c=:uname';
      $stmt=Model::$pdo->prepare($sql);

    
    	if(!$stmt){
    		header("Location: index.php?error=sqlerror");
            exit();
    	}
    	else{
   
    		 $stmt->bindParam(':uname',$username,PDO::PARAM_STR);
         $stmt->execute();
       
    	
    		$resultCheck=$stmt->rowCount();
    		if($resultCheck>0){
    			header("Location: index.php?error=usertaken&mail=".$email);
                exit();
    		}
    		else{
    			$sql= 'INSERT INTO client (pseudo_c, nom_c, prenom_c, email_c, numtel_c, pwd, id_admin_cl) VALUES (:uname, :nom, :prenom, :email, :tel, :pwd, '.$_SESSION['idAdmin'].')';
    		  $stmt=Model::$pdo->prepare($sql);
    			if(!$stmt){
    		    header("Location: index.php?error=sqlerror");
                exit();
    	    }
    	    else{
    	    	$hashedpwd=md5($pwd);
    	   
           $stmt->bindParam(':uname',$username,PDO::PARAM_STR);
           $stmt->bindParam(':nom',$nom,PDO::PARAM_STR);
           $stmt->bindParam(':prenom',$prenom,PDO::PARAM_STR);
           $stmt->bindParam(':email',$email,PDO::PARAM_STR);
           $stmt->bindParam(':tel',$tel,PDO::PARAM_STR);
           $stmt->bindParam(':pwd',$hashedpwd,PDO::PARAM_STR);
           
           $stmt->execute();
    		    header("Location: index.php?signup=success");
                exit();
    	    }
    		}
    	}
    	$stmt->close();
}
                
       
  //----------------------------LOGIN CLIENT---------------------------------------/
     public function Login($mailuid, $password){

      $sql = "SELECT * FROM client WHERE pseudo_c=? OR email_c=?";
      $stmt=Model::$pdo->prepare($sql);

  if(!$stmt){
      header("Location: index.php?error=sqlerror");
      exit();
  }
  else{
    
    $stmt->bindParam(1, $mailuid, PDO::PARAM_STR);
    $stmt->bindParam(2, $mailuid, PDO::PARAM_STR);
    $stmt->execute();
    
    if($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        
         $pwdCheck=md5($password);
         $pwd_base=$row['pwd'];
         $pwdverif = strcmp($pwd_base, $pwdCheck);
       
         if($pwdverif!=0){
         header("Location: index.php?error=mot_de_passe_incorrect");
         exit();
         }
         else if($pwdverif==0){
          session_start();
          $_SESSION['clientId']=$row['id_client'];
          $_SESSION['clientUid']=$row['pseudo_c'];
          $_SESSION['clientNom']=$row['nom_c'];
          $_SESSION['clientPrenom']=$row['prenom_c'];
          $_SESSION['clientEmail']=$row['email_c'];
          $_SESSION['telephonecl']=$row['numtel_c'];
          header("Location: index.php?login=success");
         exit();
         }
         else{
         header("Location: index.php?error=mot_de_passe_incorrect");
         exit();
         }
    }
    else{
      header("Location: index.php?error=no_user");
      exit();
    }
  }
     }

 //-------------------------------------------------------------------------------/
     /*************Ce traitement ce faire dans le réservation///////////////////*/
    public function insert_loyer() {
    	foreach($_SESSION['cart'] as $id => $value) {
    		             date_default_timezone_set('Europe/Paris');
                     $d = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
                     $date_ret=strftime('%Y-%m-%d', strtotime('+ '.$value['nbjour'] .' days', $d));

	     $sql = "INSERT INTO reservation(date_de_depart, nbjour, id_client)values('".$value['datedep']."', '".$value['nbjour']."', '".$_SESSION['clientId']."')"; 
             Model::$pdo->query($sql)or die(Model::$pdo->error());

       $sql = "UPDATE voitures SET statut = 'Occupee' WHERE id_voiture='".$value['id_voit']."'";
         Model::$pdo->query($sql)or die(Model::$pdo->error());    

        $sql="SELECT marque FROM voitures WHERE id_voiture='".$value['id_voit']."'";
          $result = Model::$pdo->query($sql) or die(Model::$pdo->error());
            while($row = $result->fetch())
              {   
                $_SESSION['voitmarq'] = $row['marque'];
              }   

         $sql="SELECT id_reser FROM reservation, voitures WHERE id_client='".$_SESSION['clientId']."' AND id_voiture='".$value['id_voit']."'";
          $result = Model::$pdo->query($sql) or die(Model::$pdo->error());
            while($row = $result->fetch())
              {   
                $_SESSION['id_reser'] = $row['id_reser'];
              }                

         $sql = "INSERT INTO contrat(date_ret, total_prix, statut_op, id_reser, id_voiture)VALUES('".$date_ret."', '".$value['nbjour'] * $value['prix']."', 'En attent', '".$_SESSION['id_reser']."', '".$value['id_voit']."')";
           Model::$pdo->query($sql)or die(Model::$pdo->error());       

         }
         echo '<script type="text/javascript">
            alert("Ajouté avec succès.");
            window.location = "index.php?controller=client&action=list_reser";
            </script>';
  	}
            

  public function info_reservation(){
  	$query = "SELECT id_contrat, date_de_depart, date_ret, marque, total_prix, statut_op FROM contrat as C, reservation as R, voitures as V WHERE C.id_voiture = V.id_voiture AND C.id_reser = R.id_reser AND R.id_client = '".$_SESSION['clientId']."'";
    $result =Model::$pdo->query($query) or die (Model::$pdo->error());
 
                  
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['id_contrat'].'</td>';
                            echo '<td>'. $row['date_de_depart'].'</td>';                     
                            echo '<td>'. $row['date_ret'].'</td>';
                            echo '<td>'. $row['marque'].'</td>';
                            echo '<td>'. $row['total_prix'].' DT</td>';
                            echo '<td>'. $row['statut_op'].'</td>';
                         
                            //echo '<td>  ';
                            //echo '<center> <a class="btn btn-info" title="View list Of Ordered" href="orderdetail.php?id='. $row['id_contrat'].'">View detail</a> </center></td>';
                            echo '</tr> ';
                        }
           
  }

  // Recuperé la date de retour d'une voiture
  public function temp_de_retour_voiture($id){
  	$query = "SELECT date_ret FROM contrat WHERE id_voiture ='".$id."'";
    $result = Model::$pdo->query($query);
    return $result;
  }

  //    RECUPERE LES DONNEE CLIENTS AYANT RESERVE UNE VOITURE
  public function get_client_louer($idget){
    $sql='SELECT nom_c, prenom_c, email_c, numtel_c, marque, nbjour FROM client as CL,contrat as C, reservation as R, voitures as V WHERE CL.id_client = R.id_client AND C.id_reser = R.id_reser AND V.id_voiture = C.id_voiture AND C.id_voiture = '.$idget.'';
    $result = Model::$pdo->query($sql) or die(Model::$pdo->error());
 
    while($row = $result->fetch())
              {   
                $_SESSION['nom_trans'] = $row['nom_c'];
                $_SESSION['prenom_trans'] = $row['prenom_c'];
                $_SESSION['email_trans'] = $row['email_c'];
                $_SESSION['numtel_trans'] = $row['numtel_c'];
                $_SESSION['marque_det']=$row['marque'];
                $_SESSION['nbjour_trans']=$row['nbjour'];
              }
  } 
// COUNT LES CLIENTS DISPONIBLE ET AFFICHEE DANS L'ACCUEIL
  public function count_client(){
    if ($results = Model::$pdo->query('SELECT * FROM client')) {
     $cclient=$results->rowCount();
      return $cclient;
     $results->close();
   }
}

// COUNT LES AGENCES DISPONIBLE ET AFFICHEE DANS L'ACCUEIL
  public function count_agence(){
    if ($results = Model::$pdo->query('SELECT * FROM agence')) {
    $cagence=$results->rowCount();
    return $cagence;
     $results->close();
   }
  }

/************************************************/

public function login_admin($mailuid, $password){
      
      $sql = 'SELECT * FROM admin WHERE uidUsers=? OR emailUsers=?';
       $stmt=Model::$pdo->prepare($sql);
  
  if(!$stmt){
      header("Location: index.php?controller=admin&error=sqlerrorrrrr");
      exit();
  }
    else{
        $stmt->bindParam(1, $mailuid, PDO::PARAM_STR);
        $stmt->bindParam(2, $mailuid, PDO::PARAM_STR);
        $stmt->execute();
    if($row=$stmt->fetch(PDO::FETCH_ASSOC)){
         $pwdCheck=md5($password);
         $pwd_base=$row['pwdUsers'];
         $pwdverif = strcmp($pwd_base, $pwdCheck);
         if($pwdverif != 0){
         header("Location: index.php?controller=admin&error=wrongpwd");
         exit();
         }
         else if($pwdverif==0){
          session_start();
          $_SESSION['idAdmin']=$row['idUsers'];
          $_SESSION['pseuAdmin']=$row['uidUsers'];
          header("Location: index.php?controller=admin&action=clients");
         exit();
         }
         else{
         header("Location: index.php?controller=admin&error=wrongpwd");
         exit();
         }
    }
    else{
      header("Location: index.php?controller=admin&error=no_user");
            exit();
    }
  }
  }

// Afficher tous les clients dans partie admin
 public function affich_list_client($idadmin){
     $sql = "SELECT * FROM client WHERE id_admin_cl = '".$idadmin."'";
       $result =Model::$pdo->query($sql) or die (Model::$pdo->error());
          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['id_client'].'</td>';
                            echo '<td>'. $row['pseudo_c'].'</td>';                     
                            echo '<td>'. $row['nom_c'].'</td>';
                            echo '<td>'. $row['prenom_c'].'</td>';
                            echo '<td>'. $row['email_c'].'</td>';
                            echo '<td>'. $row['numtel_c'].'</td>';
                            echo '</tr> ';
                }
            }
  public function affich_list_agences($idadmin){
     $sql = "SELECT * FROM agence WHERE id_admin_ag = '".$idadmin."'";
       $result =Model::$pdo->query($sql) or die (Model::$pdo->error());
          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                             
                            echo '<tr>';
                              echo '<td>'. $row['id_agence'].'</td>';
                              echo '<td>'. $row['pseudo_ag'].'</td>';                     
                              echo '<td>'. $row['nom_agence'].'</td>';
                              echo '<td>'. $row['mail_ag'].'</td>';
                              echo '<td>'. $row['tel_ag'].'</td>';
                              echo '<td>'. $row['adress_agence'].'</td>';
                              echo '<td>'. $row['dmd'].'</td>';

                              if($row['dmd']=='En attent'){
                              echo '<td>';
                                  echo ' <a class="btn btn-info btn-sm" title="Accepter ce agence" href="index.php?controller=admin&action=accepte_agence&id='.$row['id_agence'].'" onclick="return confirm(\'Vous avez accepter\')">Accepter</a>';
                                  echo '<a class="btn btn-danger btn-sm" title="Refuser ce agence" href="index.php?controller=admin&action=refuser_agence&id='.$row['id_agence'].'" onclick="return confirm(\'Vous avez refuser\')">Refuser</a>';
                              echo '</td>';
                            }
                            echo '</tr> ';
                }
            }
  public function accepte_agence($idag){
    $sql="UPDATE agence SET dmd='Accepter' WHERE dmd='En attent' AND id_agence='".$idag."'";
      Model::$pdo->query($sql)or die(Model::$pdo->error());
      ?>
        <script>
      alert("L'agence à ete accepter" );
      window.location = "index.php?controller=admin&action=agences";
    </script>
    <?php
  } 

  public function refuser_agence($idag){
    $sql="UPDATE agence SET dmd='Refuser' WHERE dmd='En attent' AND id_agence='".$idag."'";
      Model::$pdo->query($sql)or die(Model::$pdo->error());
      ?>
        <script>
      alert("L'agence à ete Refuser" );
      window.location = "index.php?controller=admin&action=agences";
    </script>
    <?php
  }

  public function affich_list_reservation_accepter(){
     $sql = "SELECT nom_c, prenom_c, email_c, numtel_c, date_de_depart, date_ret, marque, total_prix  FROM contrat as C, client as CL, reservation as R, voitures as V WHERE CL.id_client = R.id_client AND C.id_reser = R.id_reser AND C.id_voiture = V.id_voiture AND C.statut_op = 'Accepter'";
       $result =Model::$pdo->query($sql) or die (Model::$pdo->error());
          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['nom_c'].' '.$row['prenom_c'].'</td>';
                            echo '<td>'. $row['email_c'].'</td>';                     
                            echo '<td>'. $row['numtel_c'].'</td>';
                            echo '<td>'. $row['date_de_depart'].'</td>';
                            echo '<td>'. $row['date_ret'].'</td>';
                            echo '<td>'. $row['marque'].'</td>';
                            echo '<td>'. $row['total_prix'].' DT</td>';
                            echo '</tr> ';
                }
            }

	
}//class
Model::Init();