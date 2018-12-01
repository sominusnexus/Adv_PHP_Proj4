<?php
	require_once('UserManager.php');
    
    $http_verb = $_SERVER['REQUEST_METHOD'];
    
    $user_manager = new UserManager();
    
    switch ($http_verb)
    {
        case "POST":
            // Create
            if (isset($_POST['username']) && isset($_POST['user_pass']))
            {
                echo $user_manager->create($_POST['username'], $_POST['user_pass']);
            }
            else
            {
                throw new Exception("Invalid HTTP POST request parameters.");
            }
            
            break;
            
        case "DELETE":
            // Delete
            parse_str(file_get_contents("php://input"), $delete_vars);
            
            if (isset($delete_vars['id']))
            {
                echo $user_manager->delete($delete_vars['id']);
            }
            else
            {
                throw new Exception("Invalid HTTP DELETE request parameters.");
            }
            break;
            
        default:
            throw new Exception ("Defaulted.");
            break;

        case "GET":
            // Read
            header("Content-Type: application/json");
            
            if (isset($_GET['id']) && isset($_GET['username']))
            {
                $username = $_GET['username'];
                echo $user_manager->read($_GET['id'], $_GET['username']);
            }
            else 
            {
                if (isset($_GET['username'])) 
                {

                    $username = $_GET['username'];
                    echo $user_manager->readAll($_GET['username']);
                    
                }    
                
            }
            
            break;    
    }  
?>