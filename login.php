<?php
session_start();
require 'functions.php';
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userId = loginUser($username, $password);
    if ($userId) {
        $_SESSION['user_id'] = $userId;
        header('Location: welcome.php');
        exit;
    } else {
        echo "<script>alert('Invalid username or password .Go back to the main page and try again');</script>";
    }
}
?>
