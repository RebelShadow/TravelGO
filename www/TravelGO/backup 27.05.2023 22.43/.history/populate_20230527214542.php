<?php

// Database connection details
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "travelgo";

// Create a PDO connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Generate sample user data
    $users = array(
        array(
            'username' => 'john_doe',
            'password' => 'password123',
            'email' => 'john.doe@example.com',
            'role' => 'user',
            'admin' => 0
        ),
        array(
            'username' => 'jane_smith',
            'password' => 'password456',
            'email' => 'jane.smith@example.com',
            'role' => 'user',
            'admin' => 0
        ),
        array(
            'username' => 'alexander_wang',
            'password' => 'password789',
            'email' => 'alexander.wang@example.com',
            'role' => 'user',
            'admin' => 0
        ),
        array(
            'username' => 'emily_davis',
            'password' => 'password123',
            'email' => 'emily.davis@example.com',
            'role' => 'user',
            'admin' => 0
        ),
        array(
            'username' => 'michael_wilson',
            'password' => 'password456',
            'email' => 'michael.wilson@example.com',
            'role' => 'user',
            'admin' => 0
        ),
        array(
            'username' => 'sarah_johnson',
            'password' => 'password789',
            'email' => 'sarah.johnson@example.com',
            'role' => 'user',
            'admin' => 0
        ),
        array(
            'username' => 'david_thompson',
            'password' => 'password123',
            'email' => 'david.thompson@example.com',
            'role' => 'user',
            'admin' => 0
        ),
        array(
            'username' => 'olivia_brown',
            'password' => 'password456',
            'email' => 'olivia.brown@example.com',
            'role' => 'user',
            'admin' => 0
        ),
        array(
            'username' => 'james_jackson',
            'password' => 'password789',
            'email' => 'james.jackson@example.com',
            'role' => 'user',
            'admin' => 0
        ),
        array(
            'username' => 'sophia_miller',
            'password' => 'password123',
            'email' => 'sophia.miller@example.com',
            'role' => 'user',
            'admin' => 0
        ),
        array(
            'username' => 'benjamin_taylor',
            'password' => 'password456',
            'email' => 'benjamin.taylor@example.com',
            'role' => 'user',
            'admin' => 0
        ),
        array(
            'username' => 'mia_anderson',
            'password' => 'password789',
            'email' => 'mia.anderson@example.com',
            'role' => 'user',
            'admin' => 0
        ),
        array(
            'username' => 'ethan_thomas',
            'password' => 'password123',
            'email' => 'ethan.thomas@example.com',
            'role' => 'user',
            'admin' => 0
        ),
        array(
            'username' => 'ava_martin',
            'password' => 'password456',
            'email' => 'ava.martin@example.com',
            'role' => 'user',
            'admin' => 0
        ),
        array(
            'username' => 'william_clark',
            'password' => 'password789',
            'email' => 'william.clark@example.com',
            'role' => 'user',
            'admin' => 0
        ),
        array(
            'username' => 'amelia_rodriguez',
            'password' => 'password123',
            'email' => 'amelia.rodriguez@example.com',
            'role' => 'user',
            'admin' => 0
        ),
        array(
            'username' => 'lucas_lee',
            'password' => 'password456',
            'email' => 'lucas.lee@example.com',
            'role' => 'user',
            'admin' => 0
        ),
        array(
            'username' => 'mia_hernandez',
            'password' => 'password789',
            'email' => 'mia.hernandez@example.com',
            'role' => 'user',
            'admin' => 0
        ),
        array(
            'username' => 'jacob_nguyen',
            'password' => 'password123',
            'email' => 'jacob.nguyen@example.com',
            'role' => 'user',
            'admin' => 0
        ),
        array(
            'username' => 'lily_garcia',
            'password' => 'password456',
            'email' => 'lily.garcia@example.com',
            'role' => 'user',
            'admin' => 0
        )
    );

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO user (username, password, email, role, admin, created_at) VALUES (:username, :password, :email, :role, :admin, NOW())");

    foreach ($users as $user) {
        $stmt->execute($user);
    }

    echo "User data populated successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn = null;

?>
