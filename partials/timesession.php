<?php
    
    if (!isset($_SESSION['loggedIn'])) {
        echo "Please sign in"; ?> <br> <?php
        echo "<a href='http://localhost:8888/lars_berger_journal/'>Sign in here</a>"; 
        
    } else {
        $now = time(); 
        if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "Your session has expired! <a href='http://localhost:8888/lars_berger_journal/'>To Login</a>";
        }
    }
?>

