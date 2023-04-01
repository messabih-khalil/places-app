<?php
    // Import db connectio from connectio.php 
    $conn=require __DIR__ . "../../../connection.php";

    // 1) Get user info
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    // 2) validate if email is unique
    $getExictedEmailQuery="SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($getExictedEmailQuery);

    // the number of users with the email (Notice that just for testing)
    $nbrRow=$result->num_rows;

    if($nbrRow > 0){
        echo 'Email Already Taken';
    }else{
        // 3) Hash the password before save it into db
        $hashedPassword=password_hash($password , PASSWORD_DEFAULT);

        // 4) create insert query
        $sqlQuery="INSERT INTO `users` (username , email , password)
        VALUES('$username' , '$email' , '$hashedPassword')";

        // 5) execute query
        $result = $conn->query($sqlQuery);

        if ($result === TRUE) {
            header('Location:../authentication/index.php');
        } else {
            echo "Error: " . $sqlQuery . "<br>" . $conn->error;
        }
          
    }


    // Close connection
    $conn->close();
?>