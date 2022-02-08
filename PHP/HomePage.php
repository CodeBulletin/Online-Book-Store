<?php
    session_start();

    require "./database.php";

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

    if(isset($_SESSION['userid'])) {
        $sql = "SELECT * FROM `user table` WHERE UserID='". $_SESSION['userid'] ."'";
        $usr_result = $conn->query($sql);

        while($row = $usr_result->fetch_assoc()) {
            $usr_name = $row['Username'];
        }
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
        <link rel="stylesheet" href=<?PHP echo "../CSS/HomePage.css?" . time();?> />
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

        <title>Book Mania</title>
    </head>
    <body>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand font_style" href="./HomePage.php?type=ALL">Book Mania</a>
                <form class="form-dark" method="GET" action="./HomePage.php">
                    <input type="text" placeholder="Search" class="form-control dark font_style" id="search" name="search">
                </form>
                <div class="" id="Books">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle font_style" href="#" role="button" data-bs-toggle="dropdown">Book Type</a>
                            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-start">
                                <li><a class="dropdown-item nav-link font_style" href="./HomePage.php?type=ALL">All Books</a></li>
                                <li><a class="dropdown-item nav-link font_style" href="./HomePage.php?type=Fiction">Fiction</a></li>
                                <li><a class="dropdown-item nav-link font_style" href="./HomePage.php?type=NonFiction">Non Fiction</a></li>
                                <li><a class="dropdown-item nav-link font_style" href="./HomePage.php?type=Manga">Manga</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <?Php if(!isset($_SESSION['userid'])) {?>
                <div class="ms-auto" id="LINKS">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link font_style nav-link" aria-current="page" href="../PHP/Login.php">Login / Sign Up</a>
                        </li>
                    </ul>
                </div>
                <?Php 
                    }
                    else {
                ?>
                <div class="ms-auto" id="USER">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle font_style" href="#" role="button" data-bs-toggle="dropdown">
                                <?Php echo $usr_name?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-lg-end">
                                <li><a class="dropdown-item nav-link font_style" href="./Logout.php">Logout</a></li>
                                <li><a class="dropdown-item nav-link font_style" href="">Cart</a></li>
                                <li><a class="dropdown-item nav-link font_style" href="">Orders</a></li>
                                <li><a class="dropdown-item nav-link font_style" href="">Profile</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <?Php } ?>
            </div>
        </nav>

        <div class="Item__List">
            <?php 
                if($result->num_rows > 0):
                    while($row = $result->fetch_assoc()):
            ?>
                        <a class="Link Item" href=<?php echo "ItemPage.php?id=" . $row["ItemID"]; ?> >
                            <div class="Item__div">
                                <img style="display: inline-block; float: left; margin-right: 20px" alt=<?php echo $row["ItemID"]; ?> height="99px" src=<?php echo "../" . $row["ItemImage"]; ?> />
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