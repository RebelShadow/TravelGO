<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurant - TravelGO</title>
  <link rel="stylesheet" href="http://localhost/TravelGO/css/restaurant.css">
</head>

<body>
  <header>
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
  </header>

  <section class="restaurant">
    <div class="container">
      <?php
      session_start();

      // Check if the user is logged in
      $isLoggedIn = isset($_SESSION['user_id']);


      // Establish a database connection
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "TravelGo";

      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

      // Retrieve the restaurant ID from the URL parameter
      $restaurantId = $_GET['id'];

      // Fetch the restaurant information
      $stmt = $conn->prepare("SELECT * FROM restaurant WHERE restaurant_id = :id");
      $stmt->bindParam(':id', $restaurantId);
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $name = $row['restaurant_name'];
      $location = $row['restaurant_location'];
      $image = $row['restaurant_image'];

      echo '<div class="restaurant-info">';
      echo '<img src="data:image/jpeg;base64,' . base64_encode($image) . '" alt="' . $name . '">';
      echo '<h2>' . $name . '</h2>';
      echo '<p>Location: ' . $location . '</p>';
      echo '</div>';

      // Fetch the reviews for the restaurant
      $stmt = $conn->prepare("SELECT * FROM review JOIN restaurant_review ON review.review_id = restaurant_review.review_id WHERE restaurant_id = :id");
      $stmt->bindParam(':id', $restaurantId);
      $stmt->execute();

      echo '<div class="reviews">';
      echo '<h3>Reviews</h3>';

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $reviewTitle = $row['title'];
        $reviewStars = $row['stars'];
        $reviewBody = $row['body'];

        echo '<div class="review">';
        echo '<h4>' . $reviewTitle . '</h4>';
        echo '<p>Stars: ' . $reviewStars . '</p>';
        echo '<p>' . $reviewBody . '</p>';
        echo '</div>';
      }

      echo '</div>';

      // Display the review form if the user is logged in
      if ($isLoggedIn) {
        echo '<div class="review-form">';
        echo '<h3>Leave a Review</h3>';
        echo '<form action="submit_review.php" method="POST">';
        echo '<input type="hidden" name="restaurant_id" value="' . $restaurantId . '">';
        echo '<label for="title">Title:</label><br>';
        echo '<input type="text" name="title" required><br>';
        echo '<label for="stars">Stars:</label><br>';
        echo '<input type="number" name="stars" min="1" max="5" required><br>';
        echo '<label for="body">Review:</label><br>';
        echo '<textarea name="body" rows="5" required></textarea><br>';
        echo '<input type="submit" value="Submit Review">';
        echo '</form>';
        echo '</div>';
      }

      // Close the database connection
      $conn = null;
      ?>
    </div>
  </section>

  <footer>
    <p>&copy; 2023 TravelGO. All rights reserved.</p>
  </footer>
</body>

</html>
