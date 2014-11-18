<?php include 'navbar.php';    ?>
<?php include_once 'functions.php'; ?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <title>User Profile</title>
        <style>
            .breadcrumb{
                background: none;
                text-align: left;
            }
            body{padding-top:4%;}
        </style>
    </head>
    <body>
        <div class="container text-center">
            <h1>Account Creation</h1>                
        </div
        
        <form role="form">
            <div class="input-group input-group-sm col-sm-offset-1 col-sm-4">
                <label for="InputEmail">Email</label>
                <input type="email" class="form-control" id="InputEmail" placeholder="Enter Email">
            </div>
            <div class="input-group input-group-sm col-sm-offset-1 col-sm-4">
                <label for="InputPW1">New Password</label>
                <input type="password" class="form-control" id="InputPW1" placeholder="Create Password">
            </div>
            <div class="input-group input-group-sm col-sm-offset-1 col-sm-4">
                <label for="InputPW2">Re-Enter New Password</label>
                <input type="password" class="form-control" id="InputPW2" placeholder="Re-Enter Password">
            </div>
            <div class="input-group input-group-sm col-sm-offset-1 col-sm-4">
                <label for="InputFirstName">First Name</label>
                <input type="firstname" class="form-control" id="InputFirstName" placeholder="First Name">
            </div>
           <div class="input-group input-group-sm col-sm-offset-1 col-sm-4">
                <label for="InputLastName">Last Name</label>
                <input type="lastname" class="form-control" id="InputLastName" placeholder="Last Name">
            </div>
            <div class="input-group input-group-sm col-sm-offset-1 col-sm-4">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </form>
        
    </body>
</html>