<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet" type="text/css">
<?php include 'navbar.php';    ?>
<?php include 'login_modal.php'; ?>
<?php include 'signup_modal.php'; ?>
<?php include_once 'functions.php'; ?>
<!DOCTYPE>
<?php
            if($_SESSION['admin']!= 2) {
                header("Location: index.php");
                exit;
            }
        ?> 
<html lang="en">
    <head>
        <?php run_scripts_head()?>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Add Realtor</title>
        <style>
            .breadcrumb{
                background: none;
                text-align: left;
            }
            .navbar-brand, .nav{
                font-family: 'Helvetica Neue', serif;
                font-weight: lighter;

            }
            .dropzone{
                text-align: left;
            }
            body{padding-top:0%;}
            .top-container{
                margin-top: 70px;
/*                background-color:#e5e5e5;*/
                border-radius: 10px; 
                
            }
            .transbox{
                background:rgba(0, 0, 0, .07);
                border-radius: 10px; 
                box-shadow: 1px 7px 36px -5px;
				margin-bottom:50px;
            }
            input {
                display: inline;
                float: right;
			}
			h4 { text-align: center;}
        </style>
    </head>
    <body>
         
        <div class="container top-container transbox" id="addrealtor">
            <div class="row">
                <div class="col-md-5 col-md-offset-4">
                    <h1 style="           
                font-family: 'Helvetica Neue', serif;
                font-weight: lighter;">Add Realtor</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <form action="new_realtor_created.php" method="post" enctype="multipart/form-data"  class="dropzone" id="my-awesome-dropzone" >
                        Email:      <input type="text" name="user_email" value="" /><br />
                        <br />
                        Password:       <input type="text" name="user_password" value="" /><br />
                        <br />
                        
                        Phone Number:      <input type="text" name="phone_number" value="" /><br />
                        <br />
                        First Name:<input type="text" name="first_name" value="" /><br />
                        <br />
                        Last Name:   <input type="text" name="last_name" value="" /><br />
                        <br />
                        <input type="hidden" name="admin" value="1" />
                     
                        <input type="submit" name="submit" value="Create Realtor" />
                        <br />
                    </form>
                </div>
                
              
        </div>
            
        </div>
            
		<div class="footer" style="background-color: #e7e7e7; border-color: #777; width: 100%; position: fixed;bottom: 0">
			<h4>This is for demonstration purposes only. CSC648/848 San Francisco State University Team02 Milestone Properties</h4>
        </div>
		
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="./js/dropzone.js"></script>
    </body>
