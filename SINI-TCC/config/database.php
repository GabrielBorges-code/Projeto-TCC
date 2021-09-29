<?php
class Database {

	private static $dbName = 'sistema_investimento_tcc' ; 
	private static $dbHost = 'localhost';
	private static $dbUsername = 'root';
	private static $dbUserPassword = 'diproINSS'; //diproINSS
	// private static $dbUserPassword = ''; 
	
	private static $cont  = null;
	
	public function __construct() {
		exit('Init function is not allowed');
	}
	
	public static function connect() {
	   // One connection through whole application
       if ( null == self::$cont ) {

        try {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName.';charset=utf8', self::$dbUsername, self::$dbUserPassword);  
        }

        catch(PDOException $e) {
          die($e->getMessage());  
        }
       } 
       return self::$cont;
	}
	
	public static function disconnect() {
		self::$cont = null;
	}
}
?>
