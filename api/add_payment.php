<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "masroufi";


$id_user = $_POST['id_user'];
$name_p = $_POST['name'];
$prix = $_POST['prix'];

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO payments (id_user, name_payement, amount) VALUES (?, ?, ?)";


$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "isi", $id_user, $name_p, $prix);

if (mysqli_stmt_execute($stmt)) {
    echo "
    <script>
        Swal.fire({
            title: 'Payment added successfully',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(function() {
            window.location = '../home.html';
        });
    </script>   
    ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
