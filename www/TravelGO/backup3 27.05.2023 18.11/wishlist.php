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

// Check if a restaurant deletion request is submitted
if (isset($_GET['delete']) && isset($_GET['restaurant_id'])) {
    $restaurantID = $_GET['restaurant_id'];

    // Delete the restaurant from the wishlist
    $deleteQuery = "DELETE FROM wishlist WHERE restaurant_id = ? AND user_id = ?";
    $deleteStmt = $conn->prepare($deleteQuery);
    $deleteStmt->bind_param("ii", $restaurantID, $userID);
    $deleteStmt->execute();

    $deleteStmt->close();

    // Redirect back to the wishlist page
    header("Location: wishlist.php");
    exit();
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
  <link rel="stylesheet" href="http://localhost/TravelGO/css/index.css">
  <style>
    /* Add custom styles for wishlist.php */
    body {
      background-color: #ffffff;
    }
  
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
  
    header {
      padding: 20px;
      text-align: left;
      background-color: #0FC60D;
    }
  
    nav ul li {
      margin-right: 20px;
    }
  
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
  
    .contact {
      background-color: #F26430;
      color: #ffffff;
      padding: 40px 0;
      text-align: left;
    }
  
    .delete-button {
      display: inline-block;
      background-color: #F26430;
      color: #ffffff;
      padding: 5px 10px;
      border-radius: 5px;
      font-size: 14px;
      text-transform: uppercase;
      margin-left: 10px;
    }
  
    .delete-button:hover {
      background-color: #2A2D34;
    }
  </style>
</head>

<body>
  <header>
    <div class="container">
      <nav>
      <ul>    
        <li><a href="http://localhost/TravelGO/index.html">Home</a></li>
        <li><a href="http://localhost/TravelGO/restaurant_listing.php">Restaurants</a></li>
        <li><a href="http://localhost/TravelGO/about.html">About</a></li>
        <li><a href="http://localhost/TravelGO/contact.html">Contact</a></li>
        <li><a href="http://localhost/TravelGO/wishlist.php">Wishlist</a></li>
        <li><a href="http://localhost/TravelGO/login.html">Log in</a></li>
      </ul>
      </nav>
    </div>
  </header>

  <div class="presentation">
    <div class="container">
      <h2>Your Wishlist</h2>
    </div>
  </div>

  <div class="container">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<h2>" . $row['restaurant_name'] . "</h2>";
            echo "<p>" . $row['restaurant_location'] . "</p>";
            echo '<a href="?delete=true&restaurant_id=' . $row['restaurant_id'] . '" class="delete-button">Remove from Wishlist</a>';
            echo "<hr>";
        }
    } else {
        echo "<p>Your wishlist is empty.</p>";
    }

    $stmt->close();
    $conn->close();
    ?>
  </div>

  <div class="contact">
    <div class="container">
      <h2>Contact Us</h2>
      <p>If you have any questions or need assistance, feel free to reach out to us.</p>
      <a href="mailto:info@travelgo.com" class="cta-button">Email Us</a>
    </div>
  </div>
</body>

</html>
