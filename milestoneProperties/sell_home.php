<?php include 'navbar.php';    ?>
<?php include_once 'functions.php'; ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <title>Listings Page</title>
    </head>
    <body>
        
        <div class="jumbotron">
            <div class="container text-center">
                    <h1>Search Results</h1>
                    <p>For x/y Results</p>
                        
            </div>
            </div>
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-default"><ul class="nav navbar-nav">
                    <li><a href="#">Filters</a></li>
                    <li><a href="#">Filters</a></li>
                    <li><a href="#">Price</a></li>
                    <li><a href="#">SqFt</a></li>
                    <li><a href="#">Walkscore</a></li>
            </ul></nav>
            </div>
            <div class="row">
                <div class="col-md-2">
                <ul class="nav nav-pills nav-stacked" role="tablist">
                    <li role="presentation"><a href="#">Min Price</a></li>
                    <li role="presentation"><a href="#">Max Price</a></li>
                    <li role="presentation"><a href="#">Walkscore</a></li>
                    <li role="presentation"><a href="#">SqFt</a></li>
                    <li role="presentation"><a href="#">Bedrooms</a></li>
                    <li role="presentation"><a href="#">Bathrooms</a></li>
                    <li role="presentation"><a href="#">Schools</a></li>
                </ul>
                </div>
                <div class="col-md-4">
                    <?php
        $connection = connect_to_mysql();
        $results = milestone_search($connection);
        display_search_results($results);
        
        close_mysql_connection($connection);
        ?>
                    
                </div>
                <div class="col-md-3">
                    <ul>
                        <li>Address</li>
                        <li>Square Feet</li>
                        <li>Schools Nearby</li>
                        <li>Bedrooms</li>
                        <li>Bathrooms</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul>
                        <li>Price</li>
                        <li>Walkscore</li>
                        <li>Schools Nearby</li>
                        <li>Details</li>
                    </ul>
                </div>
            </div>
        </div>
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </body>
</html>