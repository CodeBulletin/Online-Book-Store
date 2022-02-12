<?php
    session_start();

    require "../Extra/database.php";

    $sql = "SELECT * FROM `order table` INNER JOIN `user-order` ON `order table`.OrderID = `user-order`.OrderID WHERE `user-order`.UserID=". $_SESSION['userid'];
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require "../Extra/libraries.php" ?>

        <link rel="stylesheet" href="../../CSS/Orders.css" />

        <title>Book Mania Orders</title>
    </head>
    <body>
        <!-- Navbar -->
        <?Php require "../Extra/NavBar.php" ?>

        <div class="Order_List">
            <?php 
                if($result->num_rows > 0):
                    while($row = $result->fetch_assoc()):
            ?>
                        <a class="Link" href=<?php echo "./Order.php?orderid=" . $row["OrderID"]; ?> >
                            <div class="Order">
                                <div class="OrderID">
                                    <span class="h2 text font_style">Order ID: #<?php echo $row["OrderID"]; ?></span> <br>
                                </div>
                                <div class="Price">
                                    <span class="h2 text font_style">Payment: ₹<?php echo $row["OrderTotal"]; ?></span> <br>
                                </div>
                                <div class="Date">
                                    <span class="h2 text font_style">Orderd On: <?php echo $row["OrderDateTime"]; ?></span>
                                </div>
                            </div>
                        </a>
            <?php
                    endwhile;
                endif
            ?>
        </div>
    </body>
</html>

<?php exit(); ?>