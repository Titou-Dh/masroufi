<?php
// Read the JSON string from the request body
$jsonString = file_get_contents('php://input');

// Decode the JSON string into an array
$array = json_decode($jsonString, true);

include 'connect.php';


// Delete existing dependents for the user
$id_user = 1;
$deleteQuery = "DELETE FROM user_dependents WHERE id_user = ?";
$stmt = mysqli_prepare($conn, $deleteQuery);
mysqli_stmt_bind_param($stmt, "i", $id_user);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

// Insert new dependents
$insertQuery = "INSERT INTO user_dependents (id_user, id_dependent) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $insertQuery);
mysqli_stmt_bind_param($stmt, "ii", $id_user, $dependent_id);

foreach ($array as $dependent_id) {
    mysqli_stmt_execute($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);


// Output the array (for demonstration purposes)
print_r($array);
?>