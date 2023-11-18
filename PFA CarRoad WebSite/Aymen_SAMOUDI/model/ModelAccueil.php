<?php

require_once ("Model.php"); 
class ModelAccueil extends Model{


	public function __construct(){

	}
	 public function count_all_client() {
    Model::count_client();  
  }
   public function count_all_agence() {
     Model::count_agence();  
  }

   
}


  
  

?>

