<?php
    
    class DAO {
    	
		private $user;
		private $pass;
		private $database;
		
		private $conn;
		private $stmt;
		
		function __construct ($user, $pass, $database) {
			$this->user = $user;
			$this->pass = $pass;
			$this->database = $database;	
			$this->connect();
		} 
		
		private function connect () {
			
			try {
				$this->conn = new PDO('mysql:host=localhost;dbname='.$this->database, $this->user, $this->pass);
			}
			catch (Exception $e) {
				throw new Exception("Erro ao conectar ao banco de dados", 1);
			}
			
		} // connect
		
		
		
    } // Data Access Object
    
?>