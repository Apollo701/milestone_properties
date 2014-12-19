<?php include 'navbar.php';    ?>
<?php include_once 'functions.php'; ?>
<?php run_scripts_head();?>

<html lang="en">
    <head>
        <title>Listings database</title>
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
            body { padding-bottom: 50px; }
            h4 {text-align: center;}
        </style>
    </head>
    <body>
        <?php
            if(!isset($_SESSION['email'])) {
                header("Location: index.php");
                exit();
            }
            
            run_scripts_body();
            
            static $row;
            $row = get_user_data();
        ?> 
        
        <div class="container top-container transbox">
            <div class="container text-center">
                <h1>My Listings</h1> 
            </div>
           <?php 
           realtor_display_table( $GLOBALS['row']['id'])
           ?><br> 
        </div>
    </body>
	<div class="footer" style="background-color: #e7e7e7; border-color: #777; width: 100%; position: fixed;bottom: 0">
		<h4>This is for demonstration purposes only. CSC648/848 San Francisco State University Team02 Milestone Properties</h4>
	</div>
</html>

  <?php
  function get_user_data() {
        $connection = connect_to_mysql();
        $query = "SELECT * FROM users WHERE email = '";
        $query .= $_SESSION["email"] . "'";
        
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($result);
        
        if($row != false) {
            close_mysql_connection($connection);
            return $row;
        }
    }
    ?>