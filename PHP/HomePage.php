<?php 
    session_start();

    $mysql_username = 'admin';
    $mysql_servername = 'localhost';
    $password = "1134@aaAA";
    $dbname = 'PHP_Project';
    
    $conn = mysqli_connect($mysql_servername, $mysql_username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM `item table` WHERE `Type`='" . $_SESSION['type'] . "'";
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
        <link rel="stylesheet" href="../Libraries/css/bootstrap.min.css">
        <link rel="stylesheet" href="../CSS/HomePage.css">

        <title>Book Mania</title>
    </head>
    <body>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Book Mania</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Book Type</a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="./TypeSelector.php?type=Fiction">Fiction</a></li>
                                <li><a class="dropdown-item" href="./TypeSelector.php?type=NonFiction">Non Fiction</a></li>
                                <li><a class="dropdown-item" href="./TypeSelector.php?type=Manga">Manga</a></li>
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

        <div class="row">
            <?php 
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
            ?>
                        <a href=<?php echo "ItemPage.php?id=" . $row["ItemID"]; ?>><div class="col-md-5">
                            <img height="96px" src=<?php echo "../" . $row["ItemImage"]; ?> alt=<?php echo $row["ItemID"]; ?>>
                            <h2><?php echo $row["ItemName"] . " by " . $row["ItemAuthor"]; ?></h2>
                            <h2>Price: <?php echo $row["ItemPrice"]; ?></h2>
                        </div></a>
            <?php
                    }
                }
            ?>
        </div>
    </body>
</html>

<?php exit(); ?>