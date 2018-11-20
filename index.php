<?php
  require_once('startsession.php');

  if (!isset($_SESSION['username'])) {
      header('Location: NoLogin.php', true, 301);
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
    <link rel="stylesheet" type="text/css" href="proj4.css">
    <title>Project 4</title>
  </head>
  <body>
      <br/>
    <h1 class="centerMe">Project 4 PDO/REST Task Service</h1>
    <br/>
    <?php 
          if (isset($_SESSION['username'])) {
            echo "<h5 class='centerMe'>Logged in as: " . $_SESSION['username'] . "</h5>";
            echo "<h6 class='centerMe'><a href='Logout.php'>Log Out</a></h6>";
          }
    ?>      
    <br/>    
    <div class="container">
    <div class="row">
        <div class="col-sm">
    <div class="card mx-auto" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title centerMe">Create a Task</h5>
    <form action="TaskService.php" method="POST">
  <div class="form-group">
      <div class="centerMe">
    <label for="description">Task Description</label>
     </div>
    <input type="text" class="form-control" id="taskdesc" name="taskdesc" aria-describedby="description">
  </div>
   <div class="centerMe">
  <button class="btn btn-outline-primary" role="button" aria-pressed="true">Enter Task</button>
   </div>
</form>
  </div>
</div>
 </div>
   <br/>
   <br/>
     <div class="col-sm">
    <div class="card mx-auto" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title centerMe">Retrieve Task by Id</h5>
    <form action="Read.php" method="POST">
  <div class="form-group">
      <div class="centerMe">
    <label for="description">Enter Task Id</label>
     </div>
    <input type="text" class="form-control" id="id" name="id" aria-describedby="description">
  </div>
   <div class="centerMe">
  <button class="btn btn-outline-success" role="button" aria-pressed="true">Enter Id</button>
   </div>
</form>
  </div>
</div>
 </div>
 </div>
  <br/>
  <br/>
       <div class="row">
        <div class="col-sm">
    <div class="card mx-auto" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title centerMe">Update Task by Id</h5>
    <form action="Update.php" method="POST">
  <div class="form-group">
      <div class="centerMe">
    <label for="description">Enter Id</label>
     </div>
    <input type="text" class="form-control" id="id" name="id" aria-describedby="description">
    <br/>
     <div class="centerMe">
    <label for="description">Enter new Description</label>
     <input type="text" class="form-control" id="description" name="description" aria-describedby="description">
     </div>
  </div>
   <div class="centerMe">
  <button class="btn btn-outline-warning" role="button" aria-pressed="true">Update Task</button>
   </div>
</form>
  </div>
</div>
 </div>
   <br/>
   <br/>
     <div class="col-sm">
    <div class="card mx-auto" style="width: 18rem;">
  <div class="card-body">
     <h5 class="card-title centerMe">Delete a Task</h5>
    <form action="Delete.php" method="POST">
  <div class="form-group">
      <div class="centerMe">
    <label for="description">Enter Task Id</label>
     </div>
    <input type="text" class="form-control" id="delete" name="delete" aria-describedby="description">
  </div>
   <div class="centerMe">
  <button class="btn btn-outline-danger" role="button" aria-pressed="true">Delete Task</button>
   </div>
</form>
  </div>
</div>
 </div>
 </div>
  <br/><br/>
   <div class="card mx-auto" style="width: 18rem;">
  <div class="card-body">
     <h5 class="card-title centerMe">Retrieve All Tasks</h5>
    <form action="ReadAll.php" method="POST">
        <br/>
  <div class="form-group">
      <div class="centerMe">
  </div>
   <div class="centerMe">
  <button class="btn btn-outline-info" role="button" aria-pressed="true">Get Tasks</button>
   </div>
</form>
  </div>
</div>
</div>
 <br/><br/>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>