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
      padding: 20px;
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
<?php
                    ?>
    <div class="candidates">
       <center> <h2>Trainees report</h2> </center>
        <table class="table">
            <thead>
                <tr>
                    <th>trainee no</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>gender</th>
                    <th>Trade</th>
                    <th>Module Name</th>
                    <th>formative_assessment</th>
                    <th>summative_Assessment</th>
                    <th>total marks</th>
                    <th>decision</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM trainees INNER JOIN marks ON trainees.trade_id =marks.trade_id INNER JOIN trade ON marks.trade_id =trade.trade_id";
                $result = mysqli_query($conn,$sql);
                $number = 1;
                $decision = '';
                if ($result == true) {
                   while ($row = mysqli_fetch_assoc($result)) {
                      if($row['totalmarks']>=70){
                         $decision = "compentent";
                       }
                       else{
                         $decision = "not yet compentent";
                       }
                      ?>
                        <tr>
                            <td><?php echo $row['trainee_id']; ?></td>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['tradename']; ?></td>
                            <td><?php echo $row['module_name']; ?></td>
                            <td><?php echo $row['formative_assessment']; ?></td>
                            <td><?php echo $row['summative_Assessment']; ?></td>
                            <td><?php echo $row['totalmarks']; ?></td>
                            <td>
                              <?php echo $decision;?></td>
                           
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