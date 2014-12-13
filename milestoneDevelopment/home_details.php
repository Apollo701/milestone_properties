<?php session_start();
include 'navbar.php'; ?>
<?php include 'login_modal.php'; ?>
<?php include 'signup_modal.php'; ?>
<?php include_once 'functions.php'; ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <title>Home Details</title>
        <style>
            .brdr {
                border: 1px solid #ededed;
                height: 500px!important;
            }
            #footer{
                display: inline;
                padding: 50px;
            }
            @media only screen and (min-width: 992px) {
                #property-listings .property-listing img {
                    max-width: 100%;
                    margin-top:3%;
                }
            }
            .breadcrumb{
                background: none;
                text-align: left;
            }
            .navbar-brand{
                font-family: 'Crimson Text', serif;
            }
            .top-container{
                margin-top: 70px;
                /*                background-color:#e5e5e5;*/
                border-radius: 10px; 

            }
            .transbox{
                background:rgba(0, 0, 0, .07);
                border-radius: 4px;
                -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2), 0 1px 0px rgba(0, 0, 0, 0.1);
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2), 0 1px 0px rgba(0, 0, 0, 0.1);
            }
            h2{
                margin-top: 3%;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <?php
        $connection = connect_to_mysql();
        $results = milestone_details($connection);
        static $row;
        
        if ($results != "") {
            $row = mysqli_fetch_array($results);
        } else {
            echo "<br><br><br><h2>Must enter valid input</h2>";
            die();
        }
        
        if(isset($_POST['bookmark'])) {
            bookmark_listing();
        }
        ?>


        <div class="container-full top-container" style="">
            <div class="container container-pad transbox" id="property-listings">
                <div class="row">
                    <div class="col-md-12">
                        <h1 style="font-family: 'Helvetica Neue', serif;
                font-weight: lighter;"><?php echo "" . $row["address"] . ", " . $row["city"] . ", " . $row["us_state"] . " " . $row["zip_code"]; ?></h1>
                        
                        <br>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-md-12">
                        <div class="transbox brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing" style="overflow:hidden;">
                            <div class="media center-block">
                                <a class="pull-left" href="#" target="_parent">

                                    <?php $img_name = $row["image1"]; ?>
                                    <?php $img_path = 'http://sfsuswe.com/~f14g02/assets/home_images/home' . $row["id"] . "/small/" . $img_name; ?>
                                    
                                    <img class="img-responsive" src="<?php echo $img_path; ?>" /></a>
                                    

                                    <h1 class="media-heading">
                                        
                                        <a href="#" target="_parent">$<?php echo '' . number_format($row["price"]) . ''; ?></a></h1>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="block-center">
                                    <ul class="list-inline mrg-0 btm-mrg-10 clr-535353 pull-right">
                                        <li><?php echo '' . $row["sq_ft"] . ''; ?> SqFt</li>

                                        <li style="list-style: none">|</li>

                                        <li><?php echo '' . $row["num_bedrooms"] . ''; ?> Beds</li>

                                        <li style="list-style: none">|</li>

                                        <li><?php echo '' . $row["num_bathrooms"] . ''; ?> Baths</li>
                                        
                                        <li style="list-style: none">|</li>

                                        <li><?php echo '' . $row["num_garages"] . ''; ?> Garages</li>
                                        
                                        <li style="list-style: none">|</li>

                                        <li><?php echo '' . $row["walkscore"] . ''; ?> Walkscore</li>
                                    </ul>
                                    </div>
                                    <br><br><br><br><br><br>
                                    <p class="hidden-xs"><?php echo '' . $row["description"] . ''; ?></p>
                                    <br><br><br>
                                    <div class="btn-toolbar pull-right">
                                        <form action="home_details.php?details=<?php echo $row[0] ?>" method="post">
                                            <button type="button" name="bookmark" class="btn btn-default btn-sm">
                                                <span class="glyphicon glyphicon-star" value="<?php echo '' . $row[0] . ''; ?>" aria-hidden="true"></span> Star
                                            </button>
                                        </form>
                                        <form action="contact_realtor.php" method="post">
                                            <button name="contact" type="submit" value="<?php echo '' . $row[0] . ''; ?>" class="btn btn-success btn-sm">Contact A Realtor</button>

                                        </form>

                                    </div>
                                    <br>
                                    <span class="fnt-smaller fnt-lighter fnt-arial pull-right">Milestone Properties&copy</span>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
            <div class="container container-fluid text-center" style="background-color: #e7e7e7; border-color: #777; width: 100%; position: absolute;left: 0;right: 0">
        <ul>
            <li id="footer"><a href="./contact.php"style="color:#777">Contact Us</a></li>
            <li id="footer"><a href="./about.php" style="color:#777">About Us</a></li>
        </ul>
            <p class="navbar-text navbar-right" style="margin-right: 15px;">This is for demonstration purposes only. CSC648/848 San Francisco State University Team02 Milestone Properties&copy</p>
        
    </div>



        <?php
        // display_formatted_details($results);
        close_mysql_connection($connection);
        ?>




        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </body>
</html>

<?php
    function bookmark_listing() {
        $connection = connect_to_mysql();
        $query = "INSERT into bookmarks (user_id, listing_id) VALUES(";
        $query .= $_SESSION['id'] . ",";
        //$query .= 
    }
?>