<?php include 'navbar.php';    ?>
<?php include_once 'functions.php'; ?>
<?php include 'footer.php'; ?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Crimson+Text' rel='stylesheet' type='text/css'>
        <title>Login</title>
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
        <?php run_scripts_body();
            if(!empty($_POST)) {
                check_login();
            }
        ?>
        
        <div class="container top-container transbox">
            <div class="container text-center">
                <h1>Account Recovery</h1>
            </div>
       
        </div> 
    </body>
</html>