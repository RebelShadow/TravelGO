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
  <link rel="stylesheet" href="http://localhost/TravelGO/css/index.css">
  <style>
    
</head>

<body>
  <header>
    <div class="container">
      <nav>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Explore</a></li>
          <li><a href="#">Contact</a></li>
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
