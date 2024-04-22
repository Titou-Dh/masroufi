<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "masroufi";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$array = $_POST['array'];
$id_user = $_POST['id_user'];

$sql = "INSERT INTO user_dependents  VALUES (1, ?)";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error in preparing statement: " . $conn->error);
}

$stmt->bind_param("i", $value);

foreach ($array as $value) {
    $result = $stmt->execute();
    if ($result === false) {
        die("Error in executing statement: " . $stmt->error);
    }
    echo "Inserted value: $value ";
}

$stmt->close();
$conn->close();


?>
