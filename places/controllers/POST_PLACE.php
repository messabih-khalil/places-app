<?php
    // Import db connection from connection.php
    $conn = require __DIR__ . '../../../connection.php';

    // Get request body data
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];

    // Get image file data
    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $imageType = $_FILES['image']['type'];
    $imageError = $_FILES['image']['error'];

    // Check if the image was uploaded without errors
    if ($imageError === UPLOAD_ERR_OK) {
        // Move the uploaded image file to a desired location on your server
        $uploadPath = addslashes("C:\\xampp\htdocs\places_app\uploads\\" . $imageName);
        move_uploaded_file($imageTmpName, $uploadPath);

        // Save this path name in the db
        $uploadPath = "/places_app/uploads/" . $imageName;

        // Add the image path to your SQL query
        $sqlQuery = "INSERT INTO places (user_id, name, description, lat, lng, image_path)
             VALUES ('$user_id', '$name', '$description', '$lat', '$lng', '$uploadPath')";

    } else {
        // Handle the image upload error
        echo 'Error uploading image.';
    }

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