<?php

include("includes/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM login WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        echo "successful";  // Send a response indicating success
    } else {
        echo "failure";  // Send a response indicating failure
    }

    $stmt->close();
}

$conn->close();
?>
