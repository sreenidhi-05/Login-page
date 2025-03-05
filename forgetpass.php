
<?php
require("conn.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
function sendmail($email,$reset)
{
    $mail = new PHPMailer(true);
    try 
    {                     
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'sreepvt27@gmail.com';                     
        $mail->Password   = 'ubhuepwlqncqnoqc' ;                              
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          
        $mail->Port       = 587;                                
        $mail->setFrom('sreepvt27@gmail.com', 'Sreenidhi');
        $mail->addAddress($email);     
        $mail->isHTML(true); 
        $mail->Subject = 'Password reset link';
        $mail->Body    = "Reset your password through this link<br>
        <a href='http://localhost/abc/update.php?email=$email&reset_token=$reset'>Reset password</a>";
        $mail->send();
        return true;
    } 
    catch (Exception $e) 
    {
    return false;
    }
}


if (isset($_POST['sendlink'])) 
{
    $email = $_POST['email'];
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) 
    {
        $r = bin2hex(random_bytes(16));
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d");  
        $q1 = "UPDATE users SET reset_token = ?, expire = ? WHERE email = ?";
        $stmt = mysqli_prepare($conn, $q1);
        mysqli_stmt_bind_param($stmt, "sss", $r, $date, $email);
        if (mysqli_stmt_execute($stmt) && sendmail($email,$r)) {
            echo "<script>alert('Mail sent');</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
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
        h1 {
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
    <div class="info">
        <form method="POST" action="">
            <h1>Password Reset</h1>
            <div class="input-box">
                <input type="email" name="email" required />
                <label>Email</label>
            </div>
            <button type="submit" name="sendlink">Send Link</button>
        </form>
    </div>
</body>
</html>
