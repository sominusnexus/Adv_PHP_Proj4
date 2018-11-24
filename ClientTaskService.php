<?php
	require_once('startsession.php');
	require_once('vendor/autoload.php');

	$client = new GuzzleHttp\Client();

	$url = "http://localhost/project4/TaskService.php";

	echo "<h6 class='centerMe'>Logged in as: " . $_SESSION['username'] . "</h6>";

	// Test Task Manager ReadAll with GET

	try  {
		$response = $client->request("GET", $url);
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
	//echo "$response_body"; This creates a JSON Object
	print_r($decoded_body); // This returns a decoded JSON object that php can use
	echo "</pre>";

	// Test Task Manager Read by ID 

	$id = 2;

	try  {
		//$response = $client->request("GET", "$url?id=$id");
		$response = $client->request("GET", $url, ['query' => ['id' => $id]]); // Different method for specifiying ID
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

	echo "Task Service GET Response with Specified ID: <br/>";
	echo "<pre>";
	echo "$response_body"; //This creates a JSON Object
	//print_r($decoded_body); // This returns a decoded JSON object that php can use
	echo "</pre>";

	// Test Task Manager Create with POST

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

	// Test Task Manager DELETE with provided ID

	$id = 18;

	try  {
		
		$response = $client->request("DELETE", $url, 
				['form_params' => 
				['id' => $id]]); 
		
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

	// Test Task Manager UPDATE with PUT and ID and Description Provided

	try  {
		
	$id = 19;
	$description = "BonerFart";	
		$response = $client->request("PUT", $url, 
				['form_params' => 
					[ 'id' => $id,
				 	  'description' => $description
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


?>