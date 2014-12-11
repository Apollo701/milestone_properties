<?php
/*
 * PHP version 5 
 * @author f14g02
 * @version 1.0
 * @package Milestone_Properties
 * define all global variables to be used in connecting to mysql
 * @global string $GLOBALS['DB_Server'] address of sfsuswe server for connecting to sql datatbase
 * @name DB_Server
 * @global string $GLOBALS['DB_login'] login name for connecting to sql datatbase
 * @name DB_login
 * @global string $GLOBALS['DB_password'] login string password name for connecting to sql datatbase
 * @name DB_password
 * @global string $GLOBALS['DB_name']  team name for connecting to sql datatbase
 * @name  DB_name
 * @global counter integer counter for login
 */

define("DB_Server", "sfsuswe.com");
define("DB_login", "f14g02");
define("DB_password", "dreamteam12");
define("DB_name", "student_f14g02");
$counter = 0;

/* @global DB_Server string address of sfsuswe server for connecting to sql datatbase
 * @global DB_login string login name for connecting to sql datatbase
 * @global DB_password login string password name for connecting to sql datatbase
 * @global DB_name string team name for connecting to sql database
 * @return mysqli_result $connection returns connection got mysql database or false
 */
//function to initiate the connection to the mysql database, and choose the particular db
function connect_to_mysql() {
    $connection = mysqli_connect(DB_Server, DB_login, DB_password, DB_name);
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_errno() .
                "(" . mysqli_connect_error() . ")");
    }
    mysqli_set_charset($connection, 'utf-8');
    return $connection;
}
/*
 * @param mysqli_result $connection connection to msql database
 * @global array $_POST array with user search request
 * @var string nameErr error message
 * @return mysqli_result $result
 * @var string $query query to mysql database
 */
//fucnction to search database for listings
function milestone_search($connection) {
    if (empty($_POST["usersearch"])) {
        $nameErr = "Name is required";
        return $result = "";
    } else {
        $query = "SELECT * ";
        $query .="FROM listings ";
        $query .="WHERE city =";
        $query .= "'{$_POST["usersearch"]}'";
        $query .= " OR us_state =";
        $query .= "'{$_POST["usersearch"]}'";
        $query .= " OR zip_code =";
        $query .= "'{$_POST["usersearch"]}'";
        $query .= " OR address =";
        $query .= "'{$_POST["usersearch"]}'";
        return $result = mysqli_query($connection, $query);
    }
}
/*
 * @param mysqli_result $connection connection to msql database
 * @global array $_POST array with user search request and filter arguments
 * @var string nameErr error message
 * @return mysqli_result $result
 * @var string $query query to mysql database
 */
//searches the database for listings with filters
function milestone_search_with_filters($connection) {
    if (empty($_POST["usersearch"])) {
        $nameErr = "Name is required";
        return $result = "";
    } else {
        $query = "SELECT * ";
        $query .="FROM listings ";
        $query .="WHERE (city =";
        $query .= "'{$_POST["usersearch"]}'";
        $query .= " OR us_state =";
        $query .= "'{$_POST["usersearch"]}'";
        $query .= " OR zip_code =";
        $query .= "'{$_POST["usersearch"]}'";
        $query .= " OR address =";
        $query .= "'{$_POST["usersearch"]}')";
        if (!empty($_POST["bedroom"])) {
            $query .= " AND num_bedrooms =";
            $query .= "{$_POST["bedroom"]}";
        }
        if (!empty($_POST["min_walkscore"])) {
            $query .= " AND walkscore >=";
            $query .= "{$_POST["min_walkscore"]}"; //form must be converted to int, "+%d" is a string
        }
        if (!empty($_POST["bathroom"])) {
            $query .= " AND num_bathrooms =";
            $query .= "{$_POST["bathroom"]}";
        }
        if (!empty($_POST["min_sq_ft"])) {
            $query .= " AND sq_ft >=";
            $query .= "{$_POST["min_sq_ft"]}"; //form must be converted to int, 
        }
        if (!empty($_POST["minprice"])) {
            $query .= " AND price >=";
            $query .= "{$_POST["minprice"]}";
        }
        if (!empty($_POST["maxprice"])) {
            $query .= " AND price <=";
            $query .= "{$_POST["maxprice"]}";
        }
        return $result = mysqli_query($connection, $query);
    }
}
/*
 * @param mysqli_result $connection connection to msql database
 * @global array $_POST array with user search request
 * @var string nameErr error message
 * @return mysqli_result $result
 * @var string $query query to mysql database
 */
