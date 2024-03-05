<?php
$ConnLink = mysql_connect("localhost", "root", "") or die("Connection failed");
$database = mysql_select_db("TravelGo") or die("Database selection failed");

$images = array(
    '34' => 'indian.jpg',
    '35' => 'sushi.jpg',
    '36' => 'burger.jpg',
    '37' => 'pizza.jpg',
    '38' => 'thai.jpg',
    '39' => 'steak.jpg',
    '40' => 'mediterranean.jpg',
    '41' => 'vegetarian.jpg',
    '42' => 'mexican.jpg',
    '43' => 'seafood.jpg'
);

$imagePath = "http://localhost/TravelGO/images/";

foreach ($images as $restaurantId => $imageName) {
    $imageData = file_get_contents($imagePath . $imageName);
    $query = "UPDATE restaurant SET restaurant_image = '" . mysql_real_escape_string($imageData) . "' WHERE restaurant_id = " . $restaurantId;
    mysql_query($query);
}

echo "Restaurant images updated successfully.";
?>
