<?php include 'navbar.php';    ?>
<?php include_once 'functions.php'; ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Crimson+Text' rel='stylesheet' type='text/css'>
        <title>Listings Page</title>
        <style>
            .breadcrumb{
                background: none;
                text-align: left;
            }
            .top-container{
                margin-top: 80px;
/*                background-color:#e5e5e5;*/
                border-radius: 10px; 
                
            }
            .bottom-container{
                margin-top: 40px;
                background-color:#e5e5e5;
                border-radius: 10px; 
            }
            .navbar-brand{
            font-family: 'Crimson Text', serif;
        }
            .transbox{
                background:rgba(0, 0, 0, .07);
                padding: 4%;
                border-radius: 10px; 
                box-shadow: 1px 7px 36px -5px
        }
        </style>
    </head>
    <body>
        <?php
        $connection = connect_to_mysql();
        $results = milestone_search($connection);
        ?>
        
            
        <div class="container top-container transbox">
             
            <div class="row">
                <div class="col-sm-4">
                <ol class="breadcrumb text-left">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php">Search</a></li>
                        <li class="active">Listings</li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <h2>Showing <?php echo number_of_listings($results); ?> Results for <?php echo '"' . $_POST["usersearch"]. '"'; ?> </h2>
                    <br>
                    <form action="listing.php" method="post">
                        <div class="input-group input-group-md">
                            <input name="usersearch" type="text" class="center-block form-control input-md" title="Enter search query" placeholder="<?php echo $_POST["usersearch"]  ?>">
                            <span class="input-group-btn"><button class="btn btn-md btn-primary" type="submit">Search Homes</button></span>
                        </div>
                    </form>   
                
                    
            </div>
                <div class="col-sm-3"></div>
            </div>
        
        </div>
            
<!--            <div class="row">
                <div class="col-md-5">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php">Search</a></li>
                        <li class="active">Listings</li>
                    </ol>
                </div>
                <div class="col-md-7 text-left">
                    <h2>Search Results</h2>
                    <p>For X results</p>
                </div>
            </div>-->
<div class="container bottom-container">
<!--            <div class="row">
                <div class="container">
                <nav class="navbar navbar-default">
                    <ul class="nav navbar-nav">
                    <li><a href="#">Price</a></li>
                    <li><a href="#">SqFt</a></li>
                    <li><a href="#">Walkscore</a></li>
                    </ul>
                </nav>
                </div>
            </div>-->
<div class="row">
<!--                <div class="col-md-6">-->
                    <?php
        display_search_results($results);
        
        close_mysql_connection($connection);
        ?>
                    
<!--                </div>-->
<!--                <div class="col-md-3">
                    <ul>
                        <li>Address</li>
                        <li>Square Feet</li>
                        <li>Schools Nearby</li>
                        <li>Bedrooms</li>
                        <li>Bathrooms</li>
                    </ul>
                </div>-->
<!--                <div class="col-md-3">
                    <ul>
                        <li>Price</li>
                        <li>Walkscore</li>
                        <li>Schools Nearby</li>
                        <li>Details</li>
                    </ul>
                </div>-->
    </div>
            </div>
                <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </body>
</html>