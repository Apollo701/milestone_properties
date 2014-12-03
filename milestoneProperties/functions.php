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
 * @param mysql_result $result
 * @var int $row
 * @var string $img_name
 * @var string $img_path
 */
//displays listing entry from database
function display_search_results($result) {
    if ($result != "") {
        while ($row = mysqli_fetch_array($result)) {
            echo '<div class="row>';
            echo '<div class="col-md-2>';
            echo '<div class="container bottom-container transbox">';
            echo '<div class="panel panel-default">';
            echo '<div class="panel-heading">$' . $row["price"] . " for " . $row["address"] . ", " . $row["city"] . ", " . $row["us_state"] . ", " . $row["zip_code"] . '</div>';
            echo '<h3 class="panel-title">' . $row["description"] . '</h3>';
            echo '</div>';
            echo '<div class="panel-body">';
            $img_name = $row["image1"];
            $img_path = 'http://sfsuswe.com/~f14g02/assets/images/' . $img_name;
            echo '<img src=" ' . $img_path . '" ' . 'style="width:250px;height:200px" />';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<br>';
        }

        mysqli_free_result($result);
    } else {
        echo "<h1>Must enter valid input</h1>";
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
//finds and returns a featured property from database
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
    $session_name = 'sec_session_id';   // Set a custom session name
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
    session_regenerate_id();    // regenerated the session, delete the old one. 
}

/*
 * @var string $email email of the user, with input sanitized
 * @var string $password password of the user, with input sanitized
 */
//checks if login information is correct, if it is, redirect to the user's profile page
function check_login() {

    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    
    $password = filter_var($_POST["password"], FILTER_SANITIZE_URL);

    $connection = connect_to_mysql();
    $row = mysqli_query($connection, "SELECT FROM USERS WHERE EMAIL == " . $email);

    if (empty($_POST["email"]) || empty($_POST["password"])) {
        echo "Fields cannot be empty.";
    } else if (!password_verify($password, $row["password"])) {
        echo "Wrong email/password combination.";
    } else {
        sec_session_start($email);
        header("Location: profile_user.php");
    }
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

/*
 * @var string $password the password, hashed with default php algorithm
 */
// creates the user in the DB, with the already verified and sanitized information
function create_user() {
    // hashes the password to store it safely in the DB
    $password = password_hash($_POST["InputPW1"], PASSWORD_DEFAULT);
    
    // query to create a new user in the DB
    $query = "INSERT INTO USERS (email,password,zip_code,phone_number,first_name,last_name)";
    $query .="VALUES( ";
    $query .="'{$_POST["InputEmail"]}',";
    $query .= "'{$password}',";
    $query .= "'{$_POST["InputZip"]}',";
    $query .= "'{$_POST["InputPhone"]}',";
    $query .= "'{$_POST["InputFirstName"]}',";
    $query .= "'{$_POST["InputLastName"]}')";
    $result = mysqli_query($connection, $query);
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
            echo '<div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing" style="overflow:hidden;">
                        <div class="media">
                            <a class="pull-left" href="#" target="_parent">';

            $img_name = $row["image1"];
            $img_path = 'http://sfsuswe.com/~f14g02/assets/images/' . $img_name;
            echo '<img class="img-responsive" src="' . $img_path . '"/></a>

                            <div class="clearfix visible-sm"></div>

                            <div class="media-body fnt-smaller">
                                <a href="#" target="_parent"></a>

                                <h3 class="media-heading">
                                  <a href="#" target="_parent">$' . number_format($row["price"]) . '</a><small class="pull-right"><i>' . $row["address"] . '</i></small></h3>
                                     <p><small class="pull-right">' . $row["city"] . ", " . $row["us_state"] . ", " . $row["zip_code"] . '</small></p>

                                <br>
                                <ul class="list-inline mrg-0 btm-mrg-10 clr-535353 pull-right">
                                    <li>' . $row["sq_ft"] . ' SqFt</li>

                                    <li style="list-style: none">|</li>

                                    <li>' . $row["num_bedrooms"] . ' Beds</li>

                                    <li style="list-style: none">|</li>

                                    <li>' . $row["num_bathrooms"] . ' Baths</li>
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
                    </div>';
        }

        mysqli_free_result($result);
    } else {
        echo "<h1>Must enter valid input</h1>";
    }
}

/*
 * @param mysql_result $result listing results to display 
 * @var string img_name name of image file to be displayed
 * @var string img_path path of image to be displayed
 * @var array $row
 */
//funtion displays all information about listing results passed in to it
function display_formatted_details($result) {
    if ($result != "") {
        while ($row = mysqli_fetch_array($result)) {
            echo '<div class="container-full top-container" style="">
        <div class="container container-pad transbox" id="property-listings">
            <div class="row">
              <div class="col-md-12">
                <h1>' . $row["address"] . ", " . $row["city"] . ", " . $row["us_state"] . " " . $row["zip_code"] . '</h1>
                <br>
                <br>
              </div>
            </div>
            
            <div class="row ">
                <div class="col-md-12">
                  <div class="transbox brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing" style="overflow:hidden;">
                        <div class="media center-block">
                            <a class="pull-left" href="#" target="_parent">';

            $img_name = $row["image1"];
            $img_path = 'http://sfsuswe.com/~f14g02/assets/images/' . $img_name;
            echo '<img class="img-responsive" src=" ' . $img_path . '" /></a>

                            <div class="clearfix visible-sm"></div>

                            <div class="media-body fnt-smaller">
                                <a href="#" target="_parent"></a>

                                <h1 class="media-heading">
                                  <a href="#" target="_parent">$' . number_format($row["price"]) . '</a></h1>
                                     <p><small class="pull-right">' . $row["city"] . ", " . $row["us_state"] . ", " . $row["zip_code"] . '</small></p>

                                <br>
                                <ul class="list-inline mrg-0 btm-mrg-10 clr-535353 pull-right">
                                    <li>' . $row["sq_ft"] . ' SqFt</li>

                                    <li style="list-style: none">|</li>

                                    <li>' . $row["num_bedrooms"] . ' Beds</li>

                                    <li style="list-style: none">|</li>

                                    <li>' . $row["num_bathrooms"] . ' Baths</li>
                                </ul>
                                <br><br>
                                <p class="hidden-xs">' . $row["description"] . '</p>
                                    <div class="btn-toolbar pull-right">
                                    <form action="home_details.php" method="post">
                                    <button type="button" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
                                    </button>
                                    <button name="details" type="submit" value="' . $row[0] . '" class="btn btn-success btn-sm">Contact A Realtor</button>
                                    
                                    </form>
                                    
                                    </div>
                                    <br>
                                    <span class="fnt-smaller fnt-lighter fnt-arial">Milestone Properties&copy</span>
                            </div>
                        </div>
                    </div>
                                </div>
        </div>
            </div>';
        }

        mysqli_free_result($result);
    } else {
        echo "<h1>Must enter valid input</h1>";
    }
}

?>