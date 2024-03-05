<!DOCTYPE html>
<html>
<head>
    <title>Dropdown Example</title>
</head>
<body>
    <h2>Select a Restaurant</h2>
    <form>
        <label for="restaurant">Select a restaurant:</label>
        <select name="restaurant" id="restaurant">
            <!-- Options will be dynamically populated here -->
        </select>
    </form>

    <script>
        // Get the restaurant dropdown element
        var restaurantDropdown = document.getElementById("restaurant");

        // Make an AJAX request to fetch the restaurants
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "http://localhost/TravelGO/get_resviews.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Parse the response JSON data
                var restaurants = JSON.parse(xhr.responseText);

                // Populate the restaurant dropdown with the retrieved data
                restaurants.forEach(function(restaurant) {
                    var option = document.createElement("option");
                    option.value = restaurant.restaurant_id;
                    option.text = restaurant.restaurant_name;
                    restaurantDropdown.appendChild(option);
                });
            }
        };
        xhr.send();
    </script>
</body>
</html>
