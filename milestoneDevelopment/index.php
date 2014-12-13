<?php include 'navbar.php'; ?>
<?php include 'login_modal.php'; ?>
<?php include 'signup_modal.php'; ?>
<?php include_once 'functions.php'; ?>
<!DOCTYPE>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/custom.css">

        <title>Milestone Properties</title>
        <style>
            .bgc-fff{
                background-color: #f8f8f8;
            }
            #footer{
                display: inline;
                padding: 50px;
            }
            h1{
                font-family: 'Helvetica Neue', serif;
                font-weight: lighter;
                font-size: 52px;

            }
            #index{
                padding-top:50px;
                background: url('assets/bg_images/bg2.jpg');
/*                height: 300px;*/
                width: 66%;
                border-radius: 10px;
                /*            width: 73%;*/
            }
            .row{
                padding: 1%;
            }
            .welcome{
                font-family: 'Helvetica Neue', serif;
                font-weight: lighter;
                color: white;
                font-size: 52px;

            }
            .welcome-paragraph{
                font-family: 'Helvetica Neue', serif;
                font-weight: lighter;
                color: white;
            }
            .navbar-brand, .nav{
                font-family: 'Helvetica Neue', serif;
                font-weight: lighter;

            }
            .transbox{
                background:rgba(0, 0, 0, .5);
                padding: 4%;
                border-radius: 10px; 
                box-shadow: 1px 7px 36px -5px
            }
            .bottom-container{
                
                padding: 1%;
                border-radius: 10px; 
            }

        </style>
    </head>
    <body>

        <div class="container" id="index">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6 text-center">
                    <div class="transbox">
                        <h2 class="welcome">Milestone Properties</h2>
                        <h3 class="welcome-paragraph text-center">Find your dream home today</h3>
                        <br>
                        <form action="listing.php" method="post">
                            <div class="input-group input-group-md">
                                <input name="usersearch" type="text" class="center-block form-control input-md" title="Enter search query" placeholder="Enter state, city, or zip code...">
                                <span class="input-group-btn"><button class="btn btn-md btn-primary" type="submit">Search Homes</button></span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div> 
        </div>

        <div class="container-full bottom-container">
            <div class="container container-pad" id="property-listings">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center">Milestone Property Featured Homes</h1>
                        <br>

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <?php
                        $connection = connect_to_mysql();
                        $results = featured_properties($connection);
                        if ($results != "") {
                            $row = mysqli_fetch_array($results);
                        } else {
                            echo "<br><br><br><h2>Must enter valid input</h2>";
                            die();
                        }
                        ?>
                        <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing" style="overflow:hidden;">
                            <div class="media">
                                <a class="pull-left" href="#" target="_parent">
                                    <?php
                                    $rand_num = rand(1, 3);
                                    $img_name1 = $row["image" . $rand_num];
                                    $img_path = 'http://sfsuswe.com/~f14g02/assets/home_images/home' . $row["id"] . '/small/' . $img_name1;
                                    ?>
                                    <img class="img-responsive" style="margin-top:9%;" src="<?php echo '' . $img_path . ''; ?>"/></a>

                                <div class="clearfix visible-sm"></div>

                                <div class="media-body fnt-smaller">
                                    <a href="#" target="_parent"></a>

                                    <h3 class="media-heading">
                                        <a href="#" target="_parent">$<?php echo '' . number_format($row["price"]) . '</a><small class="pull-right"><i>' . $row["address"] . ''; ?></i></small></h3>
                                    <p><small class="pull-right"><?php echo '' . $row["city"] . ", " . $row["us_state"] . ", " . $row["zip_code"] . ''; ?></small></p>

                                    <br>
                                    <ul class="list-inline mrg-0 btm-mrg-10 clr-535353 pull-right">
                                        <li><?php echo '' . $row["sq_ft"] . ''; ?> SqFt</li>

                                        <li style="list-style: none">|</li>

                                        <li><?php echo '' . $row["num_bedrooms"] . ''; ?> Beds</li>

                                        <li style="list-style: none">|</li>

                                        <li><?php echo '' . $row["num_bathrooms"] . ''; ?> Baths</li>
                                    </ul>
                                    <br><br>
                                    <p class="hidden-xs"><?php echo '' . substr($row["description"], 0, 120) . ''; ?>...</p>
                                    <div class="btn-toolbar pull-right">
                                        <form action="home_details.php" method="get">
                                            <button type="button" class="btn btn-default btn-sm">
                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
                                            </button>
                                            <button name="details" type="submit" value="<?php echo '' . $row[0] . ''; ?>" class="btn btn-success btn-sm">Details</button>

                                        </form>

                                    </div>
                                    <br>
                                    <span class="fnt-smaller fnt-lighter fnt-arial">Milestone Properties&copy</span>
                                </div>
                            </div>
                        </div>
                        <?php
                        close_mysql_connection($connection);
                        ?>

                    </div>
                    <div class="col-sm-6">  
                        <?php
                        $connection = connect_to_mysql();
                        $results = featured_properties($connection);
                        if ($results != "") {
                            $row = mysqli_fetch_array($results);
                        } else {
                            echo "<br><br><br><h2>Must enter valid input</h2>";
                            die();
                        }
                        ?>
                        <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing" style="overflow:hidden;">
                            <div class="media">
                                <a class="pull-left" href="#" target="_parent">
                                    <?php
                                    $rand_num = rand(1, 3);
                                    $img_name2 = $row["image" . $rand_num];
                                    $img_path = 'http://sfsuswe.com/~f14g02/assets/home_images/home' . $row["id"] . '/small/' . $img_name2;
                                    ?>
                                    
                                    <img class="img-responsive" style="margin-top:9%;" src="<?php echo '' . $img_path . ''; ?>"/></a>

                                <div class="clearfix visible-sm"></div>

                                <div class="media-body fnt-smaller">
                                    <a href="#" target="_parent"></a>

                                    <h3 class="media-heading">
                                        <a href="#" target="_parent">$<?php echo '' . number_format($row["price"]) . '</a><small class="pull-right"><i>' . $row["address"] . ''; ?></i></small></h3>
                                    <p><small class="pull-right"><?php echo '' . $row["city"] . ", " . $row["us_state"] . ", " . $row["zip_code"] . ''; ?></small></p>

                                    <br>
                                    <ul class="list-inline mrg-0 btm-mrg-10 clr-535353 pull-right">
                                        <li><?php echo '' . $row["sq_ft"] . ''; ?> SqFt</li>

                                        <li style="list-style: none">|</li>

                                        <li><?php echo '' . $row["num_bedrooms"] . ''; ?> Beds</li>

                                        <li style="list-style: none">|</li>

                                        <li><?php echo '' . $row["num_bathrooms"] . ''; ?> Baths</li>
                                    </ul>
                                    <br><br>
                                    <p class="hidden-xs"><?php echo '' . substr($row["description"], 0, 120) . ''; ?>...</p>
                                    <div class="btn-toolbar pull-right">
                                        <form action="home_details.php" method="get">
                                            <button type="button" class="btn btn-default btn-sm">
                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
                                            </button>
                                            <button name="details" type="submit" value="<?php echo '' . $row[0] . ''; ?>" class="btn btn-success btn-sm">Details</button>

                                        </form>

                                    </div>
                                    <br>
                                    <span class="fnt-smaller fnt-lighter fnt-arial">Milestone Properties&copy</span>
                                </div>
                            </div>
                        </div>
                        <?php
                        close_mysql_connection($connection);
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br>
    <div class="container container-fluid text-center" style="background-color: #e7e7e7; border-color: #777; width: 100%; position: absolute;left: 0;right: 0">
        <ul>
            <li id="footer"><a href="./contact.php"style="color:#777">Contact Us</a></li>
            <li id="footer"><a href="./about.php" style="color:#777">About Us</a></li>
        </ul>
            <p class="navbar-text navbar-right" style="margin-right: 15px;">This is for demonstration purposes only. CSC648/848 San Francisco State University Team02 Milestone Properties&copy</p>
        
    </div>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/script.js"></script>
    </body>  
</html>