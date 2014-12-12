<?php include 'navbar.php';    ?>
<?php include 'login_modal.php'; ?>
<?php include 'signup_modal.php'; ?>
<?php include_once 'functions.php'; ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Crimson+Text' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <title>Listings Page</title>
        <style>
            .breadcrumb{
                background: none;
                text-align: left;
            }
            #footer{
                display: inline;
                padding: 50px;
            }
            .top-container{
                margin-top: 80px;
                background-color:#e5e5e5;
                border-radius: 10px; 
                
            }
            .bottom-container{
                margin-top: 40px;
                padding: 2%;
                background-color:#e5e5e5;
                border-radius: 10px; 
            }
            .navbar-brand{
                font-family: 'Helvetica Neue', serif;
                font-weight: lighter;        
            }
            .property-listing{
                border-radius:4px;
            }
            .transbox{
                border-radius: 4px;
                -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2), 0 1px 0px rgba(0, 0, 0, 0.1);
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2), 0 1px 0px rgba(0, 0, 0, 0.1);
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
                        <li class="active">Listings: <?php if(!(isset($_POST["usersearch"]))){echo '';}else{echo $_POST["usersearch"];} ?></li>
                    </ol>
                </div>
                <div class="col-sm-6 text-center">
                    <h2 style="font-family: 'Helvetica Neue', serif;
                font-weight: lighter; padding: 15px;">Milestone Property Home Listings</h2>
                </div>
            </div>
           <div class="row">
          <div class="col-md-10 col-md-offset-1 col-xs-12">
            <div class="quick-search">
              <div class="row">
                <form action="listing.php" method="post">
                  <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                      <label for="bedroom">Search Homes</label>
                      <input name="usersearch" type="text" class="form-control" placeholder="<?php echo $_POST["usersearch"]?>">
                    </div>
                    <div class="form-group">
                      <label for="bedroom">Bedroom</label>
                      <select class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </select>
                    </div>
                  </div>
                    <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                      <label for="status">Walkscore</label>
                      <select class="form-control">
                        <option>90+</option>
                        <option>80+</option>
                        <option>70+</option>
                        <option>60+</option>
                        <option>50+</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="bathroom">Bathroom</label>
                      <select class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </select>
                    </div>
                  </div>
                  <!-- break -->
                  <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                      <label for="type">Sq Ft</label>
                      <select class="form-control">
                        <option>70+</option>
                        <option>120+</option>
                        <option>170+</option>
                        <option>190+</option>
                        <option>210+</option>
                        
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="minprice">Min Price</label>
                      <select class="form-control">
                        <option>$20,000</option>
                        <option>$40,000</option>
                        <option>$60,000</option>
                        <option>$70,000</option>
                      </select>
                    </div>
                  </div>
                  <!-- break -->
                  <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                      <label for="maxprice">Max Price</label>
                      <select class="form-control">
                        <option>$8,200</option>
                        <option>$11,700</option>
                        <option>$14,150</option>
                        <option>$21,110</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="maxprice">&nbsp;</label>
                      <input type="submit" name="submit" value="Search Again" class="btn btn-primary btn-block">
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
            <br>
        </div>
            <div class="container-full bottom-container" style="background-color:#e8e8e8">
        <div class="container container-pad" id="property-listings">
            <div class="row">
              <div class="col-md-12 text-center">
                  <h2 style="font-family: 'Helvetica Neue', serif;
                font-weight: lighter; ">Showing <?php echo number_of_listings($results); ?> Results for:<br> <?php echo '"'; if(!(isset($_POST["usersearch"]))){echo '';}else{echo $_POST["usersearch"];} echo '"'; ?> </h2>
                <br>
                <br>
              </div>
            </div>
                           
                <?php display_formatted_results($results);
                    
                ?>

        </div><!-- End container -->
    </div>
        
    <div class="container container-fluid text-center" style="background-color: #e7e7e7; border-color: #777; width: 100%; position: absolute;left: 0;right: 0">
        <ul>
            <li id="footer"><a href="./contact.php"style="color:#777">Contact Us</a></li>
            <li id="footer"><a href="./about.php" style="color:#777">About Us</a></li>
        </ul>
            <p class="navbar-text navbar-right" style="margin-right: 15px;">This is for demonstration purposes only. CSC648/848 San Francisco State University Team02 Milestone Properties&copy</p>
        
    </div>



                <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </body>
</html>