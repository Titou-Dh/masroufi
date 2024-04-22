<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "masroufi";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = " SELECT * FROM dependent WHERE id_user=1  order by saving_date desc";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $epargnes = array();
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $epargnes[$i][] = array(
            'date' => $row['saving_date'],
            'amount' => $row['amount']
        );
        $i++;
    }


        foreach ($epargne as $epar) {
            echo ("
            <div class='item-quot d-flex justify-content-center align-items-center flex-column my-2'>    
                <div>Café</div>
            </div>
                
            ");
        }
} else {
    echo "
        <div class='d-flex w-100 justify-content-center align-items-center flex-column'>
            <img src='assets/img/add 2.svg' alt='' width='140' />
            <span class='sad-bunny'>Aucune donnée trouvée...</span>
            <div class='month py-2 text-center'>
            Oups... il n'y a pas de données ici. Veuillez réessayer ou ajouter des
            éléments.
            </div>

            </a>
        </div>";
}

mysqli_close($conn);
