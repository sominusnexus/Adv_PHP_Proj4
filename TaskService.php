<?php
    require_once("TaskManager.php");
    require_once('LogManager.php');
    require_once('startsession.php');
    
    $http_verb = $_SERVER['REQUEST_METHOD'];
    
    $task_manager = new TaskManager();
    $log_manager = new LogManager();
    
    switch ($http_verb)
    {
        case "POST":
            // Create
            if (isset($_POST['description']) && isset($_POST['created_by_user']))
            {
                echo $task_manager->create($_POST['description'], $_POST['created_by_user']);
                echo $log_manager->updateCreate();
            }
            else
            {
                throw new Exception("Invalid HTTP POST request parameters.");
            }
            
            break;
            
        case "GET":
            // Read
            header("Content-Type: application/json");
            
            if (isset($_GET['id']))
            {
                echo $task_manager->read($_GET['id']);
            }
            else
            {
                echo $task_manager->readAll();
            }
            
            break;
            
        case "PUT":
            // Update
            parse_str(file_get_contents("php://input"), $update_vars);
            
            if (isset($update_vars['id']) && isset($update_vars['description']))
            {
                echo $task_manager->update($update_vars['id'], $update_vars['description']);
            }
            else
            {
                throw new Exception("Invalid HTTP UPDATE request parameters.");
            }

            break;
            
        case "DELETE":
            // Delete
            parse_str(file_get_contents("php://input"), $delete_vars);
            
            if (isset($delete_vars['id']))
            {
                echo $task_manager->delete($delete_vars['id']);
            }
            else
            {
                throw new Exception("Invalid HTTP DELETE request parameters.");
            }
            break;
            
        default:
            throw new Exception ("Unsupported HTTP request.");
            break;
    }
?>
