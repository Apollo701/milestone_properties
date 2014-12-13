<?php include 'navbar.php'; ?>
<?php include_once 'functions.php'; ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <title>About Us Page</title>
        <style>
            .jumbotron {

                color: #000;
                border-radius: 0px;
            }
            .jumbotron-sm { padding-top: 24px;
                            padding-bottom: 24px; }
            .jumbotron small {
                color: #000;
            }
            .h1 {
                text-align: center;
                font-size: 20px;
            }
            .h2 {
                text-align: center;
                font-size: 16px;
            }
        </style>
    </head>

    <body>
        <div class="jumbotron jumbotron-sm">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <h1 class="h1">
                            Thank you for your interest in our property </h1>
                        <h2 class="h2">Our realtors will be in contact with you shortly</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 center-block" >
                    <div class="well well-sm">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">
                                            Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <label for="email">
                                            Email Address</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                            </span>
                                            <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">
                                            Phone Number</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span>
                                            </span>
                                            <input type="phone" class="form-control" id="phone" placeholder="Enter phone number" required="required" /></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">
                                            Message</label>
                                        <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                                  placeholder="Please let us know if you have any questions"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                                        Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <form>
                        <legend><span class="glyphicon glyphicon-globe"></span>Our office</legend>
                        <address>
                            <strong>Milestone Properties,</strong><br>
                            1600 Holloway Avenue<br>
                            San Francisco, CA 94132<br>
                            <abbr title="Phone">
                                P:</abbr>
                            (123) 456-7890
                        </address>
                    </form>
                </div>
            </div>
        </div>
        <div class="container container-fluid text-center" style="background-color: #e7e7e7; border-color: #777; width: 100%; position: absolute;left: 0;right: 0">
            <ul>
                <li id="footer"><a href="./contact.php"style="color:#777">Contact Us</a></li>
                <li id="footer"><a href="./about.php" style="color:#777">About Us</a></li>
            </ul>
            <p class="navbar-text navbar-right" style="margin-right: 15px;">This is for demonstration purposes only. CSC648/848 San Francisco State University Team02 Milestone Properties&copy</p>

        </div>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </body>
</html>