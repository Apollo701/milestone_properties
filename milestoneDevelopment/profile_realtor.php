<?php include 'navbar.php';    ?>
<?php include_once 'functions.php'; ?>
<?php include 'footer.php'; ?>

<html lang="en">
    <head>
        <?php run_scripts_head()?>
        <title>Realtor Profile</title>
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
          <div class="container text-center top-container">
                <h1>Welcome Eve</h1>
            </div>
        <?php run_scripts_body()?>
      
        <div class="container transbox">
            
            <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                <b>Name:</b> Eve Milestone<br>
                <b>Email:</b> Eve@milestone_properties.com <br>
                <b>Phone:</b> 657-9305<br>
            </div><br>
        </div>    
            
        <div class="container top-container transbox">
            <div class="container text-center">
                 <a href="new_listing"> Create A Listing</a>
            </div>
       <br></div>
        
    </body>
</html>