<?php
    require_once('startsession.php');
?>

    <!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> </script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="proj4.css" />
</head> 
<body>
<div class="container">

<?php   
    
    // Clear error message
    $error_msg = "";

    // If user isn't logged in, try to log them in
    if (!isset($_SESSION['id'])) {
        if (isset($_POST['submit'])) {
    
            // Connect to the DB
            $db = new PDO("mysql:host=localhost;dbname=project_4", "root", "root");
            
            // Get user-entered log-in data
            $user_username = $_POST['username'];
            $user_password = $_POST['password'];
            //$hash = password_hash($user_password, PASSWORD_DEFAULT);
            
            if (!empty($user_username) && !empty($user_password)) {
                // Grab username and password from database

                $sql = "SELECT id, username, user_pass FROM Task_User WHERE username = ?";

                try
            {
                $query = $db->prepare($sql);
                $query->execute([$user_username]);
                $row = $query->fetch();
                
            }
            catch(Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }
                
                if (is_array($row) && password_verify($user_password, $row['user_pass'])) {
                    
                    // Login is okay, set user id and username cookies and redirect to homepage
                     $_SESSION['id'] = $row['id'];
                     $_SESSION['username'] = $row['username'];
                    setcookie('id', $row['id'], time() + (60 * 60 * 24 * 30));    // set cookie to expire in 30 days
                    setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // set cookie to expire in 30 days
                    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
                    header('Location: ' . $home_url);
                }
                
                else {
                    
                    // Username and password are incorrect set an error message
                    $error_msg = 'Sorry, you must enter a valid username and password to log in.';
                }
                
                
                
            } else {
                // The username and password were not entered so set an error message
                $error_msg = 'Sorry, you must enter your username and password to log in.';
            }
                
        }
    }
?>
  
<?php

    // If session is empty, show an error message and the log-in form, otherwise confirm login
    if (empty($_SESSION['username'])) {
        echo '<p class="error">' . $error_msg . '</p>';
        
?>   
    <div class="centerMe">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" /><br />
        <fieldset>
            <br />
            <legend class="lrgtext">Please Log In</legend>
            <br />
            <label for="username">Username:</label>
            <input type="text" id="username" name="username"
                value="<?php if (!empty($user_username)) echo $user_username; ?>" /><br />
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" />
        </fieldset>
        <br />
        <input type="submit" class="btn btn-primary" value="Log in" name="submit" />
        <input type="reset" class="btn btn-default" value="Clear" name="reset" />
                             
    </form>
    <br/>
        <a href="Register.php" class="btn btn-secondary btn-lg">Create an Account</a>
    </div>
<?php

    }
    
    else {
        // Confirm successful login
        echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
    }
?>

</body>
</html>