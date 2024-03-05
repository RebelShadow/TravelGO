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

  <section class="slider">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <?php
        // Establish a database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "TravelGo";

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // Fetch the restaurant data
        $stmt = $conn->prepare("SELECT * FROM restaurant");
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          $restaurantId = $row['restaurant_id'];
          $restaurantName = $row['restaurant_name'];
          $restaurantImage = $row['restaurant_image'];

          echo '<div class="swiper-slide">';
          echo '<a href="http://localhost/TravelGO/restaurant.php?id=' . $restaurantId . '">';
          echo '<img src="data:image/jpeg;base64,' . base64_encode($restaurantImage) . '" alt="' . $restaurantName . '">';
          echo '<h3>' . $restaurantName . '</h3>';
          echo '</a>';
          echo '</div>';
        }

        // Close the database connection
        $conn = null;
        ?>
      </div>
      <!-- Add navigation buttons -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </section>

  <section class="presentation">
    <!-- Remaining content remains unchanged -->
    <div class="intro">
      <h1>Welcome to TravelGO</h1>
      <p>Discover new restaurants, explore new cuisines, and plan your next food adventure!</p>
    </div>
    <div class="features">
      <div class="feature">
        <img src="http://localhost/TravelGO/images/feature1.png" alt="Feature 1">
        <h3>Find the Best Restaurants</h3>
        <p>Search and browse through a wide selection of top-rated restaurants.</p>
      </div>
      <div class="feature">
        <img src="http://localhost/TravelGO/images/feature2.png" alt="Feature 2">
        <h3>Save to Your Wishlist</h3>
        <p>Save your favorite restaurants to your wishlist for easy access later.</p>
      </div>
      <div class="feature">
        <img src="http://localhost/TravelGO/images/feature3.png" alt="Feature 3">
        <h3>Contact Information</h3>
        <p>Get in touch with restaurants directly for reservations or inquiries.</p>
      </div>
    </div>
  </section>

  <footer>
    <p>&copy; 2023 TravelGO. All rights reserved. | Designed by Your Name</p>
  </footer>

  <!-- Add Swiper JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    // Initialize Swiper
    var swiper = new Swiper('.swiper-container', {
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
</body>

</html>
