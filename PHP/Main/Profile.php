<?php 
    session_start();

    require "../Extra/database.php";

    $sql = "SELECT * FROM `user table` where UserID=". $_SESSION['userid'];
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $user_fullname = $row['UserFullName'];
    $username = $row['Username'];
    $useremail = $row['UserEmail'];
    $userphone = $row['UserPhone'];
    $useraddr = $row['UserAddress']
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require "../Extra/libraries.php" ?>

        <link rel="stylesheet" href="../../CSS/Profile.css">
        <title>Profile</title>
    </head>
    <body>
        <!-- Navbar -->
        <?php require "../Extra/NavBar.php"; ?>

        <div class="ProfilePad">
            <div class="ProfileDiv">
                <span class="display-6 dark_col">User Full Name<br> <?php echo $user_fullname; ?></span><br>
                <span class="display-6 dark_col">User Name<br> <?php echo $username; ?></span><br>
                <span class="display-6 dark_col">User Email<br> <?php echo $useremail; ?></span><br>
                <span class="display-6 dark_col">User Mobile no<br> <?php echo $userphone; ?></span><br>
                <span class="display-6 dark_col">User Address<br> <?php echo $useraddr; ?></span>
            </div>
        </div>
    </body>
</html>

<?php exit(); ?>