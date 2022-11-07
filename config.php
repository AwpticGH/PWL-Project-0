<?php
    $host = "localhost:3306";
    $user = "root";
    $pass = "";
    $db = "g2airline";

    $conn = mysqli_connect($host, $user, $pass, $db);

    if (!$conn) die("Connection Failed : " . mysqli_connect_error());
?>