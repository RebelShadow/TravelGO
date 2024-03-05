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
$stmt = $conn->prepare("SELECT r.review_id, r.title, r.stars FROM review r JOIN restaurant_review rr ON r.review_id = rr.review_id WHERE rr.restaurant_id = ?");
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
