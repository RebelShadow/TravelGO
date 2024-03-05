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
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $admin = $_POST["admin"];
    // Prepare and execute the query
    $sql = "INSERT INTO user (username, password, email, admin) VALUES ('$username', '$password', '$email', '$admin')";

    if (mysqli_query($conn, $sql)) {
        // User added successfully
        mysqli_close($conn);
        header("Location: http://localhost/TravelGO/admin_panel.html");
        exit;
    } else {
        // Error occurred during user insertion
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
