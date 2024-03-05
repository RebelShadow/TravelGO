<?php
session_start();

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['user_id']);

if ($isLoggedIn) {
  // Retrieve the form data
  $restaurantId = $_POST['restaurant_id'];
  $title = $_POST['title'];
  $stars = $_POST['stars'];
  $body = $_POST['body'];

  // Establish a database connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "TravelGo";

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

  // Insert the review into the database
  $stmt = $conn->prepare("INSERT INTO review (title, stars, body) VALUES (:title, :stars, :body)");
  $stmt->bindParam(':title', $title);
  $stmt->bindParam(':stars', $stars);
  $stmt->bindParam(':body', $body);
  $stmt->execute();

  $reviewId = $conn->lastInsertId();

  // Insert the review and restaurant relationship into the database
  $stmt = $conn->prepare("INSERT INTO restaurant_review (restaurant_id, review_id) VALUES (:restaurantId, :reviewId)");
  $stmt->bindParam(':restaurantId', $restaurantId);
  $stmt->bindParam(':reviewId', $reviewId);
  $stmt->execute();

  // Close the database connection
  $conn = null;

  // Redirect back to the restaurant page
  header("Location: restaurant.php?id=$restaurantId");
  exit();
} else {
  // User is not logged in, redirect to the login page
  header("Location: login.html");
  exit();
}
?>
