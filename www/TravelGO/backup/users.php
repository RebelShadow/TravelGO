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

// Query to fetch users from the database
$sql = "SELECT * FROM `user`";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if any users were found
if (mysqli_num_rows($result) > 0) {
    // Output each user
    while ($row = mysqli_fetch_assoc($result)) {
        echo "User ID: " . $row["user_id"] . "<br>";
        echo "Username: " . $row["username"] . "<br>";
        echo "Role: " . $row["role"] . "<br>";
        echo "Created at: " . $row["created_at"] . "<br>";
        echo "<br>";
    }
} else {
    echo "No users found.";
}

// Close the database connection
mysqli_close($conn);
?>
