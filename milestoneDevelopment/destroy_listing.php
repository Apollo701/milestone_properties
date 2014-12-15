<?php
require_once("functions.php");
$connection = connect_to_mysql();
destroy_listing($connection);
// redirects to homepage after completed input
header("Location: profile_realtor_edit.php");
    exit();
?>
