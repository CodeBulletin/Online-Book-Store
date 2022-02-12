<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require "../Extra/libraries.php"; ?>

        <link rel="stylesheet" href="../../CSS/UI.css">

        <style>
            body {
                margin: 25px;
                text-align: center;
            }
        </style>

        <meta http-equiv="refresh" content=<?php echo "3;url=./Order.php?orderid=".$_GET['orderid']; ?> />

        <title>Book Mania</title>
    </head>
    <body>
        <span class="display-5 dark_col"> Your Order #<?php echo $_GET['orderid']; ?> is sucessfully placed </span> <br>
        <span class="h4 dark_col"> Redirecting to order page in 3 seconds </span>
    </body>
</html>