<?php
$servername = "localhost";  // Replace with your server name
$username = "root";  // Replace with your database username
$password = "";  // Replace with your database password
$dbname = "TravelGo";  // Replace with your database name

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
        // Read the contents of the uploaded file
        $fileContent = file_get_contents($fileTmpName);

        // Prepare the insert statement
        $stmt = $conn->prepare("INSERT INTO restaurant (restaurant_name, restaurant_specific, restaurant_location, restaurant_open_time, restaurant_close_time, restaurant_image) VALUES (?, ?, ?, ?, ?, ?)");

        // Bind the parameters
        $stmt->bind_param("sssssb", $restaurantName, $restaurantSpecific, $restaurantLocation, $restaurantOpenTime, $restaurantCloseTime, $fileContent);

        // Execute the statement
        if ($stmt->execute()) {
            // Restaurant added successfully
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            header("Location: http://localhost/TravelGO/admin_panel.html");
            exit;
        } else {
            // Error occurred while adding the restaurant
            $message = 'Error: ' . $stmt->error;
        }

        // Close the statement
        $stmt->close();
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

// After this closing there was some HTML code of the add_restaurant page, add it back if malfunction

?>
