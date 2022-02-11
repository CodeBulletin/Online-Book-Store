<?php 
    if(isset($_SESSION['userid'])) {
        $cart_text = "Cart";
        $sql = "SELECT * FROM `user table` WHERE UserID='". $_SESSION['userid'] ."'";
        $usr_result = $conn->query($sql);
        $row = $usr_result->fetch_assoc();

        $usr_name = $row['Username'];

        $sql = "SELECT COUNT(*) AS num_items, SUM(`item table`.`ItemPrice`) AS total FROM `item table` INNER JOIN `cart table` ON `item table`.`ItemID` = `cart table`.`ItemID` WHERE `cart table`.`UserID`='". $_SESSION['userid'] ."'";
        $res = $conn->query($sql);
        $row = $res->fetch_assoc();

        $sql = "SELECT * FROM `cart table` WHERE `UserID`=" . $_SESSION['userid'];
        $res = $conn->query($sql);
        if($res->num_rows > 0) { 
            $cart_text = "Cart | ". $row['num_items'] . " | ₹" . $row['total'];
        }
    }
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand font_style" href="../Main/HomePage.php?type=ALL">Book Mania</a>
        <form class="form-dark" method="GET" action="../Main/HomePage.php">
            <input type="text" placeholder="Search" class="form-control dark font_style" id="search" name="search">
        </form>
        <div class="" id="Books">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle font_style" href="#" role="button" data-bs-toggle="dropdown">Book Type</a>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-start">
                        <li><a class="dropdown-item nav-link font_style" href="../Main/HomePage.php?type=ALL">All Books</a></li>
                        <li><a class="dropdown-item nav-link font_style" href="../Main/HomePage.php?type=Fiction">Fiction</a></li>
                        <li><a class="dropdown-item nav-link font_style" href="../Main/HomePage.php?type=NonFiction">Non Fiction</a></li>
                        <li><a class="dropdown-item nav-link font_style" href="../Main/HomePage.php?type=Manga">Manga</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <?Php if(!isset($_SESSION['userid'])) {?>
        <div class="ms-auto" id="LINKS">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link font_style nav-link" aria-current="page" href="../Main/Login.php">Login / Sign Up</a>
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
                        <li><a class="dropdown-item nav-link font_style" href="../Extra/Logout.php">Logout</a></li>
                        <li><a class="dropdown-item nav-link font_style" href="../Main/Cart.php"><?php echo $cart_text ?></a></li>
                        <li><a class="dropdown-item nav-link font_style" href="">Orders</a></li>
                        <li><a class="dropdown-item nav-link font_style" href="">Profile</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <?Php } ?>
    </div>
</nav>