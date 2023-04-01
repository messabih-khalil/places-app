<?php

// Import db connection from connection.php
$conn = require __DIR__ . '../../../connection.php';
    
// Get request body data
$place_id = $_POST['place_id'];
$name = $_POST['name'];
$description = $_POST['description'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];

// Create update query
$sqlQuery = "UPDATE places
             SET name = '$name', description = '$description', lat = '$lat', lng = '$lng'
             WHERE id = $place_id";

// Execute query and check for errors
if ($conn->query($sqlQuery) === TRUE) {
    // return to the page that I came from in PHP
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
} else {
    echo "Error: " . $sqlQuery . "<br>" . $conn->error;
}

// Close connection
$conn->close();


?>