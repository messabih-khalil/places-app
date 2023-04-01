<?php

// Import db connection from connection.php
$conn = require __DIR__ . '../../../connection.php';
    
// Get request body data
$place_id = $_GET['place_id'];

// Create delete query
$sqlQuery = "DELETE FROM places WHERE id = $place_id";

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