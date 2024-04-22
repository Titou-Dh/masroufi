<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "masroufi";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users WHERE id_user = 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $nom = $row['nom'];
    $prenom = $row['prenom'];
    $email = $row['email'];

    echo "
        <h1>Prénom :</h1>
        <div class='mb-3'>
        <input type='text' class='form-control' value='".$prenom."' />
        </div>
        <h1>Nom :</h1>
        <div class='mb-3'>

            <input type='text' class='form-control' value='".$nom."' />
        </div>
        <h1>Email :</h1>
        <div class='mb-3'>

            <input type='text' class='form-control' value='".$email."' />
        </div>
        <div class='text-end d-flex justify-content-end my-5'>
            <div class='text-center w-50'>
            <button type='button' class='btn btn-outline-secondary w-100' onclick='window.history.go(-1); return false;'>
                Annuler
            </button>
            </div>
            <div class='text-center mx-2 w-50'>
                <button type='submit' onclick='modifUserInfo()'  class='btn btn-primary w-100'>
                    Modifier
                </button>
            </div>
        </div>
    ";
} else {
    echo "
    <script>
        Swal.fire({
            title: 'Error',
            text: 'Error while fetching user info',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then(function() {
            window.location = '../home.html';
        });
    </script>    
    ";
}

mysqli_close($conn);
