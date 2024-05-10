<?php
include "./nav.php"
?>
<?php
$conn = mysqli_connect("localhost","root","","xwisdom_tvet");
$id=$_GET['id'];
 $select=mysqli_query($conn,"SELECT * FROM `trade` WHERE trade_id='$id'");
while($row=mysqli_fetch_array($select)){
	$TradeName=$row['tradename'];

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add candidate</title>
	<style>
    form{
        display: flex;
        flex-direction: column;
        gap: 10px;
        width: fit-content;
        border: 1px solid #fff;
        font-size: larger;
        background: rgb(104, 208, 208);
        padding: 40px;
        margin-left: 40%;
        margin-top: 10%;
        color: aliceblue;
        border-radius: 20px;
    }
    input{
        outline: none;
        border-top: 0px;
        border-left: 0px;
        border-right: 0px;
        border-bottom: 2px solid wheat;
        background-color: transparent;
        font-size: large;
    }
    button{
        padding: 5px;
        margin-top: 10px;
    }

    .name{
        display: flex;
        flex-direction: column;
    }
    a{
        text-decoration: none;
        color: black;
    }
    @media(orientation:portrait){
        form{
            margin-left: 50px;
        } 
    }
</style>
</head>
<body>
	<div class="candidate">

		<form action="" method="post">
			<h2>Update Trade</h2>
			<label for="FirstName">First Name :</label><br>
			<input type="text" name="fname"  value="<?php  echo "$TradeName" ?>" required><br>
			<button type="submit" name="submit">Update Trade</button>
		</form>
	</div>
</body>
</html>
<?php

if(isset($_POST['submit'])){
	$updates=$_GET['id'];
   $tname=$_POST['fname'];
   $update="UPDATE `trade` SET tradename='$tname' WHERE trade_id='$updates'";
    if($conn->query($update)){
          header("location:./trade.php");
        }
   else{
	   echo "error:".$update."<br>".$conn->error;
   }
}
include "./footer.php";
?>
