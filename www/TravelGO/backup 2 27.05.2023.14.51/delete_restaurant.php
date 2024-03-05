<!DOCTYPE html>
<html>
<head>
    <title>Delete Restaurant</title>
</head>
<body>
    <h2>Delete Restaurant</h2>
    <form method="post" action="http://localhost/TravelGo/delete_restaurant_php.php">
        <label for="restaurant">Select a restaurant:</label>
        <select name="restaurant" id="restaurant">
            <!-- Populate the dropdown options dynamically using PHP -->
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "TravelGo";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve the list of restaurants from the database
            $sql = "SELECT restaurant_id, restaurant_name FROM restaurant";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $restaurantId = $row["restaurant_id"];
                    $restaurantName = $row["restaurant_name"];
                    echo "<option value='$restaurantId'>$restaurantName</option>";
                }
            }

            // Close the connection
            $conn->close();
            ?>
        </select>
        <button type="submit">Delete</button>
    </form>
</body>
</html>
