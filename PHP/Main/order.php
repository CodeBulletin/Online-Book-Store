<?php 
    session_start();

    require "../Extra/database.php";

    $valid=true;

    if(isset($_GET['orderid'])) {
        $sql = "SELECT * FROM `user-order` WHERE UserID=" . $_SESSION['userid'] ." AND OrderID=". $_GET['orderid'];
        $result = $conn->query($sql);
        if($result->num_rows == 0) {
            $valid = false;
        }
        else {
            $sql = "SELECT * FROM `order table` WHERE `OrderID`='". $_GET['orderid'] ."'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $tot = $row['OrderTotal'];
            $orderd_on = $row['OrderDateTime'];

            $sql = "SELECT * FROM `item table` INNER JOIN `order-item` ON `item table`.`ItemID` = `order-item`.`ItemID` WHERE `order-item`.`OrderID`='". $_GET['orderid'] ."'";
            $result = $conn->query($sql);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require "../Extra/libraries.php" ?>

        <link rel="stylesheet" href="../../CSS/Cart.css" />

        <title>Book Mania Order</title>
    </head>
    <body>
        <?php require "../Extra/NavBar.php"; ?>
        <div class="FullScreen">
            <div class="CartGrid">
                <?php if(isset($_GET['orderid'])  && $valid && $result->num_rows > 0):?>
                    <div class="items">
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <a class="Link" href=<?php echo "./ItemPage.php?id=".$row['ItemID']?>>
                                <div class="item">
                                    <div class="Image">
                                        <img class="img" src=<?php echo "../../" . $row['ItemImage']; ?> alt=<?php echo $row['ItemName']; ?> />
                                    </div>
                                    <div class="Name">
                                        <span class="dark_col h1 font_style"><?php echo $row['ItemName']?></span><br>
                                        <span class="dark_col h3 font_style">Price: ₹<?php echo $row['ItemPrice']?></span><br>
                                    </div>
                                </div>
                            </a>
                        <?php endwhile;?>
                    </div>
                    <div class="total">
                        <span class="dark_col display-5 font_style">Order ID: #<?php echo $_GET['orderid']; ?></span> <br>
                        <span class="dark_col display-6 font_style">Total Cost: ₹<?php echo $tot?></span><br>
                        <span class="dark_col h5 font_style">Orderd On: <?php echo $orderd_on?></span>
                    </div>
                <?php 
                    else:
                ?>
                    <div class="empty dark_col display-5">The Order #<?php echo isset($_GET['orderid']) ? $_GET['orderid'] : 'null';?> does not exist</div>
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>

<?php exit(); ?>