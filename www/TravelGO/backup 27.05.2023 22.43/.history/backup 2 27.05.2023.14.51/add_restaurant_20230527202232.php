<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TravelGo";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form inputs
    $restaurantName = $_POST["restaurant_name"];
    $restaurantSpecific = $_POST["restaurant_specific"];
    $restaurantLocation = $_POST["restaurant_location"];
    $restaurantOpenTime = $_POST["restaurant_open_time"];
    $restaurantCloseTime = $_POST["restaurant_close_time"];

    // File upload handling
    $file = $_FILES["restaurant_image"];
    $fileName = $file["name"];
    $fileTmpName = $file["tmp_name"];
    $fileSize = $file["size"];
    $fileError = $file["error"];
    $fileType = $file["type"];

    // Check if a file is uploaded
    if ($fileError === UPLOAD_ERR_OK) {
        // Move the uploaded file to a desired location
        $targetDirectory = "uploads/";
        $targetFilePath = $targetDirectory . $fileName;
        move_uploaded_file($fileTmpName, $targetFilePath);

        // Prepare the insert statement
        $stmt = mysqli_prepare($conn, "INSERT INTO restaurant (restaurant_name, restaurant_specific, restaurant_location, restaurant_open_time, restaurant_close_time, restaurant_image) VALUES (?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssssb", $restaurantName, $restaurantSpecific, $restaurantLocation, $restaurantOpenTime, $restaurantCloseTime, $targetFilePath);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Restaurant added successfully
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            header("Location: success.html");
            exit;
        } else {
            // Error occurred while adding the restaurant
            $message = 'Error: ' . mysqli_error($conn);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Error occurred during file upload
        $message = 'Error uploading file. Error code: ' . $fileError;
    }
} else {
    // Invalid request method
    $message = 'Invalid request method';
}

// Close the database connection
mysqli_close($conn);
?>
