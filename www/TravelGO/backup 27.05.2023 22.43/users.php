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

// Retrieve the list of users from the database
$sql = "SELECT user_id, username, email, role FROM user";
$result = $conn->query($sql);

// Check if any users were found
if ($result->num_rows > 0) {
    echo "<h2>User List</h2>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $userId = $row["user_id"];
        $username = $row["username"];
        $email = $row["email"];
        $role = $row["role"];

        echo "User ID: $userId<br>";
        echo "Username: $username<br>";
        echo "Email: $email<br>";
        echo "Role: $role<br>";
        echo "<br>";
    }
} else {
    echo "No users found.";
}

// Close the connection
$conn->close();
?>