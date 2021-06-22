<?php
include 'connectin.php';

if (isset($_POST['submit'])) {
    $from = $_GET['acc_no'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customer where acc_no=$from";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from customer where acc_no=$to";
    $query = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount) < 0) {
        echo "<script> alert('Amount cannot be less than zero') </script>";
    }



    // constraint to check insufficient balance.
    else if ($amount > $sql1['balance']) {
        echo "<script> alert('The amount you want to transfer, is out of your balance. Please try again.') </script>";
    }



    // constraint to check zero values
    else if ($amount == 0) {

        echo "<script> alert('Oops zero value cannot be transfered') </script>";
    } 
    else if ($amount <= $sql1['balance']){

        // deducting amount from sender's account
        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE customer set balance=$newbalance where acc_no=$from";
        mysqli_query($conn, $sql);


        // adding amount to reciever's account
        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE customer set balance=$newbalance where acc_no=$to";
        mysqli_query($conn, $sql);

        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO transfers(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "<script> alert('Transaction Successful');
                                     window.location='history.php';
                           </script>";
        }

        $newbalance = 0;
        $amount = 0;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Transfer Money</title>
	<link rel="stylesheet" type="text/css" href="select_user.css">
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
    <h2>Transfer Money</h2>
    <?php
            include 'connectin.php';
            $sid = $_GET['acc_no'];
            $sql = "SELECT * FROM  customer where acc_no=$sid";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo "Error : " . $sql . "<br>" . mysqli_error($conn);
            }
            $rows = mysqli_fetch_assoc($result);
            ?>
	<main>
	<form method="post" name="tcredit"><br>
                <table>
                    <tr>
                        <th>Account No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Balance</th>
                    </tr>
                    <tr>
                        <td><?php echo $rows['acc_no'] ?></td>
                        <td><?php echo $rows['name'] ?></td>
                        <td><?php echo $rows['email'] ?></td>
                        <td><?php echo $rows['balance'] ?></td>
                    </tr>
                </table>
                <br><br><br>
                
                <div class="section">
                    <label><b>Transfer To:</b></label>
                    <select name="to" required>
                        <option value="" disabled selected>Choose</option>
                        
                        <?php
                        include 'connectin.php';
                        $sid = $_GET['acc_no'];
                        $sql = "SELECT * FROM customer where acc_no!=$sid";
                        $result = mysqli_query($conn, $sql);
                        if (!$result) {
                            echo "Error " . $sql . "<br>" . mysqli_error($conn);
                        }
                        while ($rows = mysqli_fetch_assoc($result)) {
                        ?>
                            <option value="<?php echo $rows['acc_no']; ?>">

                                <?php echo $rows['name']; ?> (Balance:
                                <?php echo $rows['balance']; ?> )
                            </option>
                        <?php
                        }
                        ?>
                    
                    </select>
                    <br><br>
                    <label><b>Amount:</b></label>
                    <input type="number" name="amount" required>
                    <br><br>
                    <button name="submit" type="submit">Transfer</button>
                </div>
            </form>	
        </main>
        <br><br><br>
  <div align="center" id="footer">CRB By Vishal Dedavat</div>    
</div>

</body>
</html>