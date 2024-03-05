<?php
session_start();  // Start the session

// Terminate the session
session_unset();
session_destroy();

// Redirect to index.html
header("Location: index.html");
exit();
?>
