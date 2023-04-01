<?php
    // // db connection
    $conn=require __DIR__ . '../../../../connection.php';

    // Get requested data
    $user_id=$_GET['user_id'];
    $username=$_GET['username'];
    $password=$_GET['password'];
    $email=$_GET['email'];
    $role=$_GET['role'];
    echo $username,$email,$role;
    // sqlquery to update a record
    $sqlQuery = "UPDATE `users` SET username='$username' , email='$email' , role='$role' WHERE id=$user_id";

    // If there is error
    if ($conn->query($sqlQuery) === FALSE) {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();

    header('Location:/places_app/dashboard/pages/admin/users.php')
?>