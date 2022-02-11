<?php 
    session_start();

    require "../Extra/database.php";

    $sql = "SELECT COUNT(*) AS num_items, SUM(`item table`.`ItemPrice`) AS total FROM `item table` INNER JOIN `cart table` ON `item table`.`ItemID` = `cart table`.`ItemID` WHERE `cart table`.`UserID`='". $_SESSION['userid'] ."'";
    $result = $conn->query($sql);
    $tot = $result->fetch_assoc()['total'];

    $sql = "SELECT * FROM `item table` INNER JOIN `cart table` ON `item table`.`ItemID` = `cart table`.`ItemID` WHERE `cart table`.`UserID`='". $_SESSION['userid'] ."'";
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
                <?php if($result->num_rows > 0):?>
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
                                        <form action=<?php echo "../Extra/removefromcart.php?id=".$row['ItemID'];?> method="post" class="buy">
                                            <button class="button font_style">
                                                Remove
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </a>
                        <?php endwhile;?>
                    </div>
                    <div class="total">
                        <span class="dark_col display-6 font_style">Total Cost: ₹<?php echo $tot?></span>
                        <form action="../Main/Payment.php" method="post" class="buy">
                            <button class="button font_style">
                                proceed to checkout 
                            </button>
                        </form>
                    </div>
                <?php 
                    else:
                ?>
                    <div class="empty dark_col display-5">Your Cart is Emtpy</div>
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>

<?php exit(); ?>