<?php
    // // db connection
    $conn=require __DIR__ . '../../../../connection.php';

    // // Get user id
    $user_id=$_GET['user_id'];

    // sql to delete a record
    $sqlQuery = "DELETE FROM `users` WHERE id=$user_id";

    session_start();
    session_destroy();

    // If there is error
    if ($conn->query($sqlQuery) === FALSE) {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();

    header('Location:/places_app/app/index.php')
?>