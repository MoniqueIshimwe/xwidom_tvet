<?php 
session_start();

$conn = mysqli_connect("localhost","root","","xwisdom_tvet");
if(!$conn){
    echo "Not connected!";
}

if(!$_SESSION['username']){
    header("Location: ./login.php");
}
// else{
//     echo $_SESSION['id'];
//     echo "is set";
// }


?>