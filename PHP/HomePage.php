<?php 
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    session_start();

    $mysql_username = 'admin';
    $mysql_servername = 'localhost';
    $password = "1134@aaAA";
    $dbname = 'PHP_Project';
    
    $conn = mysqli_connect($mysql_servername, $mysql_username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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
            $sql = "SELECT * FROM `item table` WHERE CONCAT_WS('', ItemName, ItemSeller, ItemAuthor) LIKE REPLACE(\"%" . $_GET['search'] . "%\", ' ', '%')";
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
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../Libraries/js/bootstrap.min.js"></script>
        <script src="../Libraries/js/jquery-3.6.0.slim.min.js"></script>
        <link rel="stylesheet" href="../Libraries/css/bootstrap.min.css" />
        <link rel="stylesheet" href=<?PHP echo "../CSS/HomePage.css?" . time();?> />

        <title>Book Mania</title>
    </head>
    <body>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Book Mania</a>
                <form class="form-dark" method="GET" action="./HomePage.php">
                    <input type="text" placeholder="Search" class="form-control dark" id="search" name="search">
                </form>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Book Type</a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="./HomePage.php?type=ALL">All Books</a></li>
                                <li><a class="dropdown-item" href="./HomePage.php?type=Fiction">Fiction</a></li>
                                <li><a class="dropdown-item" href="./HomePage.php?type=NonFiction">Non Fiction</a></li>
                                <li><a class="dropdown-item" href="./HomePage.php?type=Manga">Manga</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Signup</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="Item__List">
            <?php 
                if($result->num_rows > 0):
                    while($row = $result->fetch_assoc()):
            ?>
                        <a class="Link Item" href=<?php echo "ItemPage.php?id=" . $row["ItemID"]; ?> >
                            <div class="Item__div">
                                <img style="display: inline-block; float: left; margin-right: 5px" alt="hello" height="96px" src=<?php echo "../" . $row["ItemImage"]; ?> />
                                <div style="display: inline-block; padding: 0">
                                    <span class="Item__Name"><?php echo $row["ItemName"]?></span> <br>
                                    <span class="Item__Price">Price: ₹<?php echo $row["ItemPrice"]; ?></span> <br>
                                    <span>Author: <?php echo $row["ItemAuthor"]; ?> | Seller: <?php echo $row["ItemSeller"]; ?></span>
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