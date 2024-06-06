<!DOCTYPE html>
<html lang="en">

<head>
    <!--Link bootstrap file-->
    <title>Home</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        #chart_div svg text {
            font-size: 11px !important;
        }
    </style>
    <!-- jQuery library for simplified DOM manipulation and AJAX interactions -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!-- Google Charts library for creating interactive charts and graphs -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
    <!-- Header section -->
    <div id="header" class="bg-dark text-white text-center py-2" style="font-size: 20px;">COVID-19 Details</div>
    <!-- Navigation section -->
    <div style="text-align: right; padding-right: 10px; padding-top: 25px;">
        <a href="home.php" class="l1" style="font-size: 16px; margin-right: 10px;">Home</a>
        <a href="country.php" class="l1" style="font-size: 16px; margin-right: 10px;">Country & City</a>
        <a href="covid19.php" class="l1" style="font-size: 16px; margin-right: 10px;">Europe</a>
        <a href="covid19chart.php" class="l1" style="font-size: 16px; margin-right: 10px;">CovidChart</a>
        <a href="covid19save.php" class="l1" style="font-size: 16px; margin-right: 10px;">CovidGlobalInfo</a>
    </div>
    <h4 class="ali text-center py-4">COVID19 Information in Europe - Bar Chart</h4>
    <!--Div that will hold the bar chart-->
    <div id="chart_div" style="align-items: center;"></div>
</body>

<script>
    // Function to make the API call
    function callApi() {
        return new Promise(function(resolve, reject) {
            const settings = {
                async: true,
                crossDomain: true,
                url: 'https://covid-193.p.rapidapi.com/statistics',
                method: 'GET',
                headers: {
                    'X-RapidAPI-Key': '1bff39057amshae532404e794633p155345jsn47b232895229',
                    'X-RapidAPI-Host': 'covid-193.p.rapidapi.com'
                }
            };

            // Make AJAX request to the API
            $.ajax(settings).done(function(response) {
                var data = [['Country', 'Cases']];

                // Iterate through the response data
                response.response.forEach(country => {
                    if (country.continent === "Europe") {
                        var countryData = [country.country, country.cases.total];
                        data.push(countryData);
                    }
                });

                // Resolve the promise with the data
                resolve(data);
            }).fail(function(jqXHR, textStatus, errorThrown) {
                reject(errorThrown); // Reject the promise with the error message
            });
        });
    }

    // Load Google Charts library and draw the chart
    google.charts.load('current', {
        packages: ['corechart', 'bar']
    });
    google.charts.setOnLoadCallback(function() {
        callApi().then(function(data) {
            drawTitleSubtitle(data); // Call the chart drawing function with the data
          }).catch(function(error) {
            console.log('Error:', error);
        });
    });

    // Function to draw the chart
    function drawTitleSubtitle(apiData) {
        var data = google.visualization.arrayToDataTable(apiData);

        var materialOptions = {
            chart: {
                title: 'COVID-19 Cases in European Countries',
                subtitle: 'Total Cases by Country'
            },
            hAxis: {
                title: 'Total Cases',
                textStyle: {
                    fontSize: 5 // Adjust the font size here
                },
                minValue: 0,
            },
            vAxis: {
                title: 'Country',
                textStyle: {
                    fontSize: 5 // Adjust the font size here
                }
            },
            bars: 'horizontal',
            height: apiData.length * 20, // Adjust the height based on the number of countries
            colors: ['#3366cc'], // Set a custom color for the bars
            legend: {
                position: 'none'
            } // Hide the legend
        };

        var materialChart = new google.charts.Bar(document.getElementById('chart_div'));
        materialChart.draw(data, materialOptions);
    }
</script>

</html>
