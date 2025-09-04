<?php
require_once __DIR__ . '/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_POST['fullname'], $_POST['password'])) {
        http_response_code(400);
        echo "Missing fullname or password";
        exit;
    }

    $fullname = trim($_POST['fullname']);
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

}
$sql = "INSERT INTO users (fullname, password) VALUES ('$fullname', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "Account successfully created";
    header('Location: login.html');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
