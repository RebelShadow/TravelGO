<!DOCTYPE html>
<html>
<head>
    <title>Delete User</title>
</head>
<body>
    <h2>Delete User</h2>
    <form method="post" action="http://localhost/TravelGo/delete_user_php.php">
        <label for="user">Select a user:</label>
        <select name="user" id="user">
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

            // Retrieve the list of users from the database
            $sql = "SELECT user_id, username FROM user";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $userId = $row["user_id"];
                    $username = $row["username"];
                    echo "<option value='$userId'>$username</option>";
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
