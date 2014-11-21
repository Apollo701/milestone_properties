<?php
    //define all global variables to be used in connecting to mysql
    define("DB_Server", "sfsuswe.com");
    define("DB_login", "f14g02");
    define("DB_password", "dreamteam12");
    define("DB_name", "student_f14g02");
    $counter = 0;

    //function to initiate the connection to the mysql database, and choose the particular db
    function connect_to_mysql(){
        $connection = mysqli_connect(DB_Server, DB_login, DB_password, DB_name);
        if (!$connection) {
            die("Database connection failed: " . mysqli_connect_errno() . 
		"(" . mysqli_connect_error() . ")");
        }
        mysqli_set_charset($connection, 'utf-8');
        return $connection;
    }
    
    
    function milestone_search($connection){
        if (empty($_POST["usersearch"])) {
    $nameErr = "Name is required";
    return $result = "";
        } else{
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
    
    function display_search_results($result){
        if ($result != ""){
        while ($row = mysqli_fetch_array($result)) {
            echo '<div class="row>';
            echo '<div class="col-md-2>';
            echo '<div class="container bottom-container transbox">';
            echo '<div class="panel panel-default">';
            echo '<div class="panel-heading">$' . $row["price"] . " for " . $row["address"] . ", " . $row["city"] . ", " . $row["us_state"]. ", " . $row["zip_code"] . '</div>';
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
        
    
    function close_mysql_connection($connection){
        mysqli_close($connection);
    }
    
    function get_lat_long($address0){
    $address1 = str_replace(" ", "+", $address0);
    $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address1&sensor=false");
    $json1 = json_decode($json);

    $lat = $json1->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
    $long = $json1->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
    $return = array(
        'lat' => $lat,
        'long' =>$long,
        );
    return $return;
}
    function get_walkscore($address){
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
    
    function input_listing($connection){
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
        $walkscore= get_walkscore($w_address);
        $uploadOk=1;
        if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_dir)){
            $image1 = basename($_FILES["uploadFile"]["name"]);
            echo "The file ". basename( $_FILES["uploadFile"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        
        $query = "INSERT INTO listings (description, address, zip_code, city, us_state, price, sq_ft, num_bedrooms,"
                . "num_bathrooms, num_garages, image1, walkscore)
                    VALUES ('$description', '$address', '$zip_code', '$city', '$us_state', '$price', '$sq_ft',"
                . " '$num_bedrooms', '$num_bathrooms', '$num_garages', '$image1', '$walkscore')";
        
        if(!mysqli_query($connection, $query)){
            die('Error: ' . mysqli_error($connection));
        }
        echo "1 record added";
        
        close_mysql_connection($connection);
        
    }
    
    function input_user($connection){
        //$connection = connect_to_mysql();
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $query = "INSERT INTO users (email, password, user_type, zip_code, phone_number, first_name, last_name)
                    VALUES ('$email', '$password', 1,DEFAULT, DEFAULT, '$first_name', '$last_name')";
        
        if(!mysqli_query($connection, $query)){
            die('Error: ' . mysqli_error($connection));
        }
        echo "1 record added";
        
        close_mysql_connection($connection);
        
    }
    
    function number_of_listings($result){
        if ($result == ""){
            echo 0;
        }else {
        echo mysqli_num_rows($result);
    }
    }
    
    function run_scripts_body(){
        echo '        
            <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        ';   
    }
    
    function run_scripts_head(){
        echo '
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
            <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
            <link href="http://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet" type="text/css">
        ';
    }
    
    function featured_properties($connection) {
        $query = "SELECT * ";
	$query .="FROM listings ";
	$query .="ORDER BY RAND()";
        $query .="LIMIT 1";
        return $result = mysqli_query($connection, $query);
    }
    
    function sec_session_start() {
        $session_name = 'sec_session_id';   // Set a custom session name
        $secure = SECURE;
        // This stops JavaScript being able to access the session id.
        $httponly = true;
        // Gets current cookies params.
        $cookieParams = session_get_cookie_params();
        session_set_cookie_params($cookieParams["lifetime"],
            $cookieParams["path"], 
            $cookieParams["domain"], 
            $secure,
            $httponly);
        // Sets the session name to the one set above.
        session_name($session_name);
        session_start();            // Start the PHP session 
        session_regenerate_id();    // regenerated the session, delete the old one. 
    }
    
    function check_login() {
        
        $email      = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $password   = filter_var($_POST["password"], FILTER_SANITIZE_URL);
        
        $connection = connect_to_mysql();
        $row = mysqli_query($connection, "SELECT FROM USERS WHERE EMAIL == " . $email);
        
        if(empty($_POST["email"]) || empty($_POST["password"])) {
            echo "Fields cannot be empty.";
        }
        
        else if(!password_verify($password, $row["password"])) {
            echo "Wrong email/password combination.";
        }
        
        else {
            sec_session_start();
            header("Location: profile_user.php"); 
        }
    }
    
        function display_search_resultstest($result){
        if ($result != ""){
        while ($row = mysqli_fetch_array($result)) {
                  echo '<div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing" style="overflow:hidden;">
                        <div class="media">
                            <a class="pull-left" href="#" target="_parent">
                            <img alt="image" class="img-responsive" style="height:90%;" src="http://images.prd.mris.com/image/V2/1/vGoNjc2jHGb87GlnnDQlf6LxeOUgIOn0bL6Wvn1nEnig2Ntq6W7xN5cOQBZZeNxl9O42DOkHUw0LNnj1ZB2KHA.jpg"></a>

                            <div class="clearfix visible-sm"></div>

                            <div class="media-body fnt-smaller">
                                <a href="#" target="_parent"></a>

                                <h4 class="media-heading">
                                  <a href="#" target="_parent">$' . number_format($row["price"]) . '</a><small class="pull-right">' . $row["address"] . '</small>
                                     <small class="pull-right">' . $row["city"] . ", " . $row["us_state"]. ", " . $row["zip_code"] . '</small></h4>

<br>
                                <ul class="list-inline mrg-0 btm-mrg-10 clr-535353 pull-right">
                                    <li>' . $row["sq_ft"] . ' SqFt</li>

                                    <li style="list-style: none">|</li>

                                    <li>' . $row["num_bedrooms"] . ' Beds</li>

                                    <li style="list-style: none">|</li>

                                    <li>' . $row["num_bathrooms"] . ' Baths</li>
                                </ul>
<br><br>
                                <p class="hidden-xs">' . substr($row["description"], 0, 120) . '...</p><span class="fnt-smaller fnt-lighter fnt-arial">Milestone Properties&copy</span>
                            </div>
                        </div>
                    </div>';
        }
        }
        }
?>