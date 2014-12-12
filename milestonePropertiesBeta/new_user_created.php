<?php
include_once 'functions.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <pre>
        <?php
            $connection = connect_to_mysql();
            input_user($connection);
            
            /* Redirect browser */
            header("Location: index.php");
            exit;
        ?>
        </pre>
    </body>
</html>

