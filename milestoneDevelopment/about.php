<?php include 'navbar.php'; ?>
<?php include_once 'functions.php'; ?>
<?php// include 'footer.php'; ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <title>About Us Page</title>
        <style>
            body {
                padding-top: 50px; 
                padding-bottom: 90px;
                margin-bottom: 40px;
                height: 100%;
            }

            .img-center {
                margin: 0 auto;
            }
            .img-circle{
                height: 30%;
            }

        </style>
    </head>
    <body>
        <div class="container">

            <!-- Introduction Row -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">About Us
                        <small>It's Nice to Meet You!</small>
                    </h1>
                    <p>Real estate web site as a part of SFSU SE course</p>
                </div>
            </div>

            <!-- Team Members Row -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Our Team</h2>
                </div>
                <div class="col-lg-4 col-sm-6 text-center">
                    <img class="img-circle img-responsive img-center" src="assets/about_images/jdorn.jpg" alt="">
                    <h3>Jason Dorn
                        <small>Team Lead</small>
                    </h3>
                    <p>Description</p>
                </div>
                <div class="col-lg-4 col-sm-6 text-center">
                    <img class="img-circle img-responsive img-center" src="assets/about_images/spaten.jpg" alt="">
                    <h3>Sammy Patenotte
                        <small>Tech Lead and SVN Manager</small>
                    </h3>
                    <p>Description</p>
                </div>
                <div class="col-lg-4 col-sm-6 text-center">
                    <img class="img-circle img-responsive img-center" src="assets/about_images/rbeas.jpg" alt="">
                    <h3>Rachel Beasley
                        <small>Database and Documentation</small>
                    </h3>
                    <p>Description</p>
                </div>
                <div class="col-lg-4 col-sm-6 text-center">
                    <img class="img-circle img-responsive img-center" src="assets/about_images/vidya.jpg" alt="">
                    <h3>Sree Vidya Sastry
                        <small>Front End Design</small>
                    </h3>
                    <p>Description</p>
                </div>
                <div class="col-lg-4 col-sm-6 text-center">
                    <img class="img-circle img-responsive img-center" src="assets/about_images/hchiu.jpg" alt="">
                    <h3>Harry Chiu
                        <small>Back End Design</small>
                    </h3>
                    <p>Description</p>
                </div>
                <div class="col-lg-4 col-sm-6 text-center">
                    <img class="img-circle img-responsive img-center" src="assets/about_images/jondo.jpg" alt="">
                    <h3>Jonathan Do
                        <small>Front End Design</small>
                    </h3>
                    <p>Description</p>
                </div>
            </div>
        </div>
        <br><br><br><br><br>
        
        <div class="container container-fluid" style="background-color: #e7e7e7; border-color: #777; width: 100%; position: absolute;left: 0;right: 0">
            <p class="navbar-text navbar-left" ><a href="./contact.php" style="color:#777">Contact Us</a></p>
            <p class="navbar-text navbar-left"><a href="./about.php" style="color:#777">About Us</a></p>
            <p class="navbar-text navbar-right" style="margin-right: 15px;">This is for demonstration purposes only. CSC648/848 San Francisco State University Team02 Milestone Properties&copy</p>
        </div>



        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </body>
</html>