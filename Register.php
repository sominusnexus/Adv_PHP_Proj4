<?php
	require_once('startsession.php');
    require_once('UserManager.php');
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
    <title>Register</title>
  </head>

  <?php

    $show_form = true;

    if (isset($_POST['submit'])) {

        $show_form = false;

        $db = new PDO("mysql:host=localhost;dbname=project_4", "root", "root");

         // Get the username/pass data from the post
        $username = $_POST['username'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $hash = password_hash($password1, PASSWORD_DEFAULT);
        
        if (!empty($username) && !empty($password1) && !empty($password2) &&
            ($password1 == $password2)) {
    
            // Confirm username is not already in use 

        $db = new PDO("mysql:host=localhost;dbname=project_4", "root", "root"); 

        $sql = "SELECT * FROM Task_User WHERE username = '$username'";

        try
            {
                $query = $db->prepare($sql);
                $query->bindParam(':username', $username);
                $query->execute();
                $rows = $query->rowCount();
            }
            catch(Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }

        if ($rows == 0) {
            // username is unique and okay to add to DB

            $sql = "INSERT INTO Task_User (`username`, `user_pass`) VALUES (:username, :user_pass)";

            try
            {
                $query = $db->prepare($sql);
                $query->bindParam(':username', $username);
                $query->bindParam(':user_pass', $hash);
                $query->execute();
            }
            catch(Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }

            // Confirm success with the user
                echo "<br/><br/>";
                echo '<h2 class="centerMe">Your account has been created successfully!';
                echo "<br/>";
                echo '<hr />';
                echo '<br />';       

                echo "<div class='centerMe'>";
                echo "<a href='Login.php' class='btn btn-info' role='button'>Login</a>";
                echo "</div>";
        }  else {

            // Username already exists display error
            echo "<div class='centerMe'>";
            echo "<h2>Username already exists!  Please create a unique username!</h3>";
            echo "<h3>If you have an account, please visit the Login page.</h3>";
            echo "<br/>";
            echo "<a href='Login.php' class='btn btn-info' role='button'>Login</a> ";
            echo "<a href='Register.php' class='btn btn-primary' role='button'>Sign Up</a>";
            echo "</div>";
        } 

    }

    }    

  ?>



  <body>

    <?php if ($show_form) { ?>
    <br/>
            <h2 class="centerMe">Please enter a username and desired password to create an account.</h2>
    <div class="centerMe">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <fieldset>
            <legend class="center">Registration Info</legend>
            
            <label for="username">Username:</label>
            <input type="text" id="username" name="username"
                value ="<?php if(!empty($username)) echo $username; ?>" /><br />
            
            <label for="password1">Password:</label>
            <input type="password" id="password1" name="password1" /><br />
            
            <label for="password2">Confirm:</label>
            <input type="password" id="password2" name="password2" /><br />
        </fieldset>
        <br />
        <input type="submit" value="Sign Up!" name="submit" />
        <input type="reset" value="Clear" name="clear" />
    </form>  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
    <?php } ?>
</html>

	