<?php

include 'connect.php';
include 'mpambe/connectandcreate.php';

// Retrieve the password from the POST data
$password = $_POST['password'];

// Prepare and execute the SQL query to retrieve the password from the database
$stmt = $conn->prepare("SELECT Password FROM recevedauthentication WHERE Password = ?");
$stmt->bind_param("s", $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Password is correct
    $response = array("valid" => true);
} else {
    // Password is incorrect
    $response = array("valid" => false);
}

// Send the response as JSON
header("Content-Type: application/json");
echo json_encode($response);

// Close the database connection
$stmt->close();
$conn->close();
?>
