<?php
// input_dependents.php

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decode the JSON data sent in the request body
    $data = json_decode(file_get_contents("php://input"), true);

    // Check if 'array' and 'id_user' fields are present in the JSON data
    if (isset($data['array']) && isset($data['id_user'])) {
        // Process the data (you can perform database operations here)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "masroufi";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Delete existing dependents for the user
        $id_user = $data['id_user'];
        $deleteQuery = "DELETE FROM user_dependents WHERE id_user = ?";
        $stmt = $conn->prepare($deleteQuery);
        $stmt->bind_param("i", $id_user);
        $stmt->execute();
        $stmt->close();

        // Insert new dependents
        $insertQuery = "INSERT INTO user_dependents (id_user, dependent_id) VALUES (?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ii", $id_user, $dependent_id);

        foreach ($data['array'] as $dependent_id) {
            $stmt->execute();
        }

        $stmt->close();
        $conn->close();

        // Return success response
        $response = array('success' => true);
    } else {
        // If 'array' or 'id_user' fields are missing, return an error message
        $response = array('success' => false, 'error' => 'Missing required fields');
    }
} else {
    // If the request method is not POST, return an error message
    $response = array('success' => false, 'error' => 'Invalid request method');
}

// Set the content type header to JSON
header('Content-Type: application/json');

// Output the JSON response
echo json_encode($response);
?>
