<?php include 'navbar.php';    ?>
<?php include_once 'functions.php'; ?>
<?php include 'footer.php'; ?>

<html lang="en">
    <head>
        <?php session_start(); run_scripts_head();?>
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
        </style>
    </head>
    <body>
        <?php
            if(!isset($_SESSION['loggedIn'])) {
                header("Location: index.php");
                exit();
            }
            
            else if ($_SESSION['loggedIn'] != 1) {
                header("Location: index.php");
                exit();
            }
            
            run_scripts_body();
            
            static $row;
            $row = get_user_data();
        ?> 
        
        <div class="container top-container transbox">
            <div class="container text-center">
                <h1><?php show_info("first_name")?>'s Profile</h1>
            </div>
            <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                <b>Email:</b> bonds.barry@mail.sfsu.edu <br>
                <b>Password:</b> *********<br>
                <a href="#"> Change Password</a><br>
            </div><br>
        </div>    
            
        <div class="container top-container transbox">
            <div class="container text-center">
                <h1>Contact Information</h1> <a href="#"> Edit</a>
            </div>
           <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                <b>First Name:</b> Barry <br>
                <b>Last Name:</b> Bonds <br>   
           </div>
       <br></div>
        
    </body>
</html>

<?php
    function get_user_data() {
        $connection = connect_to_mysql();
        $query = "SELECT * FROM users WHERE email = '";
        $query .= $_SESSION["email"] . "'";
        
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($result);
        
        if($row != false) {
            return $row;
        }
    }
    
    function show_info($fieldName) {
        echo $GLOBALS['row'][$fieldName];
    }
?>