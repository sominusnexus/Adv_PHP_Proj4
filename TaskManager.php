<?php
    require_once('ITaskManager.php');
    require_once('startsession.php');
    
    class TaskManager implements ITaskManager {
        
        public $id;
        public $description;
        public $created_by_user;
        
        // Magic get/set methods
		public function __get($ivar) {
			return $this->$ivar;
		} 

		public function __set($ivar, $value) {
			$this->$ivar = $value;
		}
		
		// Serialize
		public function __toString() {
			$format = "<hr/>Id: %s<br/>Description: %s<br/><hr/>";

			return sprintf($format, $this->__get('id'), $this->__get('description'), $this->__get('created_by_user'));
		}
		
		// Create Method
		public function create($description, $created_by_user) {
		    
		    // Database Technology, Server, DB name, username, password
			$db = new PDO("mysql:host=localhost;dbname=project_4", "root", "root");

			// Insert a new record
			$sql = "INSERT INTO Task (`id`, `description`, `created_by_user`) VALUES (:id, :description, :created_by_user)";

			// PDO Exception handling
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			try
            {
                $query = $db->prepare($sql);
                $query->bindParam(':id', $id);
                $query->bindParam(':description', $description);
                $query->bindParam(':created_by_user', $created_by_user);
                $query->execute();
            }
            catch(Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }

    
            return $db->lastInsertId(); // returns the primary key  of this INSERT
		}
		
		// Read All Tasks
		public function readAll() {
			// Database Technology, Server, DB name, username, password

            $retVal = null;

			$db = new PDO("mysql:host=localhost;dbname=project_4", "root", "root");

			// Read all records
			$sql = "SELECT * FROM Task";

			// PDO Exception handling
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			try
            {
                $query = $db->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_ASSOC);
                $retVal = json_encode($results, JSON_PRETTY_PRINT);
            }
            catch(Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }

            //foreach($results as $result) {
               // echo $result . '<br>';
           // }
            
            return $retVal;
		}
		
		// Deletes a record on given Id
		public function delete($id)
        {
            // Database tech & server & database name, user, password
            $db = new PDO("mysql:host=localhost;dbname=project_4", "root", "root");
            
            // Delete a record
            $sql = "DELETE FROM Task WHERE `id`=:id";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            try
            {
                $query = $db->prepare($sql);
                $query->bindParam(':id', $id);
                $query->execute();
                $rowsAffected = $query->rowCount();
            }
            catch(Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }
            
            return $rowsAffected; // Returns the number of rows deleted
        }
        
        // Update

		public function update($id, $description) {

			// update the record with provided id, name and email
			// Database tech & server & database name, user, password
            $db = new PDO("mysql:host=localhost;dbname=project_4", "root", "root");
            
            // Delete a record
            $sql = "UPDATE Task SET `description`=:description WHERE `id`=:id";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            try
            {
                $query = $db->prepare($sql);
                $query->bindParam(':id', $id);
                $query->bindParam(':description', $description);
                $query->execute();
                $rowsAffected = $query->rowCount();
            }
            catch(Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }
            
            return $rowsAffected; // Returns the number of rows updated
		}
		
		// Read Task by ID
		public function read($id) {
			// Database Technology, Server, DB name, username, password
			$db = new PDO("mysql:host=localhost;dbname=project_4", "root", "root");

			// Read all records
			$sql = "SELECT description FROM Task WHERE `id`=:id";

			// PDO Exception handling
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			try
            {
                $query = $db->prepare($sql);
                $query->bindParam(':id', $id);
                $query->execute();
                $results = $query->fetch(PDO::FETCH_ASSOC);
                $retVal = json_encode($results, JSON_PRETTY_PRINT);
            }
            catch(Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }
            
            if ($results == !null) {
            
            //foreach ($results as $result) {
              //  echo $result;
            //}
                return $retVal;
            
            } else {
                
                throw new Exception("Invalid ID Specified!");
            }
            
		}
    }
?>