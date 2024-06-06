<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Countries and City Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        /* Custom styles */
        .header {
            background-color: #343a40;
            color: white;
            font-size: 20px;
            padding: 10px;
            text-align: center;
        }

        .navigation {
            text-align: end;
            padding: 15px;
        }

        .footer {
            font-size: 11px;
            padding: 15px;
            text-align: center;
        }
    </style>
</head>

<body>
    
    <div class="header">
    COVID-19 DETAILS
    </div>

    <!-- Navigation section -->
    <div class="navigation">
        <a href="home.php" class="mx-2">Home</a>
        <a href="country.php" class="mx-2">Country & City</a>
        <a href="covid19.php" class="mx-2">Europe</a>
        <a href="covid19chart.php" class="mx-2">CovidChart</a>
        <a href="covid19save.php" class="mx-2">CovidGlobalInfo</a>
    </div>

    <div class="container">
        <div>
            <h2 class="text-center">City Information</h2>
        </div>
        <div class="row">
            <div class="col-1">&nbsp;</div>
            <div class="col-10">
                <div class="clearfix">&nbsp;</div>
                <!-- Form for searching city -->
                <form method="get" action="coviddetails.php">
                    <div class="mb-3">
                        <label for="countryname" class="form-label">Country Name</label>
                        <input type="text" class="form-control" id="countryname" name="countryname" required>
                    </div>
                    <div class="mb-3">
                        <label for="cityname" class="form-label">City Name</label>
                        <input type="text" class="form-control" id="cityname" name="cityname" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        All Rights Reserved © 2023
    </div>

</body>

</html>
