<?php
$server="localhost";
$username="root";
$password=" ";
$dbname="login";
$conn=mysqli_connect($server,$username,$password,$dbname);
if($conn){
    //echo"Connection Ok";
}
else{
    echo"Connection Failed";
}
?>