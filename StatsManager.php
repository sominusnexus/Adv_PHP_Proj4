<?php
	require_once('startsession.php');

	class StatsManager {
        
        public $username;
        public $Create;
        public $Read;
        public $ReadAll;
        public $Update;
        public $Delete;
        
        // Magic get/set methods
		public function __get($ivar) {
			return $this->$ivar;
		} 

		public function __set($ivar, $value) {
			$this->$ivar = $value;
		}
		
		// Create Method
		public function create($username) {
		    
		    // Database Technology, Server, DB name, username, password
			$db = new PDO("mysql:host=localhost;dbname=project_4", "root", "root");

			// Insert a new record
			$sql = "INSERT INTO Task_Stats (`username`, `Create`, `Read`, `ReadAll`, `Update`, `Delete`) VALUES ($username, 0, 0, 0, 0, 0)";

			// PDO Exception handling
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			try
            {
                $query = $db->prepare($sql);
                $query->bindParam(':username', $username);
                $query->execute();
            }
            catch(Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }

            return $db->lastInsertId(); // returns the primary key  of this INSERT
		}
	}
?>