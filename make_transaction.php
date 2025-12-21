<?php
include("database.php");
session_start();
if (empty($_SESSION)){
    session_destroy();
    header("location: login.php");
}
?>
<?php 
    if(isset($_POST['Submit'])){
        $cusId = $_POST['Customer_id'];
        $accNum = $_POST['amount'];
        $accType = $_POST['transaction_type'];
        $sql = "insert into transactions (amount, transaction_type, account_id) values ($accNum, '$accType', $cusId)";
        mysqli_query($connect, $sql);
       header("location: list_transactions.php");
    }
?>
<?php 
   $data = mysqli_query($connect, 'select account_number, account_id from accounts');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
 
   <header>
    <a class="links" href="list_transactions.php"> <-Back </a>
    <h1>Make Transaction</h1>
    <a class="logout-btn" href="logout.php">Logout</a>
   </header>
<section class="both-bar">
<nav class="side-bar">
</nav>
<div  class="bg">
    <form action="make_transaction.php" method="post">
        <div class="in"><label>account_number</label>
    <select name="Customer_id">
        <?php 
            while($id = mysqli_fetch_assoc($data)){
                echo "<option value='" . $id['account_id'] . "'>" . $id['account_number'] . "</option>";
            }
        ?>
    </select></div>
        <div class="in"><label>amount</label>
    <input type="text" name="amount"></div>
        <div class="in"><label>transaction_type</label>
   <select name="transaction_type">
    <option value="debit">debit</option>
    <option value="credit">credit</option>
</select></div>
    
    
    
<input type="submit" value="submit" name="Submit">
</div>
</section>

</body>
</html>

