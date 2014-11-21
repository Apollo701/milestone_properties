<?php include 'navbar.php';    ?>
<?php include_once 'functions.php'; ?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <title>Home Details</title>
        <style>
           .breadcrumb{
                background: none;
                text-align: left;
            }
            .navbar-brand{
            font-family: 'Crimson Text', serif;
            }
            body{padding-top:0%;}
            .top-container{
                margin-top: 80px;
/*                background-color:#e5e5e5;*/
                border-radius: 10px; 
                
            }
            .transbox{
                height: 250px;
                width: 1000px;
                background:rgba(0, 0, 0, .07);
                border-radius: 10px; 
                box-shadow: 1px 7px 36px -5px;
            }
        </style>
    </head>
    <body>
        <?php run_scripts_body()?>
        
        <div class="container top-container transbox">
            <div class ="row">
                <div class="col-md-2">
                    <font size = "4"> 
                    <b>Address</b><br>
                    <b>Square feet</b><br>
                    <b>Schools Nearby</b><br>
                    <b>Bedrooms</b><br>
                    <b>Bathrooms</b><br> 
                    </font>
                </div>
                <div class="col-md-4">
                    <font size ="4">
                    A shirt<br>
                    its feet are round<br>
                    define 'nearby'<br>
                    sleepy<br>
                    yes<br> 
                    </font>
                </div>
                <div class="col-md-4">
                    Price<br>
                    <a href="http://sfsuswe.com/~f14g02/about.php"> Contact Us</a><br>
                    Walkscore<br>
                    <button type="button" class="btn btn-default btn-md">
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Bookmark
                    </button>
                </div>
                </div><br>
            </div>
        </div>    
            
        <div class="container top-container transbox">
            <div class="row">
            <div class="container text-center">
                <div class="col-md-6">
                    
                </div>
                <div class="col-md-2">
                    <a href="#">Request More Info</a><br>
                </div>
            </div>
           <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
           </div>
       <br></div>
          
    </body>
</html>