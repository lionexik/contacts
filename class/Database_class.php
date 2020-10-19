<?php

/**
 * Class for connection to database
 */
class DatabaseConnection {

	public $connection = null;


	/**
	  * Connection to database
	  */
	public function __construct() {
	    $servername = "servername";
	    $dbusername = "dbusername";
	    $dbpassword = "dbpassword";
	    $dbname = "dbname";

	    $this->connection = new mysqli($servername, $dbusername, $dbpassword, $dbname);


	    if ($mysqli->connect_error) {
	        die("Cannt connect to database: " . $mysqli->connect_error);
	    }
    }


    /**
	  * Disconnection from database
	  */
	public function disconnect() {
	    $this->$connection->close(); 
	}
  

} 