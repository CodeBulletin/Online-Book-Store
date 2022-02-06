<?php
    session_start();

    $_SESSION['type'] = $_GET['type'];

    header("Location: ./HomePage.php");
    exit();
?>