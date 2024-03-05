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
    <form method="post" action="http://localhost/TravelGO/delete_reviews_php.php">
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

        <label for="review">Select a review:</label>
        <select name="review" id="review">
            <!-- Options will be dynamically populated here -->
        </select>

        <button type="submit">Delete</button>
    </form>

    <script>
        // Get the review dropdown element
        var reviewDropdown = document.getElementById("review");

        // Add an event listener to the restaurant dropdown
        document.getElementById("restaurant").addEventListener("change", function() {
            // Clear the review dropdown
            reviewDropdown.innerHTML = "";

            // Get the selected restaurant ID
            var restaurantId = this.value;

            // Make an AJAX request to fetch the reviews for the selected restaurant
var xhr = new XMLHttpRequest();
xhr.open("GET", "http://localhost/TravelGO/get_reviews.php?restaurantId=" + restaurantId, true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Parse the response JSON data
                    var reviews = JSON.parse(xhr.responseText);

                    // Populate the review dropdown with the retrieved data
                    reviews.forEach(function(review) {
                        var option = document.createElement("option");
                        option.value = review.review_id;
                        option.text = review.title;
                        reviewDropdown.appendChild(option);
                    });
                }
            };
            xhr.send();
        });
    </script>
</body>
</html>
