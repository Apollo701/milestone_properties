<?php include 'navbar.php';    ?>
<?php include_once 'functions.php'; ?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <title>Edit Profile</title>
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
            <h1>(%Realtor)'s Profile</h1>                
        </div>
    </body>
</html>

<?php
    $connection = connect_to_mysql();
    $results = details($connection);
    if ($results != "") {
        $row = mysqli_fetch_array($results);
    } else {
        die();
    }
    
    function details($connection) {
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
    
    function row_destroy($connection, $id){
        // sql to delete a record
        $sql = "DELETE FROM offers WHERE id=" + $id;

        if ($connection->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $connection->error;
        }
    }
    
    
    
    
    
?>