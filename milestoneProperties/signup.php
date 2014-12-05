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
        <title>Sign Up</title>
        <style>
            .breadcrumb{
                background: none;
                text-align: left;
            }
            .navbar-brand{
            font-family: 'Crimson Text', serif;
            }
            body{padding-bottom:8%;}
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
                check_signup();
            }
        ?>
        <div class="container top-container transbox">
            <div class="container text-center">
                <h1>Account Creation</h1>
            </div>
            <form action="new_user_created.php" method="post" enctype="multipart/form-data" role="form">
                <!User Login Information>
                <div class="form-group">
                    <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                        <label for="InputEmail">Email</label>
                        <input type="email" name="email" class="form-control" id="InputEmail" placeholder="Enter Email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                        <label for="InputPW1">New Password</label>
                        <input type="password" class="form-control" id="InputPW1" placeholder="Create Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                        <label for="InputPW2">Re-Enter New Password</label>
                        <input type="password" name="password" class="form-control" id="InputPW2" placeholder="Re-Enter Password">
                    </div>
                </div>
                
                <!Contact Information>
                <div class="container text-center"><h4>Contact Information</h4></div>
                <div class="form-group">
                    <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                        <label for="InputFirstName">First Name</label>
                        <input type="firstname" name="first_name" class="form-control" id="InputFirstName" placeholder="First Name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                        <label for="InputLastName">Last Name</label>
                        <input type="lastname" name="last_name" class="form-control" id="InputLastName" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                        <label for="InputPhone">Phone #</label>
                        <input type="phone" name="phone" class="form-control" id="InputPhone" placeholder="###-###-####">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                        <label for="InputAddress">Address</label>
                        <input type="address" name="address" class="form-control" id="InputAddress" placeholder="42 Wallaby Way">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                        <label for="InputCity">City</label>
                        <input type="city" name="city" class="form-control" id="InputCity" placeholder="City">
                    </div>
                </div><div class="form-group">
                    <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                        <label for="InputState">State</label>
                        <input type="state" name="state" class="form-control" id="InputState" placeholder="State">
                    </div>
                </div><div class="form-group">
                    <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                        <label for="InputZip">Zip Code</label>
                        <input type="zip" name="zip" class="form-control" id="InputZip" placeholder="Zip Code">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>
            <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                <a href="login.php">Already a User?</a>
            </div> <br>
        </div> 
    </body>
</html>


<?php 
    function check_empty ($var){
        // returns NULL if blank form
        if ($var == 0)
            $var = NULL;
        return $var;
    } 
    function check_require (){
        // code to check required fields (input_user)?
    }
    
    /*
    */
    //checks if signup information is correct, and that the user doesn't already exist
    function check_signup() {
        $original_email = trim($_POST["InputEmail"]);
        $clean_email = filter_var($original_email, FILTER_SANITIZE_EMAIL);

        // if email has special characters or doesn't have right format, exit
        if ($original_email != $clean_email || filter_var($original_email,FILTER_VALIDATE_EMAIL)) {
            echo "Email not valid";
            exit();
        }

        // if password contains special characters, exit
        if(filter_var($_POST["InputPW1"], FILTER_VALIDATE_REGEXP, "^[a-zA-Z0-9_]*$")) {
            echo "Password is not valid (only letters and numbers allowed)";
            exit();
        }

        //if passwords do not match, exit
        if($_POST["InputPW1"] != $_POST["InputPW1"]) {
            echo "Passwords do not match";
            exit();
        }

        // if first name contains any non-letter characters, exit
        if(filter_var($_POST["InputFirstName"], FILTER_VALIDATE_REGEXP, "^[a-zA-Z]*$")) {
            echo "First name not valid (only letters allowed)";
            exit();
        }

        // if last name contains any non-letter characters, exit
        if(filter_var($_POST["InputLastName"], FILTER_VALIDATE_REGEXP, "^[a-zA-Z]*$")) {
            echo "Last name not valid (only letters allowed)";
            exit();
        }

        // if email is already registered, exit
        $connection = connect_to_mysql();
        $row = mysqli_query($connection, "SELECT FROM USERS WHERE EMAIL == " . $original_email);
        if($row->num_rows!=0) {
            echo "Email already registered";
            exit();
        }

        create_user();
    }
?>