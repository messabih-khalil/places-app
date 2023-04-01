<?php
    // Import db connection from connection.php
    $conn=require __DIR__ . '../../../connection.php';
    
    // Get request body data
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];

    // Create insert query
    $sqlQuery = "INSERT INTO places (user_id, name, description, lat, lng)
                 VALUES ('$user_id', '$name', '$description', '$lat', '$lng')";

    // Execute query and check for errors
    if ($conn->query($sqlQuery) === TRUE) {
        // return to the page that i came from in PHP
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        echo "Error: " . $sqlQuery . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
?>