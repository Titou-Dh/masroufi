<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "masroufi";


$id_user = $_POST['id_user'];
$name = $_POST['name'];
$price = $_POST['price'];

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO dependents (name, price) VALUES (?, ?)";


$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sd", $name, $price);



if (mysqli_stmt_execute($stmt)) {
    echo "
     ...
    ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);


?>
