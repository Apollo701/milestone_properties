<?php
require_once("functions.php");
$connection = connect_to_mysql();
//edit_listing($connection);
// redirects to homepage after completed input
header("Location: realtor_database.php");
$tmp = $_POST['listingID'];
if (!mysql_connect(DB_Server, DB_login, DB_password))
                die("Can't connect to database");
            if (!mysql_select_db(DB_name))
                die("Can't select database");
// sending query
            $result = mysql_query("SELECT * FROM listings WHERE id = '$tmp'");
            if (!$result) {
                die("Query to show fields from table failed");
            }
            
            $fields_num = mysql_num_fields($result);
            
            //echo "<h1>Table: {$table}</h1>";
            echo "<table border='1'><tr>";
            // printing table headers
            $field = mysql_fetch_field($result);
                echo "<td><b>{$field->name}</b></td>";
            $field = mysql_fetch_field($result);
            for($i=0; $i<$fields_num-7; $i++)
            {
                $field = mysql_fetch_field($result);
                echo "<td><b>{$field->name}\t</b></td>";
            }
            echo "</tr>\n";
            // printing table rows
            
            
                echo "<tr>";

                // $row is array... foreach( .. ) puts every element
                // of $row to $cell variable
              "<form name='Edit' action='edit_listing.php' method='POST'>";
               while($row = mysql_fetch_row($result))
            {
                echo "<tr>";

                // $row is array... foreach( .. ) puts every element
                // of $row to $cell variable
                $i = 0;
                foreach($row as $cell){
                    if ($i == 0){
                        $listingID = $cell;
                    }
                    if ($i == 1){
                        $cell;
                    }
                    else if ($i > 10){
                        break;
                    }
                    else{
                        //echo"<td>$cell</td>";
                        $tmp = mysql_fetch_field($result,$i);
                        $edit_field = $tmp->name;
                       //echo "<td> $edit_field </td>";
                        echo "<td><input type='text' name='num_bedrooms' value='$cell' method='POST'><br></td>";

                    }
                    $i++;
                }
            }
            
            echo "<td>
                    <input type='hidden' name='listingID' value='$listingID'/>
                    <input type='submit' name='deleteID' value='Edit'/>
                </form>
                </td>";
    exit();
?>
