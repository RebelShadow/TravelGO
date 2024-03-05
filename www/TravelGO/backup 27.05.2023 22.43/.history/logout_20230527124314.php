<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
</head>
<body>
    <h2>Logout</h2>
    <button onclick="logout()">Logout</button>

    <script>
        function logout() {
            // Make an AJAX request to the logout PHP page
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "http://localhost/TravelGO/logout.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Redirect to index.html after session termination
                    window.location.href = "http://localhost/TravelGO/index.html";
                }
            };
            xhr.send();
        }
    </script>
</body>
</html>
