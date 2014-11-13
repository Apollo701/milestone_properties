<?php include 'navbar.php'; ?>
<?php include_once 'functions.php'; ?>

<!DOCTYPE>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <title>Milestone Properties</title>
        <style>
        body{padding-top:4%;}
        #index{
/*            background-image: url('assets/images/bgImage.JPG');*/
            background-size: 100%;
            height: 80%;
        }
        #indexBackground{
            background-color: white;
        }
        .col-lg-12{
            padding-top: 6%;
        }
        .navbar-form{
            visibility: hidden;
        }
     
        </style>
    </head>
    <body id="indexBackground">
        
        <div class="container" id="index">
            <div class="row">
                <div class="col-lg-12 text-center v-center">
                    <h1>Milestone Properties</h1>
                    <p class="lead">Find your dream home today</p>
                </div>
            </div>
                    <div class="row">   
                    <form class="col-lg-12" action="listing.php" method="post">
                        <div class="input-group input-group-md col-sm-offset-4 col-sm-3">
                            <input name="usersearch" type="text" class="center-block form-control input-lg" title="Enter search query" placeholder="Enter state, city, zip code, or address...">
                            <span class="input-group-btn"><button class="btn btn-lg btn-primary" type="submit">Search</button></span>
                        </div>
                    </form>
                </div>
            </div>
        
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </body>  
</html>