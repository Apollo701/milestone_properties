<?php
    //define all global variables to be used in connecting to mysql
    define("DB_Server", "sfsuswe.com");
    define("DB_login", "f14g02");
    define("DB_password", "dreamteam12");
    define("DB_name", "student_f14g02");

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
    
    function display_search_results($result){
        while ($row = mysqli_fetch_array($result)) {
            echo 'Price: $' . $row["price"] . "<br />";
            echo 'Address: ' . $row["address"] . ", ";
            echo $row["city"] . ", ";
            echo $row["us_state"] . ", ";
            echo $row["zip_code"] . "<br />";
            echo 'Description: ' . $row["description"] . "<br /><br />";
            $img_name = $row["image1"];
            $img_path = 'http://sfsuswe.com/~f14g02/assets/images/' . $img_name;
            
            ?>
            <img src ="<?php echo $img_path; ?>" style="width:250px;height:200px" />
            
            <?php 
            echo "<br /><br />";
}
        mysqli_free_result($result);
    }
    
    function close_mysql_connection($connection){
        mysqli_close($connection);
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
        $uploadOk=1;
        if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_dir)){
            $image1 = basename($_FILES["uploadFile"]["name"]);
            echo "The file ". basename( $_FILES["uploadFile"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        
        $query = "INSERT INTO listings (description, address, zip_code, city, us_state, price, sq_ft, num_bedrooms,"
                . "num_bathrooms, num_garages, image1)
                    VALUES ('$description', '$address', '$zip_code', '$city', '$us_state', '$price', '$sq_ft',"
                . " '$num_bedrooms', '$num_bathrooms', '$num_garages', '$image1')";
        
        if(!mysqli_query($connection, $query)){
            die('Error: ' . mysqli_error($connection));
        }
        echo "1 record added";
        
        close_mysql_connection($connection);
        
    }
    
    
?>