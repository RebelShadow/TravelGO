<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TravelGo";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the delete form was submitted
if (isset($_POST["delete"])) {
    $restaurantId = $_POST["restaurantId"];

    // Validate the selected restaurant ID
    if (!empty($restaurantId)) {
        // Prepare the SQL statement to delete the restaurant
        $sql = "DELETE FROM restaurant WHERE restaurant_id = ?";
        $stmt = $conn->prepare($sql);

        // Bind the restaurantId parameter to the SQL statement
        $stmt->bind_param("i", $restaurantId);

        // Execute the deletion
        if ($stmt->execute()) {
            echo "Restaurant deleted successfully.";
        } else {
            echo "Error deleting restaurant: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Please select a restaurant.";
    }
}

// Fetch restaurant data from the database
$sql = "SELECT restaurant_id, restaurant_name FROM restaurant";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Delete Restaurant</title>
    <link rel="stylesheet" href="http://localhost/TravelGO/css/admin_styles.css">
</head>
<body>
    <div class="container">
        <div class="content" id="main-content">
            <h2>Delete Restaurant</h2>
            <p>Select a restaurant to delete:</p>
            <form action="" method="POST">
                <select name="restaurantId">
                    <?php
                    // Check if any restaurants were found
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row["restaurant_id"] . '">' . $row["restaurant_name"] . '</option>';
                        }
                    } else {
                        echo '<option value="" disabled selected>No restaurants found</option>';
                    }
                    ?>
                </select>
                <button type="submit" name="delete">Delete</button>
            </form>
            <div id="statusMessage">
                <?php
                if (isset($_POST["delete"])) {
                    // The deletion status message will be displayed here
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
