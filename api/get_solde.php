<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "masroufi";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT solde FROM users WHERE id_user = 1";
$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
  die("Prepare statement failed: " . mysqli_error($conn));
}


if (mysqli_stmt_execute($stmt)) {
  mysqli_stmt_bind_result($stmt, $solde);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
  echo $solde;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
