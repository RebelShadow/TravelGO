<?php
session_start();  // Start the session

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TravelGo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form inputs
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare the statement
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        // User found, set the session variable
        $_SESSION["isLoggedIn"] = true;

        // Redirect to the restaurant page
        header("Location: restaurant.php");
        exit();
    } else {
        // User not found, show an error message
        echo "Invalid email or password";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
