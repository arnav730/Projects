<?php
    session_start();

    $hostName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "storedb";

    $conn = new mysqli($hostName,$userName,$password,$dbName);

    date_default_timezone_set('Asia/Kolkata');
    $t = time();
    $emailId = $_SESSION['email'];

    $sql = "UPDATE ADMIN SET TIMESTAMP = '$t' WHERE EMAIL = '$emailId'";

    $conn->query($sql);

    session_unset();
    session_destroy();
    header("Location: ./index.php");

    ?>

    