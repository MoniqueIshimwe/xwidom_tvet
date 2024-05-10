<?php
  include "./nav.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    table,th,tr,td,tbody,thead{
      border: 1px solid wheat;
      padding: 40px;
      border-collapse: collapse;
      font-size: large;

    }
    .candidates h2{
      margin-top: 80px;
      margin-bottom: 50px;
    }
    a{
      color: darkcyan;
    }
    @media (orientation:portrait){
      table,th,tr,td,tbody,thead{
      border: 1px solid wheat;
      padding: 0px;
      border-collapse: collapse;
      font-size: xx-small;

    }
    .candidates h2{
      margin-top: 80px;
      margin-bottom: 50px;
    }
    a{
      color: darkcyan;
    }
}
  </style>
</head>


    <div class="candidates">
       <center> <h2>Trainee</h2> </center>
       <center> <a href="./newtrainee.php"> Add New Trainee</a>
       <center><br><br><br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>trainee id </th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Trade</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM trainees INNER JOIN trade ON trainees.trade_id =trade.trade_id ";
                $result = mysqli_query($conn,$sql);
                $number = 1;
                if ($result == true) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?php echo $row['trainee_id']; ?></td>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['tradename']; ?></td>
                            <td colspan="2"><a href="deletetrade.php?id=<?php echo $row['trade_id']?> ">Delete</a>
                        </td>
                           
                        </tr>
                <?php }
                }
                ?>
            </tbody>
        </table>
              </center>
    </div>

    </body>
</html>
    <?php
    include "./footer.php"
    ?>