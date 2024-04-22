<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "masroufi";


$id_user = $_POST['id_user'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE users SET nom = ?, prenom = ?, email = ? WHERE id_user = ?";


$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sssi", $nom, $prenom, $email, $id_user );



if (mysqli_stmt_execute($stmt)) {
    echo "
        jfjf
    ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_stmt_close($stmt);
mysqli_close($conn);


?>
