<?php
    session_start() ;
    // 1) Clean the session
    session_destroy() ;
    // 2) Redirect to login page
    header("Location:./authentication/index.php");

    exit;
?>