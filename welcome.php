<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            background: url("https://www.zucisystems.com/wp-content/uploads/2021/07/icon-internet-world-hands-businessman-network-technology-communication-scaled.jpg") no-repeat center center fixed;
            background-size: cover;
            backdrop-filter: blur(5px);
            display: flex;
            height: 100vh;
            margin: 0;
            color: white; 
            text-align: center;
        }
        nav{
            align-items:right;
        }
        .info {
            position: absolute;
            top:25%;
            left: 35%;
            width:300px;
            height:250px;
            align-items:center;
            background: rgba(0, 0, 0, 0.5); 
            padding: 20px;
            border-radius: 10px;
        }
        h1 {
            padding-top:20px;
            font-size: 4em;
            margin: 0 0 20px;
        }
        h4{
            font-size: 1.5em;
        }
        button {
            font-size: 1em;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color;
            color: white;
            cursor: pointer;
            background-color: black;
            color:grey;
        }
        a{
            text-decoration:none;
            color:white;
            padding-top:100px;
        }

        a:hover{
            color: #fdb750;
            text-decoration:underline;
        }
        button:hover {
            background-color: white;
        }
    </style>
</head>
<body>
        <nav>
            <a href="logout.php">Logout</a>
    </nav>
    <div class="info">
        <h1>Welcome!</h1>
        <h4>You logged in successfully</h4>
        <button>Explore more about us</button><br>
        
    </div>
</body>
</html>
