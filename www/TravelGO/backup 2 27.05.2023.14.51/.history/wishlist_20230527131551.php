<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "Please log in.";
    exit();
}

$userID = $_SESSION['user_id'];

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

// Retrieve the wishlist restaurants for the logged-in user
$query = "SELECT restaurant.restaurant_id, restaurant.restaurant_name, restaurant.restaurant_location
          FROM wishlist
          JOIN restaurant ON wishlist.restaurant_id = restaurant.restaurant_id
          WHERE wishlist.user_id = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userID);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Your wishlist is empty.";
} else {
    echo "<h2>Your Wishlist Restaurants:</h2>";

    while ($row = $result->fetch_assoc()) {
        $restaurantID = $row['restaurant_id'];
        $restaurantName = $row['restaurant_name'];
        $restaurantLocation = $row['restaurant_location'];

        echo "<p><strong>Restaurant ID:</strong> $restaurantID</p>";
        echo "<p><strong>Restaurant Name:</strong> $restaurantName</p>";
        echo "<p><strong>Restaurant Location:</strong> $restaurantLocation</p>";
        echo "<hr>";
    }
}

$stmt->close();
$conn->close();
?>
