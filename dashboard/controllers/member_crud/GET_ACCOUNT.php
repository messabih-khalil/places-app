<?php
    // db connection
    $conn=require __DIR__ . '../../../../connection.php';
    // Query to get users
    $user_id=$_GET['user_id'];

    $sqlQuery = "SELECT * FROM `users` WHERE id='$user_id'";
    // Execute query
    $result = $conn->query($sqlQuery);

    // Push users to userArray

    if ($result->num_rows > 0) {
        // output data 
        $user = $result->fetch_assoc(); 
    }
    $conn->close();

    // Send user data to client as json
    echo json_encode($user); 
?>