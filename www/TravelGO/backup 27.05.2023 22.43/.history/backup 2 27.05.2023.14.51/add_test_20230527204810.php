<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $specific = $_POST['specific'];
    $location = $_POST['location'];
    $openTime = $_POST['openTime'];
    $closeTime = $_POST['closeTime'];
    
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "TravelGo";
    
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO restaurant (restaurant_name, restaurant_specific, restaurant_location, restaurant_open_time, restaurant_close_time) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $specific, $location, $openTime, $closeTime);
    
    if ($stmt->execute()) {
        echo "Restaurant added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Restaurant</title>
</head>
<body>
    <h2>Add Restaurant</h2>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br><br>
        
        <label for="specific">Specific:</label>
        <input type="text" name="specific" id="specific"><br><br>
        
        <label for="location">Location:</label>
        <input type="text" name="location" id="location" required><br><br>
        
        <label for="openTime">Open Time:</label>
        <input type="time" name="openTime" id="openTime"><br><br>
        
        <label for="closeTime">Close Time:</label>
        <input type="time" name="closeTime" id="closeTime"><br><br>
        
        <input type="submit" value="Add Restaurant">
    </form>
</body>
</html>
