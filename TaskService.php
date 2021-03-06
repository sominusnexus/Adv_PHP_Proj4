<?php
    require_once("TaskManager.php");
    require_once('LogManager.php');
    require_once('StatsManager.php');
    require_once('startsession.php');
    
    $http_verb = $_SERVER['REQUEST_METHOD'];
   
    $task_manager = new TaskManager();
    $log_manager = new LogManager();
    $stats_manager = new StatsManager();
    
    switch ($http_verb)
    {
        case "POST":
            // Create
            if (isset($_POST['description']) && isset($_POST['created_by_user']))
            {
                $username = $_POST['created_by_user'];
                echo $task_manager->create($_POST['description'], $_POST['created_by_user']);
                echo $log_manager->updateCreate($username);
            }
            else
            {
                throw new Exception("Invalid HTTP POST request parameters.");
            }
            
            break;
            
        case "GET":
            // Read
            header("Content-Type: application/json");
            
            if (isset($_GET['id']) && isset($_GET['username']))
            {
                $username = $_GET['username'];
                echo $task_manager->read($_GET['id'], $_GET['username']);
                echo $log_manager->updateReadID($username);
            }
            else 
            {
                if (isset($_GET['username'])) 
                {

                    $username = $_GET['username'];
                    echo $task_manager->readAll($_GET['username']);
                    echo $log_manager->UpdateRead($username);
                    
                }    
                
            }
            
            break;
            
        case "PUT":
            // Update

            parse_str(file_get_contents("php://input"), $update_vars);
            
            if (isset($update_vars['id']) && isset($update_vars['description']) && isset($update_vars['username']))
            {
                $username = $update_vars['username'];
                echo $task_manager->update($update_vars['id'], $update_vars['description'], $update_vars['username']);
                echo $log_manager->updateUpdate($username);
            }
            else
            {
                throw new Exception("Invalid HTTP UPDATE request parameters.");
            }

            break;
            
        case "DELETE":
            // Delete
            parse_str(file_get_contents("php://input"), $delete_vars);
            
            if (isset($delete_vars['id']) && isset($delete_vars['username']))
            {
                $username = $delete_vars['username'];
                echo $task_manager->delete($delete_vars['id'], $delete_vars['username']);
                echo $log_manager->updateDelete($username);
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
