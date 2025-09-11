<?php
require_once __DIR__ . '/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = trim($_POST['fullname']);
    $password = $_POST['password'];


    $sql = "SELECT * FROM users WHERE fullname = '$fullname'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            echo "Login successful, Welcome" . $user['fullname'];
            header('Location: notes.html');
        } else {
            echo "Wrong password, please try again";
        }
    }
}

# TODO: improve security