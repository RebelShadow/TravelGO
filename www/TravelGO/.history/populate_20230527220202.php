<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TravelGo";

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Sample data for wishlist
    $wishlistData = array(
        array('restaurant_id' => 34, 'user_id' => 9),
        array('restaurant_id' => 35, 'user_id' => 10),
        array('restaurant_id' => 36, 'user_id' => 11),
        array('restaurant_id' => 37, 'user_id' => 12),
        array('restaurant_id' => 38, 'user_id' => 13),
        array('restaurant_id' => 39, 'user_id' => 14),
        array('restaurant_id' => 40, 'user_id' => 15),
        array('restaurant_id' => 41, 'user_id' => 16),
        array('restaurant_id' => 42, 'user_id' => 17),
        array('restaurant_id' => 43, 'user_id' => 18),
        array('restaurant_id' => 34, 'user_id' => 19),
        array('restaurant_id' => 35, 'user_id' => 20),
        array('restaurant_id' => 36, 'user_id' => 21),
        array('restaurant_id' => 37, 'user_id' => 22),
        array('restaurant_id' => 38, 'user_id' => 23),
        array('restaurant_id' => 39, 'user_id' => 24),
        array('restaurant_id' => 40, 'user_id' => 25),
        array('restaurant_id' => 41, 'user_id' => 26),
        array('restaurant_id' => 42, 'user_id' => 27),
        array('restaurant_id' => 43, 'user_id' => 28),
    );

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO wishlist (restaurant_id, user_id) VALUES (:restaurant_id, :user_id)");

    // Insert wishlist data
    foreach ($wishlistData as $wishlist) {
        $restaurantId = $wishlist['restaurant_id'];
        $userId = $wishlist['user_id'];

        // Bind the parameters
        $stmt->bindParam(':restaurant_id', $restaurantId);
        $stmt->bindParam(':user_id', $userId);

        // Execute the statement
        $stmt->execute();
    }

    echo "Wishlist populated successfully.";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$conn = null;

?>
