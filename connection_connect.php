<?php
    $servername = "bx5u4qtnmyqtxpkwcacj-mysql.services.clever-cloud.com";
    $username = "ulgagbtbdlssfiwt";
    $password = "QnOhjoSRm6noNT4dtABJ";
    $dbname = "bx5u4qtnmyqtxpkwcacj";
    $conn = new mysqli($servername,$username,$password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(!$conn->select_db($dbname)){
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->set_charset("utf8");
?>