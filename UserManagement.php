<?php
  require_once('startsession.php');
  require_once('vendor/autoload.php');

  $client = new GuzzleHttp\Client();

  $url = "http://localhost/project4/UserService.php";

  $username = $_SESSION['username'];

  if (!isset($_SESSION['username'])) {
      header('Location: Login.php', true, 301);
      exit();
  }	

?>  

  <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>User Management</title>
    <link rel="stylesheet" type="text/css" href="proj4.css" />
  </head>
  <body>
    <div class="container">
      <div class="centerMe">
        <br/>
        <h1>User Management</h1>
        <br/>
        <?php
        echo "<h6 class='centerMe'>Logged in as: " . $_SESSION['username'] . "</h6>";
        echo "<h6 class='centerMe'><a href='Logout.php'>Log Out</a></h6>";
        ?>
         <br/>
         <div class="centerMe">
        <br/>
         <br/>
         <h4>Read All</h4>
        <div class="card mx-auto" style="width: 18rem;">
          <div class="card-body">
            <form action="ClientUserService.php?action=read_all" method="POST">
              <div class="form-group">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

         </div>
</div>
	<br/>
	<a href='index.php' class='btn btn-outline-secondary btn-lg active' role='button'>Back</a>
      </div>
