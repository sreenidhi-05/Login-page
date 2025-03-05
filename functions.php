<?php
require 'conn.php';

function registerUser($username, $password, $email) {
    global $conn;
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, password_hash, email) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $username, $password_hash, $email);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        echo "Error: " . $stmt->error;
        return false;
    }
}

function loginUser($username, $password) {
    global $conn;

    $stmt = $conn->prepare("SELECT id, password_hash FROM users WHERE username = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($username, $password_hash);
        $stmt->fetch();

        if (password_verify($password, $password_hash)) {
            $stmt->close();
            return $username;
        }
    }
    $stmt->close();
    return false;
}

function isAuthenticated() {
    return isset($_SESSION['user_id']);
}

function requireAuth() {
    if (!isAuthenticated()) {
        header('Location: login.php');
        exit;
    }
}
?>
