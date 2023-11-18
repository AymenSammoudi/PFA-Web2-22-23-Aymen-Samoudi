<?php
require_once ("Model.php"); 

class ModelAdmin extends Model {
 
   private $mailuid;
   private $password;
   private $username;
   private $nom;
   private $prenom;
   private $email;
   private $tel;
   private $pwd;
   private $pwdrepeat;

  public function __construct() {
    $num=func_num_args();
  
    switch($num)
     {
      case 2:
         //2 paramètre passé pour le connexion
         $this->mailuid=func_get_arg(0);
         $this->password=func_get_arg(0);
         break;
      case 7:
         //7 paramètres passés pour le registre
         $this->username=func_get_arg(0);
         $this->nom=func_get_arg(1);
         $this->prenom=func_get_arg(2);
         $this->email=func_get_arg(3);
         $this->tel=func_get_arg(4);
         $this->pwd=func_get_arg(5);
         $this->pwdrepeat=func_get_arg(6);
         break;
     
   }

}

    public function getMailuid() {
       return $this->mailuid;  
  }
  public function getPass() {
       return $this->password;  
  }

  public function getPseudo() {
       return $this->username;  
  }
   public function getNom() {
       return $this->prenom;  
  }
   public function getPrenom() {
       return $this->prenom;  
  }
   public function getEmail() {
       return $this->email;  
  }
  public function getTelephone() {
       return $this->tel;  
  }
  public function getPassword() {
       return $this->pwd;  
  }
}




