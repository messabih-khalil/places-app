<?php
// db connection
$conn = require __DIR__ . '../../../connection.php';

// Request body
$place_id = $_GET['place_id'];

// Get comments from the database
$comments = array();

// Query to get comments for the place
$sqlQuery = "SELECT * FROM `comments` WHERE `place_id` = $place_id";

// Execute query
$result = $conn->query($sqlQuery);

// Push comments to the comments array
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }
}

$conn->close();

// Send comments data to client as JSON
echo json_encode($comments);

?>