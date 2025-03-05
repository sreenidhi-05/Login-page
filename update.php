<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Update</title>
    <style>
        body {
            background: url("https://www.zucisystems.com/wp-content/uploads/2021/07/icon-internet-world-hands-businessman-network-technology-communication-scaled.jpg") no-repeat center center fixed;
            background-size: cover;
            backdrop-filter: blur(5px);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: white; 
            text-align: center;
        }
        .info {
            width: 300px;
            height: 250px;
            align-items: center;
            background: rgba(0, 0, 0, 0.5); 
            padding: 20px;
            border-radius: 10px;
        }
        .input-box {
            position: relative;
            width: 100%;
            height: 30px;
            border-bottom: 2px solid rgb(34, 30, 30);
            margin: 30px 0;
        }
        .input-box label {
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            font-size: 1em;
            color: white;
            font-weight: 500;
            transition: 0.5s;
            pointer-events: none;
        }
        .input-box input:focus ~ label,
        .input-box input:valid ~ label {
            top: -4px;
        }
        .input-box input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1em;
            color: white;
            font-weight: 600;
            padding: 0 35px 0 5px;
        }
        h2{
            padding-top: 30px;
            font-size: 2.5em;
            margin: 0 0 20px;
        }
        button {
            font-size: 1em;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: black;
            color: white;
            cursor: pointer;
            padding-top: 10px;
        }
        button:hover {
            background-color: white;
            color: black;
        }
    </style>
</head>
<body>
    <?php
require("conn.php");
if (isset($_GET['email']) && isset($_GET['reset_token'])) {
    $email = $_GET['email'];
    $reset_token = $_GET['reset_token'];
    date_default_timezone_set('Asia/Kolkata');
    $currentDate = date("Y-m-d"); 
    $query = "SELECT * FROM users WHERE email = ? AND reset_token = ? AND expire = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $email, $reset_token, $currentDate);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        if ($result->num_rows == 1) {
            echo "<div class='info'>
            <form method='POST'>
            <h2>Create new password</h2>
            <div class='input-box'>
            <input type='password' name='password'><br><br>
            <label> New Password</label>
            </div>
            <button type='submit' name='updatepass'>UPDATE</button>
            <input type='hidden' name='email' value='".$_GET['email']."'>
            </form>
            </div>";
        } else {
            echo "
            <script>
            alert('Invalid or expired link');
            </script>
            ";
        }
    } 
}
else{
    echo("Invalid token");
}
?>
<?php
require("conn.php");
if(isset($_POST['updatepass'])){
    $p = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $query = "UPDATE `users` SET `password_hash` = ?, `reset_token` = NULL, `expire` = NULL WHERE `email` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $p, $email);
    if($stmt->execute()){
        echo "<script>alert('Password Updated')</script>";
    } else {
        echo "<script>alert('Server Down try again')</script>";
    }
}
?>
</body>
</html>