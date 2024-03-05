<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TravelGo";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to fetch restaurants from the database
$sql = "SELECT `restaurant_id`, `restaurant_name`, `restaurant_specific`, `restaurant_location`, `restaurant_open_time`, `restaurant_close_time` FROM `restaurant`";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if any restaurants were found
if (mysqli_num_rows($result) > 0) {
    // Output each restaurant
    while ($row = mysqli_fetch_assoc($result)) {
        echo 'Restaurant ID: ' . $row["restaurant_id"] . '<br>';
        echo 'Restaurant Name: ' . $row["restaurant_name"] . '<br>';
        echo 'Restaurant Specific: ' . $row["restaurant_specific"] . '<br>';
        echo 'Restaurant Location: ' . $row["restaurant_location"] . '<br>';
        echo 'Restaurant Open Time: ' . $row["restaurant_open_time"] . '<br>';
        echo 'Restaurant Close Time: ' . $row["restaurant_close_time"] . '<br>';
        echo '<br>';
    }
} else {
    echo 'No restaurants found.';
}

// Close the database connection
mysqli_close($conn);
?>
