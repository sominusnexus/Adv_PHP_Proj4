<?php
	require_once('startsession.php');
	require_once('vendor/autoload.php');

	$client = new GuzzleHttp\Client();

	$url = "http://localhost/project4/TaskService.php";

	echo "<h6 class='centerMe'>Logged in as: " . $_SESSION['username'] . "</h6>";

	$action = $_GET['action'];

	switch ($action) {
		case 'create_task':
			
			// Task Manager Create with POST

				try  {
					
					$description = $_POST['description'];
					$created_by_user = $_SESSION['username'];

					$response = $client->request("POST", $url, 
							['form_params' => 
								[ 'description' => $description,
							 	  'created_by_user' => $created_by_user
								] 
							]); 
					
					// POST requires using form params
					$response_body = $response->getBody();
				}

				catch (RequestException $ex) {
					echo "HTTP Request Failed\n";
					echo "<pre>";
					print_r($ex->getRequest());

					if ($ex->hasResponse()) {
						echo $ex->getResponse();
					}
				}

				echo "Task Service POST Response with Specified Data: <br/>";
				echo "<pre>";
				echo "$response_body"; //This creates a JSON Object
				//print_r($decoded_body); // This returns a decoded JSON object that php can use
				echo "</pre>";
				echo "<a href='TaskManagement.php' class='btn btn-outline-secondary btn-lg active' role='button'>Back to Tasks</a>";


			break;

		case 'read_all':

				// Task Manager ReadAll with GET
				$username = $_SESSION['username'];
				
				try  {
			        $response = $client->request("GET", $url, ['query' => ['username' => $username]]);
					$response_body = $response->getBody();
					$decoded_body = json_decode($response_body);

				}

				catch (RequestException $ex) {
					echo "HTTP Request Failed\n";
					echo "<pre>";
					print_r($ex->getRequest());

					if ($ex->hasResponse()) {
						echo $ex->getResponse();
					}
				}

				echo "Task Service GET Response: <br/>";
				echo "<pre>";
				//echo "$response_body"; //This creates a JSON Object
				print_r($decoded_body); // This returns a decoded JSON object that php can use
				echo "</pre>";
				echo "<a href='TaskManagement.php' class='btn btn-outline-secondary btn-lg active' role='button'>Back to Tasks</a>";
		break;

		case 'read_by_id':
			
			//Task Manager Read by sending HTTP GET 
			$id = $_POST['id'];
			$username = $_SESSION['username'];

			try  {

				//$response = $client->request("GET", "$url?id=$id");
				$response = $client->request("GET", $url, ['query' => ['id' => $id,
					'username' => $username]]);
				$response_body = $response->getBody();
				

			}

			catch (RequestException $ex){

				echo "HTTP Request failed\n";
				echo "<pre>";
				print_r($ex->getRequest());

				if ($ex->hasResponse()) {
					echo $ex->getResponse();
				}

			} 

			echo "Task Service HTTP GET Response: with id=$id:<br/>";
			echo "<pre>";
			echo "$response_body";
			//print_r($decoded_body);
			echo "</pre>";
			echo "<a href='TaskManagement.php' class='btn btn-outline-secondary btn-lg active' role='button'>Back to Tasks</a>";

			break;	

		case 'delete':
				
			//Task Manager DELETE with provided ID

				$id = $_POST['id'];
				$username = $_SESSION['username'];

				try  {
					
					$response = $client->request("DELETE", $url, 
							['form_params' => 
								[
									'id' => $id,
									'username' => $username
								]
							]); 
					
					// POST requires using form params
					$response_body = $response->getBody();
				}

				catch (RequestException $ex) {
					echo "HTTP Request Failed\n";
					echo "<pre>";
					print_r($ex->getRequest());

					if ($ex->hasResponse()) {
						echo $ex->getResponse();
					}
				}

				echo "Task Service DELETE Response with Specified ID: <br/>";
				echo "<pre>";
				echo "$response_body"; //This creates a JSON Object
				//print_r($decoded_body); // This returns a decoded JSON object that php can use
				echo "</pre>";
				echo "<a href='TaskManagement.php' class='btn btn-outline-secondary btn-lg active' role='button'>Back to Tasks</a>";


		break;	

		case 'update':

			//Task Manager UPDATE with PUT and ID and Description Provided

				try  {
					
				$id = $_POST['id'];
				$description = $_POST['description'];
				$username = $_SESSION['username'];

					$response = $client->request("PUT", $url, 
							['form_params' => 
								[ 'id' => $id,
							 	  'description' => $description,
							 	  'username' => $username
							 	]  
							]); 
					
					// POST requires using form params
					$response_body = $response->getBody();
				}

				catch (RequestException $ex) {
					echo "HTTP Request Failed\n";
					echo "<pre>";
					print_r($ex->getRequest());

					if ($ex->hasResponse()) {
						echo $ex->getResponse();
					}
				}

				echo "Task Service PUT Response with Specified ID and Description: <br/>";
				echo "<pre>";
				echo "$response_body"; //This creates a JSON Object
				//print_r($decoded_body); // This returns a decoded JSON object that php can use
				echo "</pre>";
				echo "<a href='TaskManagement.php' class='btn btn-outline-secondary btn-lg active' role='button'>Back to Tasks</a>";

		break;

		default:
			echo "No Action specified";
			break;
	}

	// TESTING TESTING

?>