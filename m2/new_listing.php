<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <div>
            <?php include('navbar.php'); ?>
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
        <?php
        // put your code here
        ?>
    </body>
</html>
