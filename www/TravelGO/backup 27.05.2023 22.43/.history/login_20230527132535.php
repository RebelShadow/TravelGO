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
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Fetch the user data
    $user = $result->fetch_assoc();

    // Check if the user exists
    if ($result->num_rows > 0) {
        // User found, set the session variable
        $_SESSION["user_id"] = $user["user_id"];

        // Check if the user is an admin
        if ($user["admin"] == 1) {
            // Redirect to the admin panel
            header("Location: admin_panel.html");
            exit();
        } else {
            // Redirect to the index page
            header("Location: index.html");
            exit();
        }
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
