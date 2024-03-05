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

?>

<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TravelGO - Explore and Discover</title>
  <link rel="stylesheet" href="http://localhost/TravelGO/css/style.css">
  <!-- Add Swiper CSS -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  <!-- Link the custom index.css file -->
  <link rel="stylesheet" href="http://localhost/TravelGO/css/index.css">
  <style>
    /* Add custom styles for wishlist.php */
    body {
      background-color: #ffffff;
    }
  
    /* Adjust container width */
    .container {
      max-width: 960px;
      margin: 0 auto;
      padding: 20px;
      background-color: transparent;
    }
  
    h2 {
      margin-bottom: 20px;
      color: #2A2D34;
    }
  
    p {
      color: #2A2D34;
    }
  
    hr {
      border-top: 1px solid #2A2D34;
      margin: 20px 0;
    }
  
    /* Adjust header styles */
    header {
      padding: 20px;
      text-align: left;
      background-color: #0FC60D;
    }
  
    nav ul li {
      margin-right: 20px;
    }
  
    /* Adjust presentation styles */
    .presentation {
      background-color: #6184D8;
      color: #ffffff;
      padding: 40px 0;
      text-align: left;
    }
  
    .presentation h2 {
      font-size: 32px;
      margin-bottom: 20px;
    }
  
    .presentation p {
      font-size: 18px;
      margin-bottom: 30px;
    }
  
    .cta-button {
      display: inline-block;
      background-color: #F26430;
      color: #ffffff;
      padding: 10px 20px;
      border-radius: 5px;
      font-size: 18px;
      text-transform: uppercase;
    }
  
    .cta-button:hover {
      background-color: #2A2D34;
    }
  
    /* Adjust contact styles */
    .contact {
      background-color: #F26430;
      color: #ffffff;
      padding: 40px 0;
      text-align: left;
    }
.
