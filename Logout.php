<?php
	require_once('startsession.php');
 
    if (isset($_SESSION['id'])) {
        // Delete the session vars by clearing the session array
        $_SESSION = array();
        
        // Delete the session cookie by setting it's expiration to the past
        if (isset($_COOKIE[session_name])) {
            setcookie('session_name', '', time() - 3600);
        }
    
        // Destory the session
        session_destroy();
    }
    
    // Delete the user ID and username cookies by setting their expirations in the past
    setcookie('id', '', time() - 3600);
    setcookie('username', '', time() - 3600);
    
    // Redirect to home page
    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
    header('Location: ' .$home_url);
?>