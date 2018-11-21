<?php
	 class UserManager {
        
        public $id;
        public $username;
        public $user_pass;
        
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

			return sprintf($format, $this->__get('id'), $this->__get('description'), $this->__get('user_pass'));
		}
		
		// Create Method
		public function create($username, $user_pass) {

			$hash = password_hash($user_pass, PASSWORD_DEFAULT);
		    
		    // Database Technology, Server, DB name, username, password
			$db = new PDO("mysql:host=localhost;dbname=project_4", "root", "root");

			// Insert a new record
			$sql = "INSERT INTO Task_User (`id`, `username`, `user_pass`) VALUES (:id, :username, :user_pass)";

			// PDO Exception handling
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			try
            {
                $query = $db->prepare($sql);
                $query->bindParam(':id', $id);
                $query->bindParam(':username', $username);
                $query->bindParam(':user_pass', $hash);
                $query->execute();
            }
            catch(Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }

            return $db->lastInsertId(); // returns the primary key  of this INSERT
		}

		// Delete Method
		public function delete($id)
        {
            // Database tech & server & database name, user, password
            $db = new PDO("mysql:host=localhost;dbname=project_4", "root", "root");
            
            // Delete a record
            $sql = "DELETE FROM Task_User WHERE `id`=:$id";
            
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
		
    }
?>
?>