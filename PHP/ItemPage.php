<?Php 
    session_start();

    require "./database.php";

    $sql = "SELECT * FROM `item table` WHERE ItemID='" . $_GET['id'] . "'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        $item_image = $row["ItemImage"];
        $item_name = $row["ItemName"];
        $item_author = $row["ItemAuthor"];
        $item_seller = $row["ItemSeller"];
        $item_desc = $row["ItemDiscription"];
        $item_price = $row["ItemPrice"];
    }

    if(isset($_SESSION['userid'])) {
        $sql = "SELECT * FROM `user table` WHERE UserID='". $_SESSION['userid'] ."'";
        $usr_result = $conn->query($sql);

        while($row = $usr_result->fetch_assoc()) {
            $usr_name = $row['Username'];
        }

        $sql = "SELECT * FROM `cart table` WHERE UserID='". $_SESSION['userid'] ."'AND ItemID='" . $_GET['id'] ."'";
        $cart_result = $conn->query($sql);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script defer src="../Libraries/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../Libraries/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../CSS/ItemPage.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

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
        <?Php require "./NavBar.php"?>
        <div class=FullScreen>
            <div class="ItemGrid">
                <div class="Head dark_col display-6 font_style"><?php echo $item_name; ?></div>
                <div class="Img dark_col">
                    <img src=<?php echo "../" . $item_image?> alt=<?php echo $_GET['id']; ?> class="IMAGE">
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
                            <form action=<?php echo $cart_result->num_rows > 0 ? "\"\"" : (isset($usr_name) ? "\"./addtocart.php?id=". $_GET['id'] ."\"" : "\"./Login.php\""); ?> method="post">
                                <button class="button" type="submit">
                                    <?php 
                                        echo $cart_result->num_rows > 0 ? "Already in cart" : (isset($usr_name) ? "Add to Cart" : "Login");
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