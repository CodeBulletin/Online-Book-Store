<?Php 
    session_start();

    require "./database.php";

    $username = $_POST['uname'];
    $user_password = $_POST['pass'];
    $user_fname = $_POST['fname'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['mno'];
    $user_address = $_POST['Address'];

    $sql = "SELECT * FROM `user table` where Username='" .$username . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        header("Location: ./Login.php?serror=1");
        exit();
    }

    $sql = "INSERT INTO `user table` VALUES (DEFAULT, '$username', '$user_password', '$user_fname', '$user_email', '$user_phone', '$user_address')";
    $result = $conn->query($sql);

    $sql = "SELECT * FROM `user table` where Username='" .$username . "'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        $_SESSION['userid'] = $row['UserID'];
    }

    header("Location: ./HomePage.php?type=ALL");
    exit();
?>