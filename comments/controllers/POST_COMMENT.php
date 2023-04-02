<?php
// db connection
$conn = require __DIR__ . '../../../connection.php';

// Get user ID from session
session_start();
$user_id = $_SESSION['user_id'];

// Get the request body data
$requestBody = json_decode(file_get_contents('php://input'), true);

// Extract the comment data
$place_id = $requestBody['place_id'];
$comment_text = $requestBody['comment_text'];

// Insert comment into the database
$created_at = date('Y-m-d H:i:s'); // current date and time
$sqlQuery = "INSERT INTO `comments` (`user_id`, `place_id`, `comment_text`, `created_at`) VALUES ('$user_id',
'$place_id', '$comment_text', '$created_at')";
if ($conn->query($sqlQuery) === TRUE) {
$comment_id = $conn->insert_id;
// Return the inserted comment
$sqlQuery = "SELECT * FROM `comments` WHERE `id` = $comment_id";
$result = $conn->query($sqlQuery);
$comment = $result->fetch_assoc();
echo json_encode($comment);
} else {
echo "Error: " . $sqlQuery . "<br>" . $conn->error;
}

$conn->close();
?>