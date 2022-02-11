<?php
    $mysql_username = 'admin';
    $mysql_servername = 'localhost';
    $password = "1134@aaAA";
    $dbname = 'PHP_Project';
    
    $conn = mysqli_connect($mysql_servername, $mysql_username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>