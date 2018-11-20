<?php
	require_once('vendor/autoload.php');

	$client = new GuzzleHttp\Client();

	$url = "http://localhost/project4/TaskService.php";

	// Test Task Manager readAll by sending HTTP GET

	try  {

		$response = $client->request("GET", $url);
		$response_body = $response->getBody();
		$decoded_body = json_decode($response_body);

	}

	catch (RequestException $ex){

		echo "HTTP Request failed\n";
		echo "<pre>";
		print_r($ex->getRequest());

		if ($ex->hasResponse()) {
			echo $ex->getResponse();
		}

	} 

	echo "Task Service HTTP GET Response: <br/>";
	echo "<pre>";
	//echo "$response_body";
	print_r($decoded_body);
	echo "</pre>";

	// Test Task Manager Read by sending HTTP GET with id=2
	$id=7;

	try  {

		//$response = $client->request("GET", "$url?id=$id");
		$response = $client->request("GET", $url, ['query' => ['id' => $id]]);
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

	// Test Task Manager Create() by sending http POST 

	try  {

		$response = $client->request("POST", $url, 

			['form_params' => 

				['description' => 'Eat A Bag of Dicks'

				]
			]);
		



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

	echo "Task Service HTTP POST Response: with Example Task<br/>";
	echo "<pre>";
	echo "$response_body";
	//print_r($decoded_body);
	echo "</pre>";

	$id = 11;

	// Test TaskManager DELETE() buy sending HTTP DELETE with ID

	try  {

		$response = $client->request("DELETE", $url, 

			['form_params' => 

				['id' => $id

				]
			]);
		



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

	echo "Task Service HTTP DELETE Response: with id=$id:<br/>";
	echo "<pre>";
	echo "$response_body";
	//print_r($decoded_body);
	echo "</pre>";

	// Test TaskManager Update() but sending HTTP PUT with ID 10 and new 'clean' description

	try  {

		$id = 10;
		$description = 'Be Calm Please';

		$options = [

						'form_params' => 

						['id' => $id,

						 'description' => $description

						]
					];



		$response = $client->request("PUT", $url, $options);
		



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

	echo "Task Service HTTP PUT Response: with id=$id, description=$description:<br/>";
	echo "<pre>";
	echo "$response_body";
	//print_r($decoded_body);
	echo "</pre>";
?>