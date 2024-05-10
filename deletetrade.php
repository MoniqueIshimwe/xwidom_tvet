<?php
include "./nav.php"
?>
  <?php
$conn = mysqli_connect("localhost","root","","xwisdom_tvet");
if (isset($_GET['id'])) {
    $trade_id = $_GET['id']; 
    $sql = "DELETE FROM `marks` WHERE `trade_id`=$trade_id";
    $result = mysqli_query($conn,$sql);
    if ($result === TRUE) {
        $sql2 = "DELETE FROM `trainees` WHERE `trade_id`=$trade_id";   
        $result2 = mysqli_query($conn,$sql2);
        if ($result2) {
          $sql3 = "DELETE FROM `trade` WHERE `trade_id`=$trade_id";   
          $result3 = mysqli_query($conn,$sql3); 
          if ($result3) {
           header('location:./trade.php');
          }
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<?php
    include "./footer.php"
    ?>