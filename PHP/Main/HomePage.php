<?php
    session_start();

    require "../Extra/database.php";

    if(isset($_GET['type'])) {
        if($_GET['type'] == 'ALL') {
            $sql = "SELECT * FROM `item table`";
        }
        else {
            $sql = "SELECT * FROM `item table` WHERE `Type`='" . $_GET['type'] . "'";
        }
    } 
    else {
        if(isset($_GET['search'])) {
            $sql = "SELECT * FROM `item table` WHERE CONCAT_WS('', ItemName, ItemSeller, ItemAuthor, Type) LIKE REPLACE(\"%" . $_GET['search'] . "%\", ' ', '%')";
        } 
        else {
            $sql = "SELECT * FROM `item table`";
        }
    }
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require "../Extra/libraries.php" ?>

        <link rel="stylesheet" href="../../CSS/HomePage.css" />

        <title>Book Mania</title>
    </head>
    <body>
        <!-- Navbar -->
        <?Php require "../Extra/NavBar.php" ?>

        <div class="Item__List">
            <?php 
                if($result->num_rows > 0):
                    while($row = $result->fetch_assoc()):
            ?>
                        <a class="Link Item" href=<?php echo "./ItemPage.php?id=" . $row["ItemID"]; ?> >
                            <div class="Item__div">
                                <img style="display: inline-block; float: left; margin-right: 20px" alt=<?php echo $row["ItemID"]; ?> height="99px" src=<?php echo "../../" . $row["ItemImage"]; ?> />
                                <div style="display: inline-block; padding: 0">
                                    <span class="Item__Name font_style"><?php echo $row["ItemName"]?></span> <br>
                                    <span class="Item__Price font_style">Price: ₹<?php echo $row["ItemPrice"]; ?></span> <br>
                                    <span class="font_style">Author: <?php echo $row["ItemAuthor"]; ?> | Seller: <?php echo $row["ItemSeller"]; ?></span>
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