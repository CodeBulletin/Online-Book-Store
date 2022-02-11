<?Php 
    session_start();

    require "./database.php";

    $user_name = $_POST['luname'];
    $user_password = $_POST['lpass'];

    $sql = "SELECT * FROM `user table` where Username='" .$user_name . "'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        header("Location: ../Main/Login.php?lerror=1");
        exit();
    }

    while($row = $result->fetch_assoc()) {
        if ($row['UserPassword'] == $user_password) {
            $_SESSION['userid'] = $row['UserID'];
        } 
        else {
            header("Location: ../Main/Login.php?lerror=2");
            exit();
        }
    }

    header("Location: ../Main/HomePage.php?type=ALL");
    exit();
?>