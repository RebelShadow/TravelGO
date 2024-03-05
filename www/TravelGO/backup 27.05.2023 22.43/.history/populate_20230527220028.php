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

    // Array of restaurants and their corresponding reviews
    $restaurants = array(
        array(
            'id' => 34,
            'name' => 'Taste of India',
            'reviews' => array(
                array(
                    'title' => 'Delicious Indian Cuisine',
                    'stars' => 5,
                    'body' => 'The food at Taste of India is amazing! Highly recommended.'
                ),
                array(
                    'title' => 'Great Dining Experience',
                    'stars' => 4,
                    'body' => 'I had a wonderful time at Taste of India. The service was excellent.'
                ),
                array(
                    'title' => 'Authentic Indian Food',
                    'stars' => 5,
                    'body' => 'Taste of India never disappoints. The flavors are authentic and delicious.'
                ),
                array(
                    'title' => 'Excellent Vegetarian Options',
                    'stars' => 4,
                    'body' => 'As a vegetarian, I appreciate the wide range of options available at Taste of India.'
                ),
            )
        ),
        array(
            'id' => 35,
            'name' => 'Sushi World',
            'reviews' => array(
                array(
                    'title' => 'Fresh and Tasty Sushi',
                    'stars' => 4,
                    'body' => 'Sushi World offers a wide variety of sushi options. Loved it!'
                ),
                array(
                    'title' => 'Authentic Japanese Cuisine',
                    'stars' => 5,
                    'body' => 'The quality of food at Sushi World is top-notch. A must-visit place.'
                ),
                array(
                    'title' => 'Good Sushi Selection',
                    'stars' => 3,
                    'body' => 'Sushi World has a decent selection of sushi, but the service could be improved.'
                ),
                array(
                    'title' => 'Friendly Staff',
                    'stars' => 4,
                    'body' => 'The staff at Sushi World is always welcoming and attentive.'
                ),
                array(
                    'title' => 'Value for Money',
                    'stars' => 4,
                    'body' => 'You get great value for your money at Sushi World. The portions are generous.'
                ),
            )
        ),
        array(
            'id' => 36,
            'name' => 'Burger Joint',
            'reviews' => array(
                array(
                    'title' => 'Best Burgers in Town',
                    'stars' => 5,
                    'body' => 'Burger Joint serves the juiciest and tastiest burgers I have ever had.'
                ),
                array(
                    'title' => 'Great Atmosphere',
                    'stars' => 4,
                    'body' => 'The ambiance at Burger Joint is perfect for a casual dining experience.'
                ),
            )
        ),
        array(
            'id' => 37,
            'name' => 'La Pizzeria',
            'reviews' => array(
                array(
                    'title' => 'Authentic Italian Pizza',
                    'stars' => 5,
                    'body' => 'La Pizzeria serves the most authentic Italian pizza in town. Simply delicious!'
                ),
                array(
                    'title' => 'Cozy Restaurant',
                    'stars' => 4,
                    'body' => 'I love the cozy atmosphere at La Pizzeria. It s a great place to enjoy pizza with friends.'
                ),
                array(
                    'title' => 'Fast Service',
                    'stars' => 3,
                    'body' => 'The service at La Pizzeria could be a bit faster, but the food makes up for it.'
                ),
            )
        ),
        array(
            'id' => 38,
            'name' => 'Thai Spice',
            'reviews' => array(
                array(
                    'title' => 'Spicy and Flavorful Thai Food',
                    'stars' => 4,
                    'body' => 'Thai Spice offers a great selection of spicy and flavorful Thai dishes.'
                ),
                array(
                    'title' => 'Friendly Staff',
                    'stars' => 5,
                    'body' => 'The staff at Thai Spice is always friendly and attentive. They make dining a pleasant experience.'
                ),
            )
        ),
        array(
            'id' => 39,
            'name' => 'Steakhouse Grill',
            'reviews' => array(
                array(
                    'title' => 'Juicy Steaks',
                    'stars' => 5,
                    'body' => 'Steakhouse Grill serves the juiciest steaks I have ever tasted. Highly recommended!'
                ),
                array(
                    'title' => 'Great Selection of Wines',
                    'stars' => 4,
                    'body' => 'The wine selection at Steakhouse Grill perfectly complements their delicious steaks.'
                ),
                array(
                    'title' => 'Upscale Dining Experience',
                    'stars' => 5,
                    'body' => 'Steakhouse Grill provides an upscale dining experience with its elegant decor and attentive service.'
                ),
            )
        ),
        array(
            'id' => 40,
            'name' => 'Mediterranean Delight',
            'reviews' => array(
                array(
                    'title' => 'Fresh and Healthy Mediterranean Food',
                    'stars' => 4,
                    'body' => 'Mediterranean Delight offers a wide variety of fresh and healthy Mediterranean dishes.'
                ),
                array(
                    'title' => 'Tasty Hummus',
                    'stars' => 3,
                    'body' => 'The hummus at Mediterranean Delight is good, but it could be more flavorful.'
                ),
                array(
                    'title' => 'Great Seafood Options',
                    'stars' => 4,
                    'body' => 'I enjoyed the seafood options at Mediterranean Delight. The flavors were well-balanced.'
                ),
            )
        ),
        array(
            'id' => 41,
            'name' => 'Vegetarian Bliss',
            'reviews' => array(
                array(
                    'title' => 'Heaven for Vegetarians',
                    'stars' => 5,
                    'body' => 'Vegetarian Bliss offers a wide range of delicious vegetarian dishes. A must-visit for vegetarians.'
                ),
                array(
                    'title' => 'Fresh Ingredients',
                    'stars' => 4,
                    'body' => 'The ingredients used at Vegetarian Bliss are always fresh and of high quality.'
                ),
            )
        ),
        array(
            'id' => 42,
            'name' => 'Mexican Fiesta',
            'reviews' => array(
                array(
                    'title' => 'Authentic Mexican Cuisine',
                    'stars' => 4,
                    'body' => 'Mexican Fiesta serves authentic Mexican dishes that are full of flavor.'
                ),
                array(
                    'title' => 'Friendly Atmosphere',
                    'stars' => 3,
                    'body' => 'The atmosphere at Mexican Fiesta is lively and welcoming.'
                ),
                array(
                    'title' => 'Tasty Margaritas',
                    'stars' => 4,
                    'body' => 'I enjoyed the flavorful margaritas at Mexican Fiesta. They have a good variety to choose from.'
                ),
            )
        ),
        array(
            'id' => 43,
            'name' => 'Seafood Paradise',
            'reviews' => array(
                array(
                    'title' => 'Fresh Seafood Delights',
                    'stars' => 5,
                    'body' => 'Seafood Paradise offers a wide variety of fresh and delicious seafood options.'
                ),
                array(
                    'title' => 'Excellent Service',
                    'stars' => 4,
                    'body' => 'The service at Seafood Paradise is always excellent. The staff is knowledgeable and attentive.'
                ),
            )
        )
    );

    // Insert reviews for each restaurant
    foreach ($restaurants as $restaurant) {
        $restaurantId = $restaurant['id'];
        $reviews = $restaurant['reviews'];

        foreach ($reviews as $review) {
            $title = $review['title'];
            $stars = $review['stars'];
            $body = $review['body'];

            // Prepare the SQL statement
            $stmt = $conn->prepare("INSERT INTO review (user_id, title, stars, body) VALUES (:user_id, :title, :stars, :body)");

            // Generate a random user_id between 9 and 29
            $userId = rand(9, 29);

            // Bind the parameters
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':stars', $stars);
            $stmt->bindParam(':body', $body);

            // Execute the statement
            $stmt->execute();

            // Retrieve the review_id
            $reviewId = $conn->lastInsertId();

            // Prepare the SQL statement for inserting into restaurant_review table
            $stmt2 = $conn->prepare("INSERT INTO restaurant_review (review_id, restaurant_id) VALUES (:review_id, :restaurant_id)");

            // Bind the parameters
            $stmt2->bindParam(':review_id', $reviewId);
            $stmt2->bindParam(':restaurant_id', $restaurantId);

            // Execute the statement
            $stmt2->execute();
        }
    }

    echo "Reviews added successfully.";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$conn = null;

?>
