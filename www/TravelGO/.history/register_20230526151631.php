<?php
$servername = "localhost";  // Replace with your server name
$username = "root";  // Replace with your database username
$password = "";  // Replace with your database password
$dbname = "TravelGo";  // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form inputs
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the user already exists
    $checkQuery = "SELECT * FROM user WHERE username = '$email'";
    $checkResult = $conn->query($checkQuery);
    if ($checkResult->num_rows > 0) {
        // User already exists
        echo "Error: User with the provided email already exists.";
    } else {
        // Prepare and execute the query
        $insertQuery = "INSERT INTO user (username, password) VALUES ('$email', '$password')";
        if ($conn->query($insertQuery) === TRUE) {
            // Registration successful
            echo "Registration successful!";
            echo '<div class="container">';
            echo '<a href="index.html" class="button">Go to Homepage</a>';
            echo '</div>';
        } else {
            // Error occurred during registration
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>
