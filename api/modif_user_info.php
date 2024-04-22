<?php

// Assuming you have received the updated values from a form or API request
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];

$userID = 1;


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "masroufi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE users SET nom='$nom', prenom='$prenom', email='$email' WHERE id=$userID";

if ($conn->query($sql) === TRUE) {
    echo "User information updated successfully";
} else {
    die ("Error updating user information: " . $conn->error);
}

$conn->close();

?>