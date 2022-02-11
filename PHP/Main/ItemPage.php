<?Php 
    session_start();

    require "../Extra/database.php";

    if(!isset($_GET['id'])) {
        $sql = "SELECT * FROM `item table`";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $_GET['id'] = $row["ItemID"];
    }

    $sql = "SELECT * FROM `item table` WHERE ItemID='" . $_GET['id'] . "'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $item_image = $row["ItemImage"];
    $item_name = $row["ItemName"];
    $item_author = $row["ItemAuthor"];
    $item_seller = $row["ItemSeller"];
    $item_desc = $row["ItemDiscription"];
    $item_price = $row["ItemPrice"];


    if(isset($_SESSION['userid'])) {
        $sql = "SELECT * FROM `cart table` WHERE UserID='". $_SESSION['userid'] ."'AND ItemID='" . $_GET['id'] ."'";
        $cart_result = $conn->query($sql);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require "../Extra/libraries.php" ?>

        <link rel="stylesheet" href="../../CSS/ItemPage.css">

        <title>Book Mania "<?php echo $item_name; ?>"</title>

        <script defer>
            function click(loc) {
                console.log(loc);
                location.href = loc;
            }
        </script>
    </head>
    <body>
        <!-- Navbar -->
        <?Php require "../Extra/NavBar.php"?>
        <div class=FullScreen>
            <div class="ItemGrid">
                <div class="Head dark_col display-6 font_style"><?php echo $item_name; ?></div>
                <div class="Img dark_col">
                    <img src=<?php echo "../../" . $item_image?> alt=<?php echo $_GET['id']; ?> class="IMAGE">
                </div>
                <div class="Desc dark_col">
                    <span class="Major dark_col font_style">
                        Author: <?php echo $item_author?> <br>
                    </span>
                    <span class="Major dark_col font_style">
                        Seller: <?php echo $item_seller?> <br>
                    </span>
                    <span class="Minor dark_col font_style">
                        Description: <?php echo $item_desc?> <br>
                    </span>
                </div>
                <div class="Price dark_col">
                    <div class="row">
                        <div class="col">
                            <span class="Major dark_col font_style price">
                                Price: ₹<?php echo $item_price?>
                            </span>
                        </div>
                        <div class="col">
                            <form action=<?php echo isset($usr_name) ? ($cart_result->num_rows > 0 ? "\"\"" : "\"../Extra/addtocart.php?id=". $_GET['id'] ."\"" ) : "\"./Login.php\""; ?> method="post">
                                <button class="button" type="submit">
                                    <?php 
                                        echo isset($usr_name) ? ($cart_result->num_rows > 0 ? "Already in cart" : "Add to Cart") : "Login";
                                    ?>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php exit(); ?>