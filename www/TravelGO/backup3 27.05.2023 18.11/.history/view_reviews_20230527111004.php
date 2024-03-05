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
$sql = "SELECT r.review_id, r.title, r.stars, r.body, r.created_at, u.username FROM review r
        INNER JOIN user u ON r.user_id = u.user_id";
$result = $conn->query($sql);

// Check if any reviews were found
if ($result->num_rows > 0) {
    echo "<h2>Review List</h2>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $reviewId = $row["review_id"];
        $title = $row["title"];
        $stars = $row["stars"];
        $body = $row["body"];
        $createdAt = $row["created_at"];
        $username = $row["username"];

        echo "Review ID: $reviewId<br>";
        echo "Title: $title<br>";
        echo "Stars: $stars<br>";
        echo "Body: $body<br>";
        echo "Created At: $createdAt<br>";
        echo "Username: $username<br>";
        echo "<br>";
    }
} else {
    echo "No reviews found.";
}

// Close the connection
$conn->close();
?>
