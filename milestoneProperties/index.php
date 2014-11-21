<?php include 'navbar.php'; ?>
<?php include_once 'functions.php'; ?>
<?php include 'footer.php'; ?>
<!DOCTYPE>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Crimson+Text' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <title>Milestone Properties</title>
        <style>
            .bgc-fff{
                    background-color: #f8f8f8!important;

            }
        #index{
            padding-top:50px;
            background: url('assets/images/bg08.jpg');
            height: 600px;
            border-radius: 10px;
/*            width: 73%;*/
        }
        .row{
            padding: 1%;
        }
        .welcome{
            font-family: 'Crimson Text', serif;
            font-size: 50px;
        }
        .welcome-paragraph{
            font-family: 'Crimson Text', serif;
            font-size: 30px;
        }
        .navbar-brand{
            font-family: 'Crimson Text', serif;

        }
        .transbox{
            background:rgba(0, 0, 0, 0.2);
            padding: 4%;
            border-radius: 10px; 
            box-shadow: 1px 7px 36px -5px
        }
                    .bottom-container{
                margin-bottom: 40px;
                padding: 2%;
                
                border-radius: 10px; 
            }

        </style>
    </head>
    <body>
        
<!--        <div class="container" id="index">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-5 text-center">
                    <h1 class="welcome">Milestone Properties</h1>
                    <h3 class="welcome-paragraph text-right">Find your dream home today</h3>
                </div>
                <div class="col-sm-3"></div>
            </div>
                    <div class="row">
                        <div class="col-sm-6"></div>
                    <form class="col-sm-4" action="listing.php" method="post">
                        <div class="input-group input-group-md">
                            <input name="usersearch" type="text" class="center-block form-control input-md" title="Enter search query" placeholder="Enter state, city, zip code, or address...">
                            <span class="input-group-btn"><button class="btn btn-md btn-primary" type="submit">Search</button></span>
                        </div>
                    </form>
                        <div class="col-sm-2"></div>
                </div>
            </div>-->
        
                <div class="container" id="index">
                    <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6 text-center">
                    <div class="transbox">
                    <h1 class="welcome">Milestone Properties</h1>
                    <h3 class="welcome-paragraph text-center">Find your dream home today</h3>
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
                <br>
              </div>
            </div>
            
            <div class="row">
                <div class="col-sm-6">
                    <?php
        $connection = connect_to_mysql();
        $results = featured_properties($connection);
        display_formatted_results($results);
        close_mysql_connection($connection);
        ?>
                
            </div>
                <div class="col-sm-6">  

                                        <?php
        $connection = connect_to_mysql();
        $results = featured_properties($connection);
        display_formatted_results($results);
        close_mysql_connection($connection);
        ?>
                </div>
                </div>
        </div>
            </div>
               
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </body>  
</html>