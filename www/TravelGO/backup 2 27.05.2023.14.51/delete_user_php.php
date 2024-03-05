<?php
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

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the selected user ID from the form
    $selectedUserId = $_POST['user'];

    // Prepare the delete statement
    $stmt = $conn->prepare("DELETE FROM user WHERE user_id = ?");
    $stmt->bind_param("i", $selectedUserId);

    // Execute the delete statement
    if ($stmt->execute()) {
        echo "User deleted successfully.";

        // Delay for 3 seconds
        sleep(3);

        // Redirect to admin_panel.html
        header("Location: admin_panel.html");
        exit; // Ensure the script stops executing after the redirect
    } else {
        echo "Error deleting user: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
