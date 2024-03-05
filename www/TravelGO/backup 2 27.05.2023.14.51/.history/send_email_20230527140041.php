<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $to = 'contact@travelgo.com';
    $subject = 'Contact Form Submission';
    $content = "Name: $name\nEmail: $email\nMessage: $message";
    $headers = "From: $email";
    
    if (mail($to, $subject, $content, $headers)) {
        echo "Email sent successfully.";
    } else {
        echo "Failed to send the email.";
    }
} else {
    echo "Invalid request.";
}
?>
