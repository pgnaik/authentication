<!-- process-login.php -->
<?php
session_start();
include("includes/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM login WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $_SESSION["username"] = $username;
        $_SESSION["message"] = "Authentication successful";
        $_SESSION["alert_type"] = "success";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION["message"] = "Authentication Failure. Access Denied.";
        $_SESSION["alert_type"] = "danger";
        header("Location: index.php");
        exit();
    }

    $stmt->close();
}

$conn->close();
?>
