<?php
    include "_connection.php";

    session_start();
    $loggedIN = FALSE;
    if (isset($_SESSION["username"])){
        $loggedIN = TRUE;
    }
    
?>