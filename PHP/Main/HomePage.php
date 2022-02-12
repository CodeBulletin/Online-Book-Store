<?php
    session_start();

    require "../Extra/database.php";

    if(isset($_GET['type'])) {
        if($_GET['type'] == 'ALL') {
            $sql = "SELECT * FROM `item table` ORDER BY ItemName";
        }
        else {
            $sql = "SELECT * FROM `item table` WHERE `Type`='" . $_GET['type'] . "' ORDER BY ItemName";
        }
    } 
    else {
        if(isset($_GET['search'])) {
            $sql = "SELECT * FROM `item table` WHERE CONCAT_WS('', ItemName, ItemSeller, ItemAuthor, Type) LIKE REPLACE(\"%" . $_GET['search'] . "%\", ' ', '%')  ORDER BY ItemName";
        } 
        else {
            $sql = "SELECT * FROM `item table` ORDER BY ItemName";
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
                        <a class="Link" href=<?php echo "./ItemPage.php?id=" . $row["ItemID"]; ?> >
                            <div class="Item">
                                <div class="Image">
                                    <img class="img" alt=<?php echo $row["ItemID"]; ?> height="99px" src=<?php echo "../../" . $row["ItemImage"]; ?> />
                                </div>
                                <div class="Name">
                                    <span class="name font_style"><?php echo $row["ItemName"]?></span> <br>
                                    <span class="price font_style">Price: ₹<?php echo $row["ItemPrice"]; ?></span> <br>
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