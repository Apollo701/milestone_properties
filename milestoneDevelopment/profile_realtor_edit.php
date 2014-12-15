<?php include 'navbar.php';    ?>
<?php include_once 'functions.php'; ?>

<html lang="en">
    <head>
        <?php run_scripts_head();?>
        <title>User Profile</title>
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
        <div class="container text-center">
            <h1>(%Realtor)'s Profile</h1> 
        </div>
        <div class="container top-container transbox">
            <br><?php display_table()?><br>
        </div>
        
    </body>
</html>
