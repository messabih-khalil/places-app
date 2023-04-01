<?php
    session_start();

    // Check if user is logged in
    if (!(isset($_SESSION["user_id"]) && $_SESSION["role"] === 'member')) {
        header('Location:/places_app/app/index.php');
    }
?>