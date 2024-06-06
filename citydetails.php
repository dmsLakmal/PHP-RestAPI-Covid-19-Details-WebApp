<?php

$country_name = $_GET['countryname'];
$city_name = $_GET['cityname'];

// Fetch country data from the REST Countries API
$country_data = json_decode(file_get_contents("https://restcountries.com/v3.1/name/" . $country_name), true);

function callApi($query)
{
    $url = "https://city-and-state-search-api.p.rapidapi.com/search?q=" . $query;
    $headers = [
        'X-RapidAPI-Key: 1bff39057amshae532404e794633p155345jsn47b232895229',
        'X-RapidAPI-Host: city-and-state-search-api.p.rapidapi.com'
    ];
    
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($curl);
    $error = curl_error($curl);
    curl_close($curl);

    if ($error) {
        return ['error' => $error];
    }

    return json_decode($response, true);
}

$city_data = callApi($city_name);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <!-- Header section -->
    <div id="header" class="bg-dark text-white text-center py-2">
    COVID-19 DETAILS
    </div>

    <!-- Navigation section -->
    <div class="text-end p-3">
        <a href="home.php" class="l1 mx-2" style="font-size: 16px;">Home</a>
        <a href="country.php" class="l1 mx-2" style="font-size: 16px;">Country & City</a>
        <a href="covid19.php" class="l1 mx-2" style="font-size: 16px;">Europe</a>
        <a href="covid19chart.php" class="l1 mx-2" style="font-size: 16px;">CovidChart</a>
        <a href="covid19save.php" class="l1 mx-2" style="font-size: 16px;">CovidGlobalInfo</a>
    </div>

    <!-- Container for displaying city information -->
    <div class="container">
        <div>
            <h2 class="text-center">City Information</h2>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">City ID</th>
                            <td><?php echo htmlspecialchars($city_data[0]['id']); ?></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">City Name</th>
                            <td><?php echo htmlspecialchars($city_data[0]['name']); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Country Name</th>
                            <td><?php echo htmlspecialchars($city_data[0]['country_name']); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Country Flag</th>
                            <td class="text-center">
                                <img src="<?php echo htmlspecialchars($country_data[0]['flags'][1]); ?>" alt="Country Flag" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

    <!-- Map container -->
    <div id="map" class="my-5" style="width: 100%; height: 500px;"></div>

    <!-- Initialize Google Maps and center the map based on the provided address -->
    <script>
        function initMap() {
            var geocoder = new google.maps.Geocoder();
            var mapOptions = {
                zoom: 10,
                center: { lat: 0, lng: 0 } // Default center (change as needed)
            };
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
            var address = "<?php echo htmlspecialchars($city_name); ?>";

            geocoder.geocode({ address: address }, function(results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                } else {
                    console.log("Geocode was not successful for the following reason: " + status);
                }
            });
        }

        // Load the Google Maps API
        function loadMap() {
            var script = document.createElement("script");
            script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyDyptA3QXp6-LhbF_5phg_Tqqr6I7dwrPA&callback=initMap";
            document.body.appendChild(script);
        }

        loadMap();
    </script>
</body>
</html>
