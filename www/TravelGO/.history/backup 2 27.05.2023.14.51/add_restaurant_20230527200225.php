<?php
$ConnLink = mysqli_connect("localhost", "root", "") or die("Connection failed");
$database = mysqli_select_db($ConnLink, "TravelGo") or die("Database selection failed");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form inputs
    $restaurantName = $_POST["restaurant_name"];
    $restaurantSpecific = $_POST["restaurant_specific"];
    $restaurantLocation = $_POST["restaurant_location"];
    $restaurantOpenTime = $_POST["restaurant_open_time"];
    $restaurantCloseTime = $_POST["restaurant_close_time"];

    // File upload handling
    $file = $_FILES["restaurant_image"];
    $fileTmpName = $file["tmp_name"];

    // Read the image data
    $imageData = file_get_contents($fileTmpName);

    // Prepare the update statement
    $stmt = mysqli_prepare($ConnLink, "UPDATE restaurant SET restaurant_image = ? WHERE restaurant_id = 15");
    mysqli_stmt_bind_param($stmt, "s", $imageData);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Restaurant image updated successfully
        mysqli_stmt_close($stmt);
        mysqli_close($ConnLink);

        $response = [
            'success' => true,
            'message' => 'Restaurant image updated successfully.'
        ];
    } else {
        // Error occurred while updating the restaurant image
        $response = [
            'success' => false,
            'message' => 'Error occurred while updating the restaurant image.'
        ];
    }

    echo json_encode($response);
} else {
    // Invalid request method
    $response = [
        'success' => false,
        'message' => 'Invalid request method.'
    ];

    echo json_encode($response);
}
?>
