<?php 
    session_start();

    // Credit Card Validation using otp /*Not Implemented assuming correct*/

    require "./database.php";

    $sql = "SELECT COUNT(*) AS num_items, SUM(`item table`.`ItemPrice`) AS total FROM `item table` INNER JOIN `cart table` ON `item table`.`ItemID` = `cart table`.`ItemID` WHERE `cart table`.`UserID`='". $_SESSION['userid'] ."'";
    $result = $conn->query($sql);
    $tot = $result->fetch_assoc()['total'];

    $sql = "INSERT INTO `order table` VALUES (DEFAULT, $tot, NOW())";
    $conn->query($sql);
    $OrderID = $conn->insert_id;

    $sql = "INSERT INTO `user-order` VALUES (". $_SESSION['userid'] .", ". $OrderID .")";
    $conn->query($sql);

    $sql = "SELECT ItemID FROM `cart table` WHERE UserID=". $_SESSION['userid'];
    $result = $conn->query($sql);

    $oitem = "";
    while($row = $result->fetch_assoc()) {
        $oitem = $oitem . "(". $OrderID .", ". $row['ItemID'] ."), ";
    }

    $sql = "INSERT INTO `order-item` VALUES ". substr($oitem, 0, -2);
    $conn->query($sql);

    $sql = "DELETE FROM `cart table` WHERE UserID=" . $_SESSION['userid'] . "";
    $conn->query($sql);

    header("Location: ../Main/Confirmation.php?orderid=" . $OrderID);
    exit();
?>