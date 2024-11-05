<?php
    $servername = "localhost";
    $username = "db24_100";
    $password = "db24_100";
    $dbname = "db24_100_g09";
    $conn = new mysqli($servername,$username,$password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(!$conn->select_db($dbname)){
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->set_charset("utf8");
?>