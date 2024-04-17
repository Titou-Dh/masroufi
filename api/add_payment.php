<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "masroufi";


$id_user = $_POST['id_user'];
$name = $_POST['name'];
$prix = $_POST['prix'];

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare SQL statement
$sql = "INSERT INTO payments (id_user, id_element, payment_date , prix) VALUES (?, ?, ?, ?)";

// Prepare and bind parameters
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "iii", $id_user, $name, $prix);

// Execute the statement
if (mysqli_stmt_execute($stmt)) {
    echo "Payment added successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
