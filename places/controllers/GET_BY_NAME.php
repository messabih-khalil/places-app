<?php
    // db connection
    $conn=require __DIR__ . '../../../connection.php';

    // Request body

    $place_name=$_GET['place_name'];

    // Get All users from db
    $places = array();
    // Query to get places

    $sqlQuery = "SELECT * FROM `places` WHERE name LIKE '%$place_name%'";
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

    // Send places data to client as json
    echo json_encode($places); 
?>