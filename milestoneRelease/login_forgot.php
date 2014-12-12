<?php include 'navbar.php';
      include_once 'functions.php';
      //include 'footer.php';?>

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
            static $emptyFields;
            static $emailNotValid;
            
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                check_login_forgot();
            }
            else {
                $emptyFields = false;
                $emailNotValid = false;
            }
        ?>

        <div class="container top-container transbox">
            <div class="container text-center">
                <h1>Account Recovery</h1>
            </div>
            Enter the email you have registered on Milestones Property. Your password will be reset and instructions will be emailed to you.
            <form role="form" method="post">
                <div class="form-group">
                    <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                        <label for="InputEmail">Email</label>
                        <input type="email" class="form-control" name="InputEmail" placeholder="Enter Email" value="<?php echo isset($_POST['InputEmail']) ? $_POST['InputEmail'] : '' ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                        <button type="submit" class="btn btn-default">Recover Password</button>
                        <span class="error"> <?php echo display_errors() ?></span>
                    </div>
                </div>
            </form>
        </div> 
    </body>
</html>

<?php
    if(empty($_POST)) {
        $emptyFields=false;
        $wrongCredentials = false;
    }
    
    /*
     * @var string $email email of the user, with input sanitized
     */
    //checks if email is correct, if it is, begins password recovery
    function check_login_forgot() {
        
        $email = filter_var($_POST["InputEmail"], FILTER_SANITIZE_EMAIL);
        
        $connection = connect_to_mysql();
        $query = "SELECT * FROM users WHERE email = '" . $email . "'";
        
        if(recover_password($connection, $email)) {
            //give a success message to user notifying that password has been reset and that email has been sent
        } else {
            //something went wrong
        }
    }
    
    function display_errors() {
        if($GLOBALS['emptyFields']) {
            echo "Fields cannot be empty";
        }
        
        else if($GLOBALS['emailNotValid']) {
            echo "Email is not valid";
        }
    }
?>