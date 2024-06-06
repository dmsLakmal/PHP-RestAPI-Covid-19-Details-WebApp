<?php
    // Establish database connection
    $conn = new mysqli("localhost", "root", "", "covid");
    
    // Initialize cURL
    $curl = curl_init();
    
    // Set cURL options
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://covid-193.p.rapidapi.com/statistics",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: covid-193.p.rapidapi.com",
            "X-RapidAPI-Key: 9d03cb0a66msh714a7e7ae42861fp14f677jsn53686caf6983"
        ],
    ]);
    
    // Execute the cURL request
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    // Close the cURL session
    curl_close($curl);
    
    // Handle cURL errors
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        // Process the response data
        $data = json_decode($response, true);
        $x = $data['response']; // Assigning data to $x
    }
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Covid19 Information</title>
    <!--Link bootstrap file-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
          crossorigin="anonymous">
</head>

<body>
<!--    Header section-->
<div id="header" class="bg bg-dark text text-white text-center" style="height: 50px; padding-top: 10px; font-size: 20px;">
Covid-19 Details
</div>
<!--    Navigation section    -->
<div style="text-align: right; padding-right: 10px; padding-top: 25px;">
    <a href="home.php" class="l1" style="font-size: 16px; margin-right: 10px;">Home</a>
    <a href="country.php" class="l1" style="font-size: 16px; margin-right: 10px;">Country & City</a>
    <a href="covid19.php" class="l1" style="font-size: 16px; margin-right: 10px;">Europe</a>
    <a href="covid19chart.php" class="l1" style="font-size: 16px; margin-right: 10px;">CovidChart</a>
    <a href="covid19save.php" class="l1" style="font-size: 16px; margin-right: 10px;">CovidGlobalInfo</a>
</div>

<h1 style="text-align: center; padding-top: 25px;">COVID-19 Global Information</h1>

<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Country Name</th>
            <th>Population</th>
            <th>Total Covid Cases</th>
            <th>Total Deaths</th>
            <th>Tests</th>
            <th>Continent</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($x)) { // Check if $x is set before iterating
            foreach ($x as $value) {
                $cName = $value['country'];
                $population = $value['population'] ?? '0';
                $cases = $value['cases']['total'] ?? '0';
                $deaths = $value['deaths']['total'] ?? '0';
                $tests = $value['tests']['total'] ?? '0';
                $continent = $value['continent'] ?? 'NULL';
                $date = $value['day'];

                // Prepare the SQL query to insert data into the database
                $request = "INSERT INTO covidcases(countryName,population,totalcases,deaths,tests,continent,date) VALUES ('$cName','$population','$cases','$deaths','$tests','$continent','$date')";

                // Execute the SQL query
                $conn->query($request);
                ?>
                <tr>
                    <td><?php echo $cName; ?></td>
                    <td><?php echo $population; ?></td>
                    <td><?php echo $cases; ?></td>
                    <td><?php echo $deaths; ?></td>
                    <td><?php echo $tests; ?></td>
                    <td><?php echo $continent; ?></td>
                    <td><?php echo $date; ?></td>
                </tr>
            <?php
            }
        } else {
            echo "<tr><td colspan='7'>No data available</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
