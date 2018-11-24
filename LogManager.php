<?php
	require_once('startsession.php');

	class LogManager {

		public function updateCreate() {
			// Database Technology, Server, DB name, username, password
			$db = new PDO("mysql:host=localhost;dbname=project_4", "root", "root");

			// Insert a new record
			$sql = "UPDATE Task_Stats SET `Create` = `Create` + 1 WHERE username = '$sess_name'";

			// PDO Exception handling
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			try
            {
                $query = $db->prepare($sql);
                $query->execute();
            }
            catch(Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }

		}
		
	}
?>