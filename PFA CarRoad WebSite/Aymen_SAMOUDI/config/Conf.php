<?php
class Conf {
  static private $debug = True;
  static private $databases = array(
    'hostname' => 'localhost',
    'database' => 'id18857899_agence_de_loyer_auto',
    'login' => 'id18857899_root',
    'password' => 'MxEGD|*H1~w\85xh'
  );
  
  static public function getLogin() {
    return self::$databases['login'];
  }
  
  static public function getHostname(){
	  return self::$databases['hostname'];
  }
  
  static public function getDatabase(){
	  return self::$databases['database'];
  }

  static public function getPassword(){
	  return self::$databases['password'];
  }
  
  static public function getDebug() {
      return self::$debug;
  }

  
}
?>
