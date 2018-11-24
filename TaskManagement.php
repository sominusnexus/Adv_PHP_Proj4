<?php
  require_once('startsession.php');
  require_once('vendor/autoload.php');

  $client = new GuzzleHttp\Client();

  $url = "http://localhost/project4/TaskService.php";

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

    <title>Task Management</title>
    <link rel="stylesheet" type="text/css" href="proj4.css" />
  </head>
  <body>
    <div class="container">
      <div class="centerMe">
        <br/>
        <h1>Task Management</h1>
        <br/>
        <?php
        echo "<h6 class='centerMe'>Logged in as: " . $_SESSION['username'] . "</h6>";
        echo "<h6 class='centerMe'><a href='Logout.php'>Log Out</a></h6>";
        ?>
         <br/>
         <h4>Create Task</h4>
        <div class="card mx-auto" style="width: 18rem;">
          <div class="card-body">
            <form action="ClientTaskService.php" method="POST">
              <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" id="description" name="description" aria-describedby="description">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

         </div>
</div>
      </div>
    </div>    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>