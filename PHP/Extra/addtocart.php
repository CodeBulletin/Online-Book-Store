<?php 
    session_start();
    require "./database.php";

    $sql = "INSERT INTO `cart table` VALUES(". $_SESSION['userid']. ", " . $_GET['id'] .")";

    $conn->query($sql);

    header("Location: ../Main/Cart.php?type=ALL");
    exit();
?>