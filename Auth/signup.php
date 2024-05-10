<?php
session_start();
$conn = mysqli_connect("localhost","root","","xwisdom_tvet");
if(!$conn){
    echo "Not connected! to database xwisdom";
}
if (isset($_SESSION['username'])) {
    header('location:../index.php');
}
if (isset($_POST['submit'])) {
    # code...
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sqlcheck = "SELECT * FROM users WHERE username='{$username}'";
    $check = mysqli_query($conn,$sqlcheck);
    if (mysqli_num_rows($check) > 0) {
        # code...
        echo "username already exists";
    }
    else{
        $add =  mysqli_query($conn,"INSERT INTO users (username,password) VALUES('{$username}','{$password}')");
        if ($add) {
            $select = mysqli_query($conn,"SELECT * FROM users WHERE username='{$username}' AND password='{$password}'");
            $fetch = mysqli_fetch_assoc($select)['username'];
            $_SESSION['username'] = $fetch;
            header("location: ../index.php");
        } }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>

<style>
 *{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}
body{
	background:#908e8e95;



}
.conatiner{
	background-image: linear-gradient(to right,rgba(235, 247, 235, 0.613),#dab5eb51);
	height: 100vh;
	width: 100%;
	align-items: center;
	margin: 0 auto;	
	display: flex;
	justify-content: center;
	align-items: center;
    
	
	 	
}
.login{
	width: 30%;
	height: 75vh;
	background-image: linear-gradient(to right,rgba(244, 236, 247, 0.404),#ffffff);
	position: absolute;
	box-shadow: 0px 2px 10px 0px #827d7d;
	border-radius: 12px;
    margin-left:500px;
    margin-top:100px;
}

form h2{
	text-align: center;
	padding: 21px;
	font-size: 31px;
}
label {
	font-size: 22px;
	margin: 25px 22px;
}
input[type="text"],[type="password"]{
	margin: 40px 22px;
	padding: 19px;
	border-radius: 11px;
	width: 90%;
	border: solid 1px #b141c09d;
	border-top:none;
	border-right:none;

}
input[type="text"],[type="password"]:focus{
	outline: none;
}
input[type="submit"]{
	margin:0px 25%;
	width: 221px;
	padding: 19px;
	border-radius: 21px;
	border: none;
	background: linear-gradient(to right,#c881ece0,#c665fa);
	font-size: 21px;
	color: white;
	box-shadow: -1px 1px 9px 0px #322c31a5;
	cursor: pointer;
	transition: 0.5s ease-in-out;
	font-size: 17px;
}
input[type="submit"]:hover{
	transition: 0.5s ease-in-out;
	 
	
	box-shadow: -1px 1px 9px 0px #161616f6;
	cursor: pointer;
	color: black;
	border: solid 1px rgb(187, 4, 194);
	background:none;
}
input[type="submit"]{
	margin:10px 25%;
	width: 221px;
	padding: 13px;
	border-radius: 21px;
	border: none;
	background: linear-gradient(to right,#c881ece0,#c665fa);
	font-size: 21px;
	color: white;
	box-shadow: -1px 1px 9px 0px #322c31a5;
	cursor: pointer;

}
a{
	display: flex;
	margin: 15px 36%;
	text-decoration: none;
	font-size:19px ;
	
}
.error{
    position: absolute;
    left: 43%;
    top: 199px;
    background: greenyellow;
    padding: 9px;
    z-index: 11;
    width: 221px;
    border-radius: 9px;
    text-align: center;
	font-weight: 600;
}
.errors{
	 
		position: absolute;
		left: 43%;
		top: 199px;
		background: #b8106f;
		padding: 9px;
		z-index: 11;
		width: 221px;
		border-radius: 9px;
		text-align: center;
		color: white;
}
.myerrors{
	position: absolute;
		left: 43%;
		top: 359px;
		background: #b8106f;
		padding: 9px;
		z-index: 11;
		width: 221px;
		border-radius: 9px;
		text-align: center;
		color: white;

}
</style>
<body>
<div class="login">
			<form action="" method="post">
			<h2>Sign up</h2>
			<label for="UserName">User Name:</label><br>
			<input type="text" name="username" placeholder="Enter Username" required><br>
			<label for="UserName">Password:</label><br>
			<input type="password" name="password" placeholder="Enter password" required><br>
			<input type="submit" name="submit" value="Signup"><br>
			<a href="./login.php">Login here</a>
			</form>
		</div>
	</div>
</body>
</html>