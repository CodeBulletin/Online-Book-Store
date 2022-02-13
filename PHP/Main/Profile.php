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
        <diV class="MainDiv">
            <div class="FormDiv FormHead dark_col display-6" style="text-align: center;">
                <?php echo $username; ?>
            </div>
            <div class="FormDiv FormBody">
                <form class="form">
                    <div class="form__item">
                        <label for="name" class="form__label">Full name</label>
                        <input type="text" class="form__input" value=<?php echo "\"$user_fullname\"";?> disabled>
                    </div>
                    <div class="form__item">
                        <label for="name" class="form__label">Email</label>
                        <input type="email" class="form__input" value=<?php echo "\"$useremail\"";?> disabled>
                    </div>
                    <div class="form__item">
                        <label for="name" class="form__label">Phone Number</label>
                        <input type="text" class="form__input" value=<?php echo "\"$userphone\"";?> disabled>
                    </div>
                    <div class="form__item">
                        <label for="name" class="form__label">Address</label>
                        <textarea class="form__input"cols="15" rows="5" disabled><?php echo "$useraddr";?></textarea>
                    </div>
                </form>
            </div>
        </diV>
    </body>
</html>

<?php exit(); ?>