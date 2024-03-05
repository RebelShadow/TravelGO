<?php
$servername = "localhost";  // Replace with your server name
$username = "root";  // Replace with your database username
$password = "";  // Replace with your database password
$dbname = "TravelGo";  // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
    // Get the form inputs
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Prepare and execute the query
     $insertQuery = "INSERT INTO user (username, password, email) VALUES ('$name', '$password','$email')";
     $conn->query($insertQuery);

// Close the database connection
$conn->close();
?>

<!doctype html>
<html lang="en-US">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register - TravelGO</title>
  <link href="http://localhost/TravelGO/css/login.css" rel="stylesheet" type="text/css">
</head>

<body>
  <div class="container">
    <h2 class="logo accent-color">TravelGO</h2>
    <form class="form" action="" method="post">
      <h3>Create an Account</h3>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password"
          required>
      </div>
      <div class="form-group">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" name="confirm-password" class="form-control"
          placeholder="Confirm your password" required>
      </div>
      <button type="submit" class="btn accent-bg">Register</button>
      <p class="login-link">Already have an account? <a href="login.html" class="accent-color">Login</a></p>
    </form>
  </div>
</body>

</html>
