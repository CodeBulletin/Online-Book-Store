<?php
    session_start();

    $_SESSION["type"] = "Fiction";

    header("Location: ./PHP/HomePage.php");
    exit();
?>