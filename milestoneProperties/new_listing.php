<?php include 'navbar.php'; ?>
<?php include 'login_modal.php'; ?>
<?php include 'signup_modal.php'; ?>
<?php include_once 'functions.php'; ?>

<!DOCTYPE>
<html lang="en">
    <head>
        <?php run_scripts_head()?>
        <title>Sell Home</title>
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
                background:rgba(0, 0, 0, .07);
                border-radius: 10px; 
                box-shadow: 1px 7px 36px -5px;
            }
        </style>
    </head>
    <body>
        <?php run_scripts_body()?>
        <div class="container top-container transbox" id="sellhome">
            <div class="container text-center">
                <h1>Sell Home</h1>
            </div>
        <form action="new_listing_created.php" method="post" enctype="multipart/form-data">
            State:      <input type="text" name="us_state" value="" /><br />
            <br />
            City:       <input type="text" name="city" value="" /><br />
            <br />
            Address:    <input type="text" name="address" value="" /><br />
            <br />
            Zip Code:   <input type="text" name="zip_code" value="" /><br />
            <br />
            Price:      <input type="text" name="price" value="" /><br />
            <br />
            Square Feet:<input type="text" name="sq_ft" value="" /><br />
            <br />
            Bedrooms:   <input type="text" name="num_bedrooms" value="" /><br />
            <br />
            Bathrooms:  <input type="text" name="num_bathrooms" value="" /><br />
            <br />
            Garages:    <input type="text" name="num_garages" value="" /><br />
            <br />
            Description:<input type="text" name="description" value="" /><br />
            <br />
            Insert Image: <input type="file" name="uploadFile" /><br />
            <br />
            <input type="submit" name="submit" value="Submit" />
            <br />
        </form>
        </div>
        <br><br><br><br>
            <div class="container container-fluid" style="background-color: #e7e7e7; border-color: #777; width: 100%; position: absolute;left: 0;right: 0">
        <p class="navbar-text navbar-left" ><a href="./contact.php" style="color:#777">Contact Us</a></p>
        <p class="navbar-text navbar-left"><a href="./about.php" style="color:#777">About Us</a></p>
        <p class="navbar-text navbar-right" style="margin-right: 15px;">This is for demonstration purposes only. CSC648/848 San Francisco State University Team02 Milestone Properties&copy</p>

    </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="./path/to/dropzone.js"></script>
    </body>
</html>
