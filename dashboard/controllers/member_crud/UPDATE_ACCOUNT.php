<?php
    // // db connection
    $conn=require __DIR__ . '../../../../connection.php';

    // Get requested data
    $user_id=$_POST['user_id'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    echo $username,$email,$password;
    // sqlquery to update a record
    $sqlQuery = "UPDATE `users` SET username='$username' , email='$email' , password='$password' WHERE id=$user_id";

    // If there is error
    if ($conn->query($sqlQuery) === FALSE) {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();

    echo "updated";
    // header('Location:/places_app/dashboard/pages/register/index.php')
?>