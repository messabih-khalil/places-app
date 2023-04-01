<?php

    // Set user to invalid | if the bottom condition is valid then return it to teu
    $isValid = false;

    // Get Database Connection
    $conn=require __DIR__ . "../../../connection.php";

    // 1) Get data from request
    $email=$_POST['email'];
    $password=$_POST['password'];

    // 2) Get user by email
    $getUserQuery="SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($getUserQuery);
    
    // 3) Check if user is exist with specific email
    if ($result->num_rows === 0) {
        die("User not exist with this specific email");
    }
    
    // 4) Compare the hashed password with requested user password
    // fetch user data
    $user = $result->fetch_assoc();

    if (!password_verify($password , $user['password'])) {
        die("Password is incorrect");
    }
    $isValid = true;
    // 5) Save authentiction to session

    if ($isValid) {
        session_start();
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["role"] = $user["role"];

        // Redirect the process to middleware for filter user
        header("Location:../register-middleware.php");

        exit;
    }

?>