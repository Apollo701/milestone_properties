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
                padding: 2%;
                background-color:#e5e5e5;
                border-radius: 10px; 
            }
            .navbar-brand{
            font-family: 'Crimson Text', serif;
        }
            .transbox{
                background:rgba(0, 0, 0, .07);
                border-radius: 10px; 
                box-shadow: 1px 7px 36px -5px;
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
                <div class="col-sm-3">
                <ol class="breadcrumb text-left">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Listings: <?php echo $_POST["usersearch"];?></li>
                    </ol>
                </div>
                <div class="col-sm-6 text-center">
                    <h2>Showing <?php echo number_of_listings($results); ?> Results for:<br> <?php echo '"' . $_POST["usersearch"]. '"'; ?> </h2>
                </div>
            </div>
                    <div class="row center-block">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4 text-center">
                    <form action="listing.php" method="post">
                        <div class="input-group input-group-md">
                            <input name="usersearch" type="text" class="center-block form-control input-md" title="Enter search query" value="<?php echo $_POST["usersearch"]  ?>">
                            <span class="input-group-btn"><button class="btn btn-md btn-primary" type="submit">Search</button></span>
                        </div>
                    </form>
                           </div>
                        </div>
            <br>   
        </div>
        
<div class="container bottom-container transbox">
    <div class="row center-block">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 text-center">
            Sort results by:
  <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
    ------------- <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="listing.php">price: low to high</a></li>
    <li><a href="listing.php">price: high to low</a></li>
    <li><a href="listing.php">walkscore: high to low</a></li>
    <li><a href="listing.php">SqFt high to low</a></li>
  </ul>
    </div>
        <div class="col-sm-4"></div>
    </div>
    <br><br>
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