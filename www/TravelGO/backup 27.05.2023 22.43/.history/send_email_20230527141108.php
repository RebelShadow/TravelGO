<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = 'contact@travelgo.com';
    $subject = 'Contact Form Submission';
    $content = "Name: $name\nEmail: $email\nMessage: $message";

    $mailToLink = "mailto:$to?subject=" . urlencode($subject) . "&body=" . urlencode($content);

    header("Location: $mailToLink");
    exit();
} else {
    echo "Invalid request.";
}
?>
