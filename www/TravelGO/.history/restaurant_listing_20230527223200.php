<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurant Listing - TravelGO</title>
  <link rel="stylesheet" href="http://localhost/TravelGO/css/restaurant_listing.css">
  
</head>

<body>
  <header>
    <nav>
    <ul>    
        <li><a href="http://localhost/TravelGO/index.php">Home</a></li>
        <li><a href="http://localhost/TravelGO/restaurant_listing.php">Restaurants</a></li>
        <li><a href="http://localhost/TravelGO/about.html">About</a></li>
        <li><a href="http://localhost/TravelGO/contact.html">Contact</a></li>
        <li><a href="http://localhost/TravelGO/wishlist.php">Wishlist</a></li>
        <li><a href="http://localhost/TravelGO/login.html">Log in</a></li>
      </ul>
    </nav>
  </header>

  <section class="restaurant-list">
    <div class="container">
      <h2>Restaurant Listing</h2>
      <div class="restaurant-grid">
        <?php
        // Establish a database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "TravelGo";

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // Retrieve restaurants from the database
        $stmt = $conn->query("SELECT * FROM restaurant");

        $count = 0; // Counter to keep track of columns

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          $restaurantId = $row['restaurant_id'];
          $name = $row['name'];
          $image = $row['restaurant_image'];
          $url = "http://localhost/TravelGO/restaurant.php?id=" . $restaurantId; // Assuming restaurant.php handles individual restaurant view

          // Start a new column every third restaurant
          if ($count % 3 === 0) {
            echo '<div class="restaurant-column">';
          }

          echo '<div class="restaurant">';
          echo '<img src="data:image/jpeg;base64,' . base64_encode($image) . '" alt="' . $name . '">';
          echo '<h3>' . $name . '</h3>';
          echo '<a href="' . $url . '" class="view-button">View Reviews</a>';
          echo '</div>';

          $count++;

          // Close the column after the third restaurant
          if ($count % 3 === 0) {
            echo '</div>'; // Close the column
          }
        }

        // Close the column if there are remaining restaurants
        if ($count % 3 !== 0) {
          echo '</div>'; // Close the column
        }

        // Close the database connection
        $conn = null;
        ?>
      </div>
    </div>
  </section>

  <footer>
    <p>&copy; 2023 TravelGO. All rights reserved.</p>
  </footer>
</body>

</html>
