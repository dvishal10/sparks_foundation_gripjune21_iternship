<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Transaction History</title>
	<link rel="stylesheet" type="text/css" href="hist.css">
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
    <h2>Transaction History</h2>
	<div class="section">
            <table>
                    <tr>
                        <th>Sr.No</S></th>
                        <th>Sender</th>
                        <th>Receiver</th>
                        <th>Amount</th>
                        <th>Date & Time</th>
                    </tr>

                    <?php
                    include 'connectin.php';

                    $sql = "SELECT * FROM transfers";
                    $query = mysqli_query($conn, $sql);

                    while ($rows = mysqli_fetch_assoc($query)) {

                    ?>
                        <tr>
                            <td><?php echo $rows['sr_no']; ?></td>
                            <td><?php echo $rows['sender']; ?></td>
                            <td><?php echo $rows['receiver']; ?></td>
                            <td><?php echo $rows['amount']; ?></td>
                            <td><?php echo $rows['dateandtime']; ?></td>
                        </tr>

                    <?php
                    }

                    ?>

            </table>
        </div>
        <br><br>
        <div align="center" id="footer">CRB By Vishal Dedavat</div>
</div>

</body>
</html>