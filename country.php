<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Countries Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <!-- Header section -->
    <div id="header" class="bg-dark text-white text-center py-2" style="font-size: 20px;">
        Covid-19 Details
    </div>

    <!-- Navigation section -->
    <div class="text-end p-3">
        <a href="home.php" class="l1 mx-2" style="font-size: 16px;">Home</a>
        <a href="country.php" class="l1 mx-2" style="font-size: 16px;">Country & City</a>
        <a href="covid19.php" class="l1 mx-2" style="font-size: 16px;">Europe</a>
        <a href="covid19chart.php" class="l1 mx-2" style="font-size: 16px;">CovidChart</a>
        <a href="covid19save.php" class="l1 mx-2" style="font-size: 16px;">CovidGlobalInfo</a>
    </div>

    <!-- Main container -->
    <div class="container">
        <div>
            <h2 class="text-center my-4">Asian Countries</h2>
        </div>

        <?php
        $path = "https://restcountries.com/v3.1/region/asia";
        $data = json_decode(file_get_contents($path), true);
        ?>

        <!-- Table for displaying country details -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-primary">Flag</th>
                    <th class="text-primary">Country Name</th>
                    <th class="text-primary">Capital City</th>
                    <th class="text-primary">Region</th>
                    <th class="text-primary">Subregion</th>
                    <th class="text-primary">Currencies</th>
                    <th class="text-primary">Country Code</th>
                    <th class="text-primary">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $value): ?>
                    <?php if ($value['region'] === 'Asia'): ?>
                        <tr>
                            <td><img src="<?php echo htmlspecialchars($value['flags']['png']); ?>" width="50px" alt="Flag of <?php echo htmlspecialchars($value['name']['common']); ?>"></td>
                            <td><?php echo htmlspecialchars($value['name']['common']); ?></td>
                            <td>
                                <?php echo !empty($value['capital'][0]) ? htmlspecialchars($value['capital'][0]) : 'NULL'; ?>
                            </td>
                            <td><?php echo htmlspecialchars($value['region']); ?></td>
                            <td><?php echo htmlspecialchars($value['subregion']); ?></td>
                            <td>
                                <?php
                                foreach ($value['currencies'] as $currency) {
                                    echo htmlspecialchars($currency['name']) . " (" . htmlspecialchars($currency['symbol']) . ")<br>";
                                }
                                ?>
                            </td>
                            <td><?php echo htmlspecialchars($value['cca2']); ?></td>
                            <td><a class="btn btn-success" href="countrydetails.php?cid=<?php echo htmlspecialchars($value['cca2']); ?>">View</a></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <div class="text-center text-dark py-3" style="font-size: 11px;">All Rights Reserved © 2023</div>
</body>

</html>
