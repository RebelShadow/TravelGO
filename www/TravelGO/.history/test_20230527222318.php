<?php
    $ConnLink = mysql_connect("localhost", "root", "") or die("Connection failed");
    $database = mysql_select_db("TravelGo") or die("Database selection failed");
    $imagePath = "http://localhost/TravelGO/images/mediteranean.jpg";
    $imageData = file_get_contents($imagePath);
    $query = "UPDATE restaurant SET restaurant_image = '" . mysql_real_escape_string($imageData) . "' WHERE restaurant_id = 40";
    mysql_query($query);
?>