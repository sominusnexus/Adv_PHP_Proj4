<?php
	require_once('startsession.php');
	require_once('vendor/autoload.php');

	$client = new GuzzleHttp\Client();

	$url = "http://localhost/project4/UserService.php";

	echo "<h6 class='centerMe'>Logged in as: " . $_SESSION['username'] . "</h6>";

	$action = $_GET['action'];

	switch ($action) {
		
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

				echo "User Statistics: <br/>";
				echo "<pre>";
				echo "$response_body"; //This creates a JSON Object
				//print_r($decoded_body); // This returns a decoded JSON object that php can use
				echo "</pre>";
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

			break;

			default:
			echo "No Action specified";
			break;	
	}		
?>