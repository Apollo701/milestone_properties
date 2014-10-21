<!DOCTYPE>

<html>
    <head>
        <title>Milestone Properties</title>
        <style>
            @import url(http://fonts.googleapis.com/css?family=Vollkorn);   
            /* Custom container */
.container-full {
  margin: 0 auto;
  width: 100%;
  min-height:100%;
  background-color:110022;
  color:#eee;
  overflow:hidden;
  font-family: 'Vollkorn', serif;
}


        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
<!--                        <span class="sr-only">Toggle Navigation</span>-->
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
<!--                    <a href="index.php" class="navbar-brand">Milestone Properties</a>-->
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                
                <div class="collapse navbar-collapse" role="navigation">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Milestone Properties</a></li>
                        <li><a href="search.php"><span class="glyphicon glyphicon-map-marker"></span> Find a new home</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
<!--                        <li><a href="about.php"><span class="glyphicon glyphicon-leaf"></span> About Us</a></li>-->
                        <li><a href="new_listing.php"><span class="glyphicon glyphicon-leaf"></span> Post Listing</a></li>
<!--                        <li><a href="contact.php"><span class="glyphicon glyphicon-envelope"></span> Contact Us</a></li>
                        <li><a href="signup.php"><span class="glyphicon glyphicon-road"></span> Sign up?</a></li>-->
                        <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Log-in</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="container-full">
            <div class="row">
                <div class="col-lg-12 text-center v-center">
                    <h1>Milestone Properties</h1>
                    <p class="lead">Find your dream home today</p>
                    
                    <br/>
                    
<!--                    <form method="post" action="tempSearch.php?go" id="searchform">
                        <input type="text" name="name">
                        <input type="submit" name="submit" value="Search">
                    </form>-->
                    
                    

                    
                    <form class="col-lg-12" action="tempSearch.php" method="post">
                        <div class="input-group input-group-lg col-sm-offset-4 col-sm-4">
                            <input name="usersearch" type="text" class="center-block form-control input-lg" title="Enter search query" name="Enter state, city, zip code, or address...">
                            <span class="input-group-btn"><button class="btn btn-lg btn-primary" type="submit">Search</button></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>

      

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>  
</html>