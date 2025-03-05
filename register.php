<?php
require 'functions.php';
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email=$_POST['email'];
    registerUser($username, $password,$email);
    header('Location: index.php');
    exit;
}
?>
