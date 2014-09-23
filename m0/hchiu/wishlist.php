<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Wish List Application</title>
        <link href="wishlist.css" type="text/css" rel="stylesheet" media="all" />
    </head>
    <body>
        <h1>
            Wish List of <?php echo $_GET['user']; ?>
        </h1>
        <?php
        require_once("Includes/db.php");

        $wisherID = WishDB::getInstance()->get_wisher_id_by_name($_GET['user']);
        if (!$wisherID) {
            exit("The person " . $_GET['user'] . " is not found. Please check the spelling and try again");
        }
        ?>
        <table class="std">
            <tr>
                <th>Item</th>
                <th>Due Date</th>
            </tr>
            <?php
            $result = WishDB::getInstance()->get_wishes_by_wisher_id($wisherID);
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr><td>&nbsp;" . htmlentities($row['description']) . "</td>";
                echo "<td>&nbsp;" . htmlentities($row['due_date']) . "</td></tr>\n";
            }
            mysqli_free_result($result);
            ?>
        </table>
    </body>
</html>