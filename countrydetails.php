<?php
// Get the country code from the URL parameter
$cid = $_GET['cid'];
// Construct the API URL for fetching country details
$path = "https://restcountries.com/v3.1/alpha/" . $cid;
// Fetch country details from the API and decode the JSON response
$data = json_decode(file_get_contents($path), true);
?>

<html>

<head>
    
    <meta charset="UTF-8">
    <title>Countries Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <!-- Header section -->
    <div id="header" class="bg bg-dark text text-white" style="text-align:center; height:50px; text-align:center; padding-top:10px;
        font-size: 20px;">COVID-19 DETAILS
    </div>
    <!-- Navigation section -->
    <div style="text-align: right; padding-right: 10px; padding-top: 25px  ">
        <a href="home.php" class="l1" style="font-size: 16px; margin-right: 10px; ">Home</a>
        <a href="country.php" class="l1" style="font-size: 16px; margin-right: 10px; ">Country&City</a>
        <a href="covid19.php" class="l1" style="font-size: 16px; margin-right: 10px; ">Europe</a>
        <a href="covid19chart.php" class="l1" style="font-size: 16px;margin-right: 10px; ">CovidChart</a>
        <a href="covid19save.php" class="l1" style="font-size: 16px; margin-right: 10px; ">CovidGlobalInfo</a>
    </div>

    <div class="container">
        <div>
            <h2 class="text-center">
                <?php echo $data[0]['name']["common"]; ?>
            </h2>
        </div>
        <div class="row">
            <div class="col-1">&nbsp;</div>
            <!-- This section contains the content for displaying the country details -->
            <div class="col-10">
                <div class="clearfix">&nbsp;</div>
                <table border="1" class="table table-striped">
                    <tr>
                        <td colspan="2" style="text-align: center">
                            <img src="<?php echo $data[0]['flags']['png']; ?>" />
                        </td>
                    </tr>

                    <tr><!-- Displaying the official name of the country -->
                        <th>Official Name </th>
                        <th>
                            <?php echo $data[0]['name']["official"]; ?>
                        </th>
                    </tr>

                    <tr><!-- Displaying the capital city of the country -->
                        <th>Capital </th>
                        <th>
                            <?php echo $data[0]['capital'][0]; ?>
                        </th>
                    </tr>

                    <tr><!-- Displaying the country code -->
                        <th>Code </th>
                        <th>
                            <?php echo $data[0]['cca2']; ?>
                        </th>
                    </tr>

                    <tr><!--Displaying the currencies and their symbols-->
                        <th>Currency </th>
                        <th>
                            <?php
                            foreach ($data[0]['currencies'] as $currency) {
                                echo $currency['name'] . " " . $currency['symbol'] . "<br>";
                            }
                            ?>
                        </th>
                    </tr>

                    <tr><!-- Displaying the subregion of the country -->
                        <th>Subregion </th>
                        <th>
                            <?php echo $data[0]['subregion']; ?>
                        </th>
                    </tr>

                    <tr><!-- Displaying the continent the country belongs to -->
                        <th>Continent </th>
                        <th>
                            <?php echo $data[0]['continents'][0]; ?>
                        </th>
                    </tr>

                    <tr><!--Displaying the languages spoken in the country-->
                        <th>Languages </th>
                        <th>
                            <?php
                            foreach ($data[0]['languages'] as $key => $value) {
                                echo $value . ",";
                            }
                            ?>
                        </th>
                    </tr>

                    <tr><!--Displaying the neighboring countries-->
                        <th>Borders </th>
                        <th>
                            <?php
                            foreach ($data[0]['borders'] as $key => $value) {
                                echo $value . ",";
                            }
                            ?>
                        </th>
                    </tr>

                    <tr><!--Displaying the population of the country-->
                        <th>Population </th>
                        <th>
                            <?php
                            echo $data[0]['population'];
                            ?>
                        </th>
                    </tr>

                    <tr><!--Displaying the area of the country-->
                        <th>Area</th>
                        <th>
                            <?php
                            echo $data[0]['area'];
                            ?>
                        </th>
                    </tr>

                </table>

            </div>

            <!-- Heading for the city information section -->
            <div>
                <h2 class="text-center">City Information</h2>
            </div>
            <div class="row">
                <div class="col-1">&nbsp;</div><!-- Creating some vertical space -->
                <div class="col-10">
                    <div class="clearfix">&nbsp;</div>
                    <table class="table table-striped">
                        <tr>
                            <th class="text-primary">Search City</th>
                            <th><input type="text" id="city_name" name="city_name" class="col-8"></th><!-- Input field to enter the city name -->
                        </tr>
                    </table>

                    <table class="table">
                        <thead>
                            <tr><!-- Column headings-->
                                <th scope="col">ID</th>
                                <th scope="col">City Name</th>
                                <th scope="col">State Name</th>
                                <th scope="col">Country</th>
                            </tr>
                        </thead>
                        <tbody id="cities">

                        </tbody>
                    </table>

                </div>

            </div>
        </div>

    </div>

    <!-- Include the jQuery library -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script>
        // Function triggered when the user types in the city name input field
        $('#city_name').keyup(function () {
            var cityName = $('#city_name').val();
            if (cityName && cityName !== "") {
                callApi(cityName);
            } else {
                $("#cities").empty();
            }

            // Function to call the API
            function callApi(query) {
                const settings = {
                    async: true,
                    crossDomain: true,
                    url: `https://city-and-state-search-api.p.rapidapi.com/search?q=${query}`,
                    method: 'GET',
                    headers: {
                        'X-RapidAPI-Key': '1bff39057amshae532404e794633p155345jsn47b232895229',
                        'X-RapidAPI-Host': 'city-and-state-search-api.p.rapidapi.com'
                    }
                };

                // AJAX request to fetch data from the API
                $.ajax(settings).done(function (response) {
                    // Extract the country code from PHP and store it in a variable
                    var cid = "<?php echo $data[0]['cca2']; ?>";

                    var html = "";
                    for (var i = 0; i < 5; i++) {
                        // Generate HTML for displaying the city results
                        html +=
                            `<tr>
                        <th scope="row">${response[i].id}</th>
                        <td>${response[i].name}</td>
                        <td>${response[i].state_code}</td>
                        <td>${response[i].country_name}</td>
                        <td><a class="btn btn-success" href="citydetails.php?countryname=${response[i].country_name}&cityname=${response[i].name}">City Details</a></td>
                    </tr>`;
                    }

                    // Clear the existing city rows and append the new HTML
                    $("#cities").empty();
                    $("#cities").append(html);
                });
            }
        });
    </script>

</body>

</html>

