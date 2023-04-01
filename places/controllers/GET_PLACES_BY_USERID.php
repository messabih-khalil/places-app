<?php
    // session_start();

    $user_id = $_SESSION["user_id"];


    // db connection
    $conn=require __DIR__ . '../../../connection.php';
    // Get All users from db
    $places = array();
    // Query to get places

    $sqlQuery = "SELECT * FROM places WHERE user_id = $user_id";
    // Execute query
    $result = $conn->query($sqlQuery);

    // Push users to userArray

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $places[] = $row;
        }
    } 
    $conn->close();

    return $places;
?>