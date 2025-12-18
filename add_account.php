<?php
include("database.php");
session_start();
if (empty($_SESSION)){
    session_destroy();
    header("location: login.php");
}
?>

<?php 
   $data = mysqli_query($connect, 'select full_name, customer_id from customers');
?>

<?php 
    if(isset($_POST['Submit'])){
        $cusId = $_POST['Customer_id'];
        $accNum = $_POST['Account_number'];
        $balance = $_POST['Balance'];
        $accType = $_POST['Account_type'];
        $sql = "insert into accounts (account_number, balance, account_type, customer_id) values ($accNum, $balance, '$accType', $cusId)";
        mysqli_query($connect, $sql);
       header("location: list_accounts.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=".css">
</head>
<body>
 
   <header>
    <h1>Dashboard</h1>
    <h2>Bienvenu Admin !</h2>
   </header>
<section class="both-bar">
<nav class="side-bar">
    <a class="links" href="#">Dashboard</a>
    <a class="links"  href="">Customers</a>
    <a class="links"  href="">Accounts</a>
    <a class="links"  href="">Total Transaction for the day</a>
    <button class="logout-btn">Logout</button>
</nav>
<div  class="bg">
    <form action="add_account.php" method="post">
    <label>Customer_id</label>
    <select name="Customer_id">
        <?php 
            while($id = mysqli_fetch_assoc($data)){
                echo "<option value='" . $id['customer_id'] . "'>" . $id['full_name'] . "</option>";
            }
        ?>
    </select>
    <label>Account_number</label>
    <input type="text" name="Account_number">
    <label>Balance</label>
    <input type="text" name="Balance">
    <label>Account_type</label>
   <select name="Account_type">
    <option value="business">business</option>
    <option value="savings">savings</option>
    <option value="checking">checking</option>
</select>
   
    <input type="submit" value="submit" name="Submit">
</form>
</div>
</section>

</body>
</html>

