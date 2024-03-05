<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Review</title>
</head>
<body>
    <h2>Delete Review</h2>
    <form method="post" action="delete_reviews_php.php">
        <label for="review">Select a review:</label>
        <select name="review" id="review">
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

            // Retrieve the list of reviews from the database
            $sql = "SELECT review_id, title FROM review";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $reviewId = $row["review_id"];
                    $title = $row["title"];
                    echo "<option value='$reviewId'>$title</option>";
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
