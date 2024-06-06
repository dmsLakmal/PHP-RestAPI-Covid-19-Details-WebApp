<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    
    <!-- Main content section -->
    <div class="row my-5">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <a href="country.php" class="l1 text-decoration-none d-block my-3">Country Information (Asia) AND City Search</a>
                    <hr>
                    <a href="covid19.php" class="l1 text-decoration-none d-block my-3">COVID-19 Europe</a>
                    <hr>
                    <a href="covid19chart.php" class="l1 text-decoration-none d-block my-3">COVID-19 Europe - Chart</a>
                    <hr>
                    <a href="covid19save.php" class="l1 text-decoration-none d-block my-3">COVID-19 Global Information</a>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    
    <!-- Footer section -->
    <div id="footer" class="text-center text-dark" style="font-size: 11px; position: fixed; bottom: 10px; width: 100%;">
        All Rights Reserved © 2023
    </div>
</body>
</html>
