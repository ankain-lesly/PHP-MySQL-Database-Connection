<?php
namespace app\models;
include_once __DIR__."/config.php";

/**
 * @author Ankain Lesly <leeleslyank@gmail.com>
 * @package null;
 * @Contact: +237 670710480
 * 
 * >> Database Connection
 * >> PHP and MySQL
 */

class Database {
	
	// Initializing Variables  
	private String $DB_server   =  DB_SERVER; 
	private String $DB_user     =  DB_USER; 
	private String $DB_password =  DB_PASSWORD; 
	private String $DB_name     =  DB_NAME;

	private $conn;

	public function __construct()	{
		
		$connection = new \mysqli(
                  $this->DB_server, 
                  $this->DB_user, 
                  $this->DB_password, 
                  $this->DB_name);

		if(!$connection) {
			die(mysqli_connect_error()."Connection Failed");
		}
		
		$this->conn = $connection;
	}

	public function connect() {
		return $this->conn;
	}
}

// Creating Connection

// else {
//   echo "Database Connected Successfully. 😍";
// }