//function to retrieve information from listing
function milestone_details($connection) {
    if (empty($_POST["details"])) {
        $nameErr = "Name is required";
        return $result = "";
    } else {
        $query = "SELECT * ";
        $query .="FROM listings ";
        $query .="WHERE id =";
        $query .= "'{$_POST["details"]}'";
        return $result = mysqli_query($connection, $query);
    }
}
/*
 * @param mysql_result $connection
 */
//closes connection my mysql datbase
function close_mysql_connection($connection) {
    mysqli_close($connection);
}
/*
 * @param string $address0 address
 * @var string $address1 reformated address
 * @var string $json json formatted data
 * @var string $json1 reformated json data
 * @var float $lat lattitude of address
 * @var float $long longitude of address
 * @return array $return latitude and longitude values
 */
//finds and returns the lattitude and longitude of an address
function get_lat_long($address0) {
    $address1 = str_replace(" ", "+", $address0);
    $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address1&sensor=false");
    $json1 = json_decode($json);

    $lat = $json1->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
    $long = $json1->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
    $return = array(
        'lat' => $lat,
        'long' => $long,
    );
    return $return;
}
/*
 * @param string $address1
 * @var array $l_temp latitude and longtude values
 * @var WalkScrore $w new WalkScore object
 * @var array $w_options array of address information formatted for WalkScore function
 * @return int $score WalkScore value
 */
//function takes in address and finds and returns WalkScore value
function get_walkscore($address) {
    require_once("WalkScore.php");
    $l_temp = get_lat_long($address);
    $w = new WalkScore('dbd8b3f251a2ea4b4a6be60beae80642');
    $w_options = array(
        'address' => $address,
        'lat' => $l_temp['lat'],
        'lon' => $l_temp['long'],
    );
    $score = $w->WalkScore($w_options)->walkscore;
    return $score;
}
/*
 * @param mysql_result $connection connection to mysql database
 * @var string description description of listing
 * @var string $address address listing is located at
 * @var int $zip_code zip code listing is located in
 * @var string $us_state state listing is located in
 * @var int $price price of listing
 * @var int $sq_ft number of square feet in listing
 * @var int $num_bedrooms number of bedrooms in listing
 * @var int $num_bathrooms number of bathrooms in listing
 * @var string $target_dir name of image to upload
 * @var string $w_address address of listing
 * @var int $walkscore WalkScore for listing
 * @var bool $uploadOK
 * @var string $image1 address image1 is stored at
 * @var string query value to insert into sql database
 * @ global array $_POST
 */
