<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Transfer Money</title>
  <link rel="stylesheet" type="text/css" href="trans.css">
</head>
<body>
<header>
  <a href="homepage.php"><h1 id='c1'>Covid Relief Bank</h1></a>  <!--User header tag-->
  <nav>
    <a href="homepage.php">Home</a>
    <a href="transfer.php">Transfer Money</a>
    <a href="history.php">Transaction History</a>
  </nav>
</header> 

<div id="wrapper">
  <h2>Customer Details</h2>
  <table style="width:100%">
                    <tr>
                      <th>Account No.</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Balance</th>
                      <th>Operation</th>
                    </tr>
                    <?php
                         include 'connectin.php';
                         $sql = "SELECT * FROM customer";
                         $result = mysqli_query($conn, $sql);
                         
                         while ($rows = mysqli_fetch_assoc($result)) {
                       ?>
                    <tr>
                        <td><?php echo $rows['acc_no'] ?></td>
                        <td><?php echo $rows['name'] ?></td>
                        <td><?php echo $rows['email'] ?></td>
                        <td><?php echo $rows['balance'] ?></td>
                        <td><a href="select_user.php?acc_no= <?php echo $rows['acc_no']; ?>"> <button type="button" class="btn">Transfer</button></a></td>       
                    </tr>
                      <?php
                        }
                       ?>
  </table>
  <br><br><br><br>
  <div align="center" id="footer">CRB By Vishal Dedavat</div>
</div>

</body>
</html>