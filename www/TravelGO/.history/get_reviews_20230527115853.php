<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

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

// Get the restaurant ID from the query parameters
$restaurantId = $_GET['restaurantId'];

// Prepare the SQL statement to retrieve reviews for the selected restaurant
$stmt = $conn->prepare("SELECT review_id, title FROM review WHERE review_id IN (SELECT review_id FROM restaurant_review WHERE restaurant_id = ?)");
$stmt->bind_param("i", $restaurantId);

// Execute the SQL statement
$stmt->execute();

// Fetch the results
$result = $stmt->get_result();

// Create an array to store the reviews
$reviews = array();

// Fetch each review and add it to the array
while ($row = $result->fetch_assoc()) {
    $reviews[] = $row;
}

// Close the statement and connection
$stmt->close();
$conn->close();

// Return the reviews as JSON
echo json_encode($reviews);
?>