//Takes in user input and creates listing
function input_listing($connection) {
    //$connection = connect_to_mysql();
    $description = $_POST['description'];
    $address = $_POST['address'];
    $zip_code = $_POST['zip_code'];
    $city = $_POST['city'];
    $us_state = $_POST['us_state'];
    $price = $_POST['price'];
    $sq_ft = $_POST['sq_ft'];
    $num_bedrooms = $_POST['num_bedrooms'];
    $num_bathrooms = $_POST['num_bathrooms'];
    $num_garages = $_POST['num_garages'];
    $target_dir = "/home/f14g02/public_html/assets/images/";
    $target_dir = $target_dir . basename(($_FILES["uploadFile"]["name"]));
    $w_address = $address . ", " . $city . ", " . $us_state;
    $walkscore = get_walkscore($w_address);
    $uploadOk = 1;
    if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_dir)) {
        $image1 = basename($_FILES["uploadFile"]["name"]);
        echo "The file " . basename($_FILES["uploadFile"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $query = "INSERT INTO listings (description, address, zip_code, city, us_state, price, sq_ft, num_bedrooms,"
            . "num_bathrooms, num_garages, image1, walkscore)
                    VALUES ('$description', '$address', '$zip_code', '$city', '$us_state', '$price', '$sq_ft',"
            . " '$num_bedrooms', '$num_bathrooms', '$num_garages', '$image1', '$walkscore')";

    if (!mysqli_query($connection, $query)) {
        die('Error: ' . mysqli_error($connection));
    }
    echo "1 record added";

    close_mysql_connection($connection);
}
/*
 * @param mysql_result $connection connection to mysql database
 * @var string email user's email
 * @var string $password user's password
 * @var string $first_name user's first name
 * @var string $last_name user's last name
 * @var string $query value to send to mysql database
 * @global array $_POST
 */
//Takes in user input and adds new user to database
function input_user($connection) {
    //$connection = connect_to_mysql();

    $email = $_POST['email'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $query = "INSERT INTO users (email, password, user_type, zip_code, phone_number, first_name, last_name)
                    VALUES ('$email', '$password', 1, '$zip', '$phone', '$first_name', '$last_name')";

    if (!mysqli_query($connection, $query)) {
        die('Error: ' . mysqli_error($connection));
    }
    echo "1 record added";

    close_mysql_connection($connection);
}
/*
 * @param int $result number of results 
 */
//displays number of results 
function number_of_listings($result) {
    if ($result == "") {
        echo 0;
    } else {
        echo mysqli_num_rows($result);
    }
}
//runs ajax and bootstrap scripts for body
function run_scripts_body() {
    echo '        
            <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        ';
}
//runs bootstrap scripts for head
function run_scripts_head() {
    echo '
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
            <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
            <link href="http://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet" type="text/css">
        ';
}
/*
 * @param mysql_result $connection connection to database
 * @var string $query input for sql database
 * @return mysql_result $result featured listing from database
 */
//finds and returns a featured(random) property from database
function featured_properties($connection) {
    $query = "SELECT * ";
    $query .="FROM listings ";
    $query .="ORDER BY RAND()";
    $query .="LIMIT 1";
    return $result = mysqli_query($connection, $query);
}

/*
 * @param string $email email of the user currently logged in
 */
// starts a cookie session to remember logged in user
function sec_session_start($email) {
    session_destroy();
    $session_name = 'milestoneProperties';   // Set a custom session name
    $secure = SECURE;
    // This stops JavaScript being able to access the session id.
    $httponly = true;
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
    // Sets the session name to the one set above.
    session_name($session_name);
    session_start();            // Start the PHP session
    $_SESSION['email'] = $email;
    $_SESSION['loggedIn'] = 1;
}

/*
 * @param mysqli_result $connection connection to msql database
 * @param string $user_email
 * @param string oldPw old password to be changed
 * @param string newPw new and updated password
 * @var string $query query to mysql database
 * @return boolean success true if password is successfully changed, false on fail
 */
//Changes a user's password in the database to a new password
function change_password($connection, $user_email, $oldPw, $newPw) {
    $query = "SELECT email , password ";
    $query .="FROM users ";
    $query .="WHERE email = ";
    $query .= "'{$user_email}' ";
    $query .="AND password = ";
    $query .= "'{$oldPw}'";

    $result = mysqli_query($connection, $query);

    //either email or password is incorrect, failed to change password
    if (mysql_num_rows($result) == 0) {
        $success = false;
        return $success;
    } else { //attempting to change password
        $query = "UPDATE users ";
        $query .="SET password = ";
        $query .= "'{$newPw}' ";
        $query .="WHERE email = ";
        $query .= "'{$user_email}' ";
        $query .="AND password = ";
        $query .= "'{$oldPw}'";

        if (mysqli_query($connection, $query)) {
            $success = true;
            return $success;
        } else {
            $success = false;
            return $success;
        }
    }
}

/*
 * @param mysqli_result $connection connection to msql database
 * @param string $user_email
 * @var string $query query to mysql database
 * @var string $newPw new randomly generated password with a length 8 characters
 * @var string $message messsage to send in the email
 * @return boolean success true if password is successfully changed, false on fail
 */

//Changes a user's password in the database to a new randomized password, sends an email with the new password to the corresponding email address
function recover_password($connection, $user_email) {
    //must get old password in order to change password
    $query = "SELECT password , first_name, last_name ";
    $query .="FROM users ";
    $query .="WHERE email = ";
    $query .= "'{$user_email}'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);

    //generating a new random password
    $newPw = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);

    if (change_password($connection, $user_email, $row["password"], $newPw)) {
        //send email with new password
        $message = "Hello {$row["first_name"]} {$row["last_name"]},\n\n"
                . "You have requested a password recovery for your account at "
                . "Milestones Property. If you did not request password recovery"
                . ", please contact us at our contact page.\n\n"
                . "Your new password is: {$newPw}\n\n"
                . "For your security, please change this password immediately.\n\n"
                . "Find your dream home today\n"
                . "-Milestone Properties\n\n"
                . "This is for demonstration purposes only. CSC648/848 San "
                . "Francisco State University Team02 Milestone Properties©";

        mail($user_email, "Milestone Properties Password Recovery", $message);

        $success = true;
        return $success;
    } else {
        $success = false;
        return $success;
    }
}

/*
 * @param mysql_result $result listing results to display 
 * @var string $img_name name of image file to be displayed
 * @var string $img_path path of image to be displayed
 * @var array $row
 */
//funtion displays public information about listing results passed in to it
function display_formatted_results($result) {

    if ($result != "") {
        
        while ($row = mysqli_fetch_array($result)) {
             echo '<div class="row">
                    <div class="col-sm-6">
                        <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing" style="overflow:hidden;">
                            <div class="media">
                                <a class="pull-left" href="#" target="_parent">';
                                    
                                    $rand_num = rand(1, 3);
                                    $img_name1 = $row["image" . $rand_num];
                                    $img_path = 'http://sfsuswe.com/~f14g02/assets/home_images/home' . $row["id"] . '/small/' . $img_name1;
                                   
                                    echo '<img class="img-responsive" style="margin-top:9%;" src="' .$img_path . '"/></a>

                                <div class="clearfix visible-sm"></div>

                                <div class="media-body fnt-smaller">
                                    <a href="#" target="_parent"></a>

                                    <h3 class="media-heading">
                                        <a href="#" target="_parent">$' . number_format($row["price"]) . '</a><small class="pull-right"><i>' . $row["address"] . '</i></small></h3>
                                    <p><small class="pull-right">' . $row["city"] . ", " . $row["us_state"] . ", " . $row["zip_code"] . '?></small></p>

                                    <br>
                                    <ul class="list-inline mrg-0 btm-mrg-10 clr-535353 pull-right">
                                        <li>' . $row["sq_ft"] . 'SqFt</li>

                                        <li style="list-style: none">|</li>

                                        <li>' . $row["num_bedrooms"] . 'Beds</li>

                                        <li style="list-style: none">|</li>

                                        <li>' . $row["num_bathrooms"] . 'Baths</li>
                                    </ul>
                                    <br><br>
                                    <p class="hidden-xs">' . substr($row["description"], 0, 120) . '...</p>
                                    <div class="btn-toolbar pull-right">
                                        <form action="home_details.php" method="post">
                                            <button type="button" class="btn btn-default btn-sm">
                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
                                            </button>
                                            <button name="details" type="submit" value="' . $row[0] . '" class="btn btn-success btn-sm">Details</button>

                                        </form>

                                    </div>
                                    <br>
                                    <span class="fnt-smaller fnt-lighter fnt-arial">Milestone Properties&copy</span>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-sm-6">';
                                    
                        if ($row = mysqli_fetch_array($result)){
                        
                        echo '<div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing" style="overflow:hidden;">
                            <div class="media">
                                <a class="pull-left" href="#" target="_parent">';
                                    
                                    $rand_num = rand(1, 3);
                                    $img_name1 = $row["image" . $rand_num];
                                    $img_path = 'http://sfsuswe.com/~f14g02/assets/home_images/home' . $row["id"] . '/small/' . $img_name1;
                                   
                                    echo '<img class="img-responsive" style="margin-top:9%;" src="' .$img_path . '"/></a>

                                <div class="clearfix visible-sm"></div>

                                <div class="media-body fnt-smaller">
                                    <a href="#" target="_parent"></a>

                                    <h3 class="media-heading">
                                        <a href="#" target="_parent">$' . number_format($row["price"]) . '</a><small class="pull-right"><i>' . $row["address"] . '</i></small></h3>
                                    <p><small class="pull-right">' . $row["city"] . ", " . $row["us_state"] . ", " . $row["zip_code"] . '</small></p>

                                    <br>
                                    <ul class="list-inline mrg-0 btm-mrg-10 clr-535353 pull-right">
                                        <li>' . $row["sq_ft"] . 'SqFt</li>

                                        <li style="list-style: none">|</li>

                                        <li>' . $row["num_bedrooms"] . 'Beds</li>

                                        <li style="list-style: none">|</li>

                                        <li>' . $row["num_bathrooms"] . 'Baths</li>
                                    </ul>
                                    <br><br>
                                    <p class="hidden-xs">' . substr($row["description"], 0, 120) . '...</p>
                                    <div class="btn-toolbar pull-right">
                                        <form action="home_details.php" method="post">
                                            <button type="button" class="btn btn-default btn-sm">
                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
                                            </button>
                                            <button name="details" type="submit" value="' . $row[0] . '"class="btn btn-success btn-sm">Details</button>

                                        </form>

                                    </div>
                                    <br>
                                    <span class="fnt-smaller fnt-lighter fnt-arial">Milestone Properties&copy</span>
                                </div>
                            </div>

                    </div>
                </div>
                </div>';
        }
        }
        mysqli_free_result($result);
    } else {
        echo "<h1>Must enter valid input</h1>";
    }
}

?>