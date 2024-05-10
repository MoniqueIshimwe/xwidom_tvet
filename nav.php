<?php 
session_start();

$conn = mysqli_connect("localhost","root","","xwisdom_tvet");

if(!$conn){
    echo "Not connected!";
}

if(!$_SESSION['username']){
    header("Location: ./Auth/login.php");
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./Styles/styles.css">
</head>
<style>
    body{
        background: pink;
    }
</style>
<body>
  <div class="navbar">
    <div class="logo">
    <img src="./images/download.png" alt="logo" width="100px">
    </div> 
 
        <div class="title">
            <h2>XWisdom_Tvet</h2>
        </div>
        <div class="links">
      <ul>
        <li><a href="./index.php">Home</a></li>
        <li><a href="./trade.php">Our Trades</a></li>
        <li><a href="./trainee.php">Trainees</a></li>
        <li><a href="./marks.php">Marks</a></li>
        <li><a href="./report.php">Report</a></li>

      </ul>
    </div>
    <div class="logout">
      <p>
      User
        <?php
         echo $_SESSION['username'] ?>
      </p>
      <a href="./Auth/logout.php"><button>Logout</button></a>
    </div>
  </div>

</body>
</html>
