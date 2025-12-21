<?php
include("database.php");
session_start();
if (empty($_SESSION)){
    session_destroy();
    header("location: login.php");
}
?>
<?php 
   $data_a = mysqli_query($connect, 'select account_number, balance, account_type from accounts');
?>
<?php 
   $data = mysqli_query($connect, 'select full_name, customer_id from customers');
?>
<?php 
    $customer_id = $_GET['id'];
    $info = mysqli_query($connect, "select * from accounts where account_id = $customer_id");
    $inf = mysqli_fetch_assoc($info);
?>
<?php 
    
    if(isset($_POST['Submit'])){
        $cusId = $_POST['Customer_id'];
        $accNum = $_POST['Account_number'];
        $balance = $_POST['Balance'];
        $accType = $_POST['Account_type'];
        $sql = "UPDATE accounts SET account_number = $accNum, balance = $balance, account_type = '$accType', customer_id = $cusId WHERE account_id = $customer_id";
        mysqli_query($connect, $sql);
       header("location: list_accounts.php");
    }
?>

<?php 
    $info = mysqli_query($connect, "select * from accounts where account_id = $customer_id");
    $inf = mysqli_fetch_assoc($info);
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
    <a class="links" href="list_accounts.php"> <-Back </a>
    <h1>Edit Client</h1>
    <a class="logout-btn" href="logout.php">Logout</a>
   </header>
<section class="both-bar">
<nav class="side-bar">
    
</nav>
<div  class="bg">
     <form action="edit_account.php?id= <?php echo $customer_id ?>" method="post">
    
    <div class="in"><label>Customer_id</label>
    <select name="Customer_id">
        <?php 
            while($id = mysqli_fetch_assoc($data)){
                echo "<option value='" . $id['customer_id'] . "'>" . $id['full_name'] . "</option>";
            }
        ?>
    </select></div>
    <div class="in"><label>Account_number</label>
    <input type="text" name="Account_number" value="<?php echo $inf['account_number']; ?>"></div>
    <div class="in"><label>Balance</label>
    <input type="text" name="Balance" value="<?php echo $inf['balance']; ?>"></div>
    <div class="in"><label>Account_type</label>
   <select name="Account_type">
    <option value="business">business</option>
    <option value="savings">savings</option>
    <option value="checking">checking</option>
</select></div>
    
    
    
    
   
    <input type="submit" value="submit" name="Submit">
</form>
</div>
</section>

</body>
</html>

