<?php
    // db connection
    $conn=require __DIR__ . '../../../../connection.php';
    // Get All users from db
    $users = array();
    // Query to get users

    $sqlQuery = "SELECT * FROM `users`";
    // Execute query
    $result = $conn->query($sqlQuery);

    // Push users to userArray

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    } 
    $conn->close();

    return $users;
?>