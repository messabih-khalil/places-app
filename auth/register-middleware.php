<?php
    session_start();

    if (isset($_SESSION["user_id"])) {

        
        // db connection
        $conn=require __DIR__ . "../../connection.php";

        // Query for get  a user with the session id
        $getUserQuery="SELECT * FROM users WHERE id={$_SESSION["user_id"]}";
        // Execute the query
        $result =$conn->query($getUserQuery);
        
        // get User
        $user = $result->fetch_assoc();
        
        // Check the role of the user and redirect to dashboard
        
        if ($user["role"] === "member") {
            header('Location:/places_app/dashboard/pages/member/places.php');
        }else if($user["role"] === "admin"){
            header('Location:/places_app/dashboard/pages/admin/places.php');
        }

    }else{
        header("Location:login/index.html");
    }
?>