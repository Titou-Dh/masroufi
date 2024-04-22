<?php
$servername = "sql111.infinityfree.com";
$username = "if0_36410573";
$password = "jVi8pvMHajXE";
$dbname = "if0_36410573_masroufi";
$port = 3306;

$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    echo "Connected successfully";
}

?>