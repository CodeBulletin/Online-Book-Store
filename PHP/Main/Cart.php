<?php 
    session_start();

    require "../Extra/database.php";

    $sql = "SELECT COUNT(*) AS num_items, SUM(`item table`.`ItemPrice`) AS total FROM `item table` INNER JOIN `cart table` ON `item table`.`ItemID` = `cart table`.`ItemID` WHERE `cart table`.`UserID`='". $_SESSION['userid'] ."'";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require "../Extra/libraries.php" ?>

        <link rel="stylesheet" href="../../CSS/Cart.css" />

        <title>Book Mania Cart</title>
    </head>
    <body>
        <?php require "../Extra/NavBar.php"; ?>
        <div class="FullScreen">
            <div class="CartGrid">
                <div>
                    Items#
                </div>
                <div>
                    <span class="Price">Total Cost: <?php ?></span>
                </div>
            </div>
        </div>
    </body>
</html>

<?php exit(); ?>