<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "masroufi";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT DATE_FORMAT(payment_date, '%d %M') AS month, name_payement AS name, 'payé' AS type, -amount AS price FROM payments 
        UNION ALL 
        SELECT DATE_FORMAT(add_date, '%d %M') AS month, add_name AS name, 'ajout' AS type, amount AS price FROM adds 
        ORDER BY month DESC;";


$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $transactions = array();
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $transactions[$i][] = array(
            'name' => $row['name'],
            'type' => $row['type'],
            'price' => $row['price']
        );
        $i++;
    }

    foreach ($transactions as $date => $transaction) {

        foreach ($transaction as $trans) {
            echo ("
                <div class='item my-3 d-flex justify-content-between align-items-center px-2'>
                    <div class='d-flex justify-content-between align-items-center'>
                        <div class='d-flex flex-column  justify-content-center'>
                            <div class='item-title'>" . $trans['name'] . "</div>
                            <div class='type-transaction'>" . $trans['type'] . "</div>
                        </div>
                    </div>
                    <div class='payement'>" . $trans['price'] . "</div>
                </div>
                
            ");
        }
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
