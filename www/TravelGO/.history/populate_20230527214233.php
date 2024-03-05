<?php

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TravelGo";

// Create a PDO connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Generate sample restaurant data
    $restaurants = array(
        array(
            'restaurant_name' => 'Taste of India',
            'restaurant_specific' => 'Indian Cuisine',
            'restaurant_location' => 'Downtown',
            'restaurant_open_time' => '10:30:00',
            'restaurant_close_time' => '21:30:00',
            'restaurant_image' => null
        ),
        array(
            'restaurant_name' => 'Sushi World',
            'restaurant_specific' => 'Japanese Cuisine',
            'restaurant_location' => 'Shopping District',
            'restaurant_open_time' => '12:00:00',
            'restaurant_close_time' => '22:30:00',
            'restaurant_image' => null
        ),
        array(
            'restaurant_name' => 'Burger Joint',
            'restaurant_specific' => 'American Cuisine',
            'restaurant_location' => 'Suburbia',
            'restaurant_open_time' => '11:00:00',
            'restaurant_close_time' => '20:00:00',
            'restaurant_image' => null
        ),
        array(
            'restaurant_name' => 'La Pizzeria',
            'restaurant_specific' => 'Italian Cuisine',
            'restaurant_location' => 'City Center',
            'restaurant_open_time' => '11:30:00',
            'restaurant_close_time' => '23:00:00',
            'restaurant_image' => null
        ),
        array(
            'restaurant_name' => 'Thai Spice',
            'restaurant_specific' => 'Thai Cuisine',
            'restaurant_location' => 'Riverside',
            'restaurant_open_time' => '12:30:00',
            'restaurant_close_time' => '22:30:00',
            'restaurant_image' => null
        ),
        array(
            'restaurant_name' => 'Steakhouse Grill',
            'restaurant_specific' => 'Steakhouse Cuisine',
            'restaurant_location' => 'Business District',
            'restaurant_open_time' => '17:00:00',
            'restaurant_close_time' => '23:30:00',
            'restaurant_image' => null
        ),
        array(
            'restaurant_name' => 'Mediterranean Delight',
            'restaurant_specific' => 'Mediterranean Cuisine',
            'restaurant_location' => 'Coastal Area',
            'restaurant_open_time' => '12:00:00',
            'restaurant_close_time' => '22:00:00',
            'restaurant_image' => null
        ),
        array(
            'restaurant_name' => 'Vegetarian Bliss',
            'restaurant_specific' => 'Vegetarian Cuisine',
            'restaurant_location' => 'Green Valley',
            'restaurant_open_time' => '09:30:00',
            'restaurant_close_time' => '20:30:00',
            'restaurant_image' => null
        ),
        array(
            'restaurant_name' => 'Mexican Fiesta',
            'restaurant_specific' => 'Mexican Cuisine',
            'restaurant_location' => 'Old Town',
            'restaurant_open_time' => '11:00:00',
            'restaurant_close_time' => '23:30:00',
            'restaurant_image' => null
        ),
        array(
            'restaurant_name' => 'Seafood Paradise',
            'restaurant_specific' => 'Seafood Cuisine',
            'restaurant_location' => 'Harborfront',
            'restaurant_open_time' => '12:00:00',
            'restaurant_close_time' => '21:00:00',
            'restaurant_image' => null
        ),
        // Add more restaurant data as needed
    );

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO restaurant (restaurant_name, restaurant_specific, restaurant_location, restaurant_open_time, restaurant_close_time, restaurant_image) VALUES (:restaurant_name, :restaurant_specific, :restaurant_location, :restaurant_open_time, :restaurant_close_time, :restaurant_image)");

    foreach ($restaurants as $restaurant) {
        $stmt->execute($restaurant);
    }

    echo "Restaurant data populated successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn = null;

?>
