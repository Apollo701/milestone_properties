<?php require 'navbar.php'; ?>
<?php if($_SESSION['admin']!= 2) {
               echo "<br><br><br><br>Unauthorized Access";
               exit();
            }
            ?>
<html lang="en">
    <head>
        <title>Administrator Profile</title>
        <style>
            .breadcrumb{
                background: none;
                text-align: left;
            }
            .navbar-brand, .nav{
                font-family: 'Helvetica Neue', serif;
                font-weight: lighter;            }
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
        <?php
            static $row;
            $row = get_user_data();
        ?> 
          <div class="container text-center top-container">
                <h1>Welcome <?php show_info("first_name")?> </h1>
            </div>
      
        <div class="container transbox">
            
            <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
            </div><br>
        </div>    
            
        <div class="container top-container transbox">
            <div class="container text-center">
                 <a href="new_realtor_created.php"> Create A Realtor</a>
            </div><br>
            <div class="container text-center">
                 <a href="admin_database.php"> Edit Listings</a>
            </div> </div>
            
       <br></div>
        <div class="container top-container transbox">
         <?php
        error_reporting(E_ALL & ~E_NOTICE);
        $connection = connect_to_mysql();
        $results = get_realtor_listings($connection);   
        display_formatted_results($results);
        ?>
        </div>
    </body>
</html>
