<?php
	require_once('startsession.php');

	class LogManager {

		public function updateCreate($username) {

			// Database Technology, Server, DB name, username, password
			$db = new PDO("mysql:host=localhost;dbname=project_4", "root", "root");

			// Incriment the Create count
			$sql = "UPDATE Task_Stats SET `Create` = `Create` + 1 WHERE username = :username";

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

		}

		public function updateReadID($username) {

			// Database Technology, Server, DB name, username, password
			$db = new PDO("mysql:host=localhost;dbname=project_4", "root", "root");

			// Incriment the Create count
			$sql = "UPDATE Task_Stats SET `Read` = `Read` + 1 WHERE username = :username";

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
		}

		public function updateRead($username) {

			// Database Technology, Server, DB name, username, password
			$db = new PDO("mysql:host=localhost;dbname=project_4", "root", "root");

			// Incriment the Create count
			$sql = "UPDATE Task_Stats SET `ReadAll` = `ReadAll` + 1 WHERE username = :username";

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
		}

		public function updateUpdate($username) {
			
			// Database Technology, Server, DB name, username, password
			$db = new PDO("mysql:host=localhost;dbname=project_4", "root", "root");

			// Incriment the Create count
			$sql = "UPDATE Task_Stats SET `Update` = `Update` + 1 WHERE username = :username";

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
		}

		public function updateDelete($username) {
			
			// Database Technology, Server, DB name, username, password
			$db = new PDO("mysql:host=localhost;dbname=project_4", "root", "root");

			// Incriment the Create count
			$sql = "UPDATE Task_Stats SET `Delete` = `Delete` + 1 WHERE username = :username";

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
		}
	}
?>