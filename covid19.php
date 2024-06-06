<!DOCTYPE html>
<html lang="en">

<head>
    <!--Link bootstrap file-->
    <meta charset="UTF-8">
    <title>COVID-19 Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- jQuery library is included to enable the use of jQuery functions and simplify JavaScript coding -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
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

    <!-- Container for COVID19 information in Europe -->
    <div class="container">
        <div>
            <h2 class="text-center" style="padding-top: 30px;">COVID19 Information in Europe</h2>
        </div>
        <div class="row">
            <div class="col-1">&nbsp;</div>
            <div class="col-8">
                <div class="clearfix">&nbsp;</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Country</th>
                            <th scope="col">Population</th>
                            <th scope="col">Total Covid Cases</th>
                            <th scope="col">Total Deaths</th>
                            <th scope="col">Tests</th>
                            <th scope="col">Continent</th>
                        </tr>
                    </thead>
                    <tbody id="records">
                        <!-- The COVID19 data for each country will be dynamically populated here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
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

        // Fetch COVID19 statistics from the API
        $.ajax(settings).done(function (response) {
            var html = "";
            // Iterate over each country's data in the response
            response.response.forEach(country => {
                if (country.continent == "Europe") {
                    // Create a table row with the country's COVID19 information
                    html +=
                        `<tr>
                            <td>${country.country}</td>
                            <td>${country.population}</td>
                            <td>${country.cases.total}</td>
                            <td>${country.deaths.total}</td>
                            <td>${country.tests.total}</td>
                            <td>${country.continent}</td>
                        </tr>`;
                }
            });
            // Append the rows to the table body with id "records"
            $("#records").html(html);
        });
    </script>
</body>

</html>
