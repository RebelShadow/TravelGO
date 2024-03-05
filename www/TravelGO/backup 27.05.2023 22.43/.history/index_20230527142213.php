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
    <!-- Remaining code remains unchanged -->
    <!-- ... -->
  </section>

  <!-- Remaining code remains unchanged -->
  <!-- ... -->

  <script src="http://localhost/TravelGO/js/jquery-3.4.1.min.js"></script>
  <script src="http://localhost/TravelGO/js/popper.min.js"></script>
  <script src="http://localhost/TravelGO/js/bootstrap-4.4.1.js"></script>
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
