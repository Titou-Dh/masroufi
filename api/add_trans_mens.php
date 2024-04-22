<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "masroufi";


$id_user = $_POST['id_user'];
$sujet = $_POST['subject'];
$amount = $_POST['amount'];

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO monthly_expenses (id_user, sujet, amount) VALUES (?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "isd", $id_user, $sujet, $amount);



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