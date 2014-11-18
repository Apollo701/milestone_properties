<?php include 'navbar.php'; ?>
<?php include_once 'functions.php'; ?>

<!DOCTYPE>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Crimson+Text' rel='stylesheet' type='text/css'>
        <title>Milestone Properties</title>
        <style>
            #sellhome{
            padding-top:4%;
            }
        .navbar-brand{
            font-family: 'Crimson Text', serif;

        }
        </style>
    </head>
    <body>
        <div class="container" id="sellhome">
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
        <?php
        // put your code here
        ?>
    </body>
</html>
