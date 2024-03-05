<?php

$ConnLink = mysql_connect("localhost", "root", "") or die("Connection failed");
$database = mysql_select_db("TravelGo") or die("Database selection failed");

// Define the image file paths and associated restaurant IDs
$imagePaths = array(
    "burger.jpg" => 36,
    "indian.jpg" => 34,
    "mediteranean.jpg" => 40,
    "mexican.jpg" => 42,
    "pizza.jpg" => 37,
    "steak.jpg" => 39,
    "sushi.jpg" => 35,
    "thai.jpg" => 38,
    "vegetarian.jpg" => 41,
    "seafood.jpg" => 43
);

// Iterate through the image paths and update the restaurant table
foreach ($imagePaths as $imagePath => $restaurantId) {
    $imageData = file_get_contents($imagePath);
    $query = "UPDATE restaurant SET restaurant_image = '" . mysql_real_escape_string($imageData) . "' WHERE restaurant_id = " . $restaurantId;
    mysql_query($query);
}

echo "Restaurant images updated successfully.";

?>
