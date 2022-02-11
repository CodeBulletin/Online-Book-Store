<?php 
    session_start();
    require "./database.php";
    
    $sql="DELETE FROM `cart table` WHERE `UserID`=". $_SESSION['userid'] ." AND `ItemID`=" . $_GET['id'];

    $conn->query($sql);

    header("Location: ../Main/Cart.php");
    exit();
?>