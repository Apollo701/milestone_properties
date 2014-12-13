<?php include 'navbar.php'; ?>
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
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <style>
            .bgc-fff{
                background-color: #f8f8f8;
            }
            #footer{
                display: inline;
                padding: 50px;
            }
            h1{
                font-family: 'Helvetica Neue', serif;
                font-weight: lighter;
                font-size: 52px;

            }
            #index{
                padding-top:50px;
                background: url('assets/bg_images/bg2.jpg');
/*                height: 300px;*/
                width: 66%;
                border-radius: 10px;
                /*            width: 73%;*/
            }
            .row{
                padding: 1%;
            }
            .welcome{
                font-family: 'Helvetica Neue', serif;
                font-weight: lighter;
                color: white;
                font-size: 52px;

            }
            .welcome-paragraph{
                font-family: 'Helvetica Neue', serif;
                font-weight: lighter;
                color: white;
            }
            .navbar-brand, .nav{
                font-family: 'Helvetica Neue', serif;
                font-weight: lighter;

            }
            .transbox{
                background:rgba(0, 0, 0, .5);
                padding: 4%;
                border-radius: 10px; 
                box-shadow: 1px 7px 36px -5px
            }
            .bottom-container{
                
                padding: 1%;
                border-radius: 10px; 
            }
            
            body { padding-top: 70px; }

        </style>
        <title>Contact requests</title>
    </head>

    <body>
        <h1 align="center"> Contact request: </h1>
        
        <?php
        if(isset($_POST['idRow'])) {
            remove_row();
        }
        ?>
        
        <table class="table table-hover">
            <tr>
                <th>User name</th>
                <th>User phone number</th>
                <th>Listing location</th>
                <th>Action</th>
            </tr>
            <?php print contact_requests() ?>
        </table>

        <div class="container container-fluid text-center" style="background-color: #e7e7e7; border-color: #777; width: 100%; position: absolute;left: 0;right: 0">
        <ul>
            <li id="footer"><a href="./contact.php"style="color:#777">Contact Us</a></li>
            <li id="footer"><a href="./about.php" style="color:#777">About Us</a></li>
        </ul>
            <p class="navbar-text navbar-right" style="margin-right: 15px;">This is for demonstration purposes only. CSC648/848 San Francisco State University Team02 Milestone Properties&copy</p>
        </div>
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>

<?php
    function contact_requests() {
        $connection = connect_to_mysql();
        $query = "SELECT * FROM touched";
        $query2 = "SELECT * FROM users WHERE id = ";
        
        $touchedResult = mysqli_query($connection, $query);
        
        $touchedRow;
        $userQuery;
        $userResult;
        $userRow;
        
        $max = mysqli_num_rows($touchedResult);
        for ($i = 0; $i < $max; $i++) {
            mysqli_data_seek($touchedResult, $i);
            $touchedRow = mysqli_fetch_array($touchedResult);
            
            $userQuery = $query2 . $touchedRow['idUser'];
            $userResult = mysqli_query($connection, $userQuery);
            $userRow = mysqli_fetch_array($userResult);
            
            echo "<tr>\n";
            echo "<td> ". $userRow['first_name'] . " " . $userRow['last_name'] . " </td>\n";
            echo "<td> ". $userRow['phone_number'] . " </td>\n";
            echo "<td> <a href=\"http://www.sfsuswe.com/~f14g02/home_details.php?details=" . $touchedRow['idListing'] . "\">Visit listing</a></td>\n";
            echo "<td>";
            echo "<form action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"post\">";
            echo "<button name=\"idRow\" type=\"submit\" value=\"" . $touchedRow['id'] . "\">Remove contact request</button>";
            echo "</form>";
            echo "</td>\n";
            echo "</tr>";
        }
        
        close_mysql_connection($connection);
    }
    
    function remove_row() {
        $connection = connect_to_mysql();
        $query = "DELETE FROM touched WHERE id = '" . $_POST['idRow'] . "'";
        mysqli_query($connection, $query);
        
        echo "<script type='text/javascript'>alert('Contact request deleted!');</script>";
    }
?>