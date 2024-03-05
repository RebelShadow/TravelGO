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
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare and execute the query
    $sql = "SELECT * FROM user WHERE username = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    // Check if the user exists
    if ($result->num_rows > 0) {
        // User found, do something
        echo '<div class="container">';
        echo '<h1>Login successful!</h1>';
        echo '<a href="index.html" class="button">Go to Homepage</a>';
        echo '</div>';
    } else {
        // User not found, show an error message
        echo "Invalid email or password";
    }
}

// Close the database connection
$conn->close();
?>
