<?php
	require_once('vendor/autoload.php');

	$client = new GuzzleHttp\Client();

	$url = "http://localhost/project4/TaskService.php";

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
		
		$response = $client->request("POST", $url, 
				['form_params' => 
				['description' => 'Snuggle Pippin']]); 
		
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