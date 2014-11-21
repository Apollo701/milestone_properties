<?php include 'navbar.php';    ?>
<?php include_once 'functions.php'; ?>
<?php include 'footer.php'; ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Crimson+Text' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <title>Home Details</title>
        <style>
            .brdr {
    border: 1px solid #ededed;
    height: 500px!important;
}
            @media only screen and (min-width: 992px) {
    #property-listings .property-listing img {
        max-width: 600px;
        margin-top:3%;
        
        
   }
}
           .breadcrumb{
                background: none;
                text-align: left;
            }
            .navbar-brand{
            font-family: 'Crimson Text', serif;
            }
            .top-container{
                margin-top: 70px;
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
                                    <?php   $connection = connect_to_mysql();
                                    $results = milestone_details($connection);
                            ?>
        
        
        
                <?php display_formatted_details($results);
                    close_mysql_connection($connection);
                ?>

        
          
           
                          <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </body>
</html>