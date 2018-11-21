<?php
	require_once('UserManager.php');
    
    $http_verb = $_SERVER['REQUEST_METHOD'];
    
    $UserManager = new UserManager();
    
    switch ($http_verb)
    {
        case "POST":
            // Create
            if (isset($_POST['username']) && isset($_POST['user_pass']))
            {
                echo $UserManager->create($_POST['username'], $_POST['user_pass']);
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
                echo $UserManager->delete($delete_vars['id']);
            }
            else
            {
                throw new Exception("Invalid HTTP DELETE request parameters.");
            }
            break;
            
        default:
            throw new Exception ("Defaulted.");
            break;
    }  
?>