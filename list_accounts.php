<?php
include("database.php");
session_start();
if (empty($_SESSION)){
    session_destroy();
    header("location: login.php");
}
?>

<?php 
    $sql_a = "select accounts.*, customers.full_name from accounts join customers on accounts.customer_id = customers.customer_id";
    $data_a = mysqli_query($connect, $sql_a);
    $account_amount = [];
    while ($row_a = mysqli_fetch_assoc($data_a)){
        $account_amount [] = $row_a;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dashs.css">
</head>
<body>
 
   <header>
    <h1>Dashboard</h1>
    <h2>Bienvenu Admin !</h2>
   </header>
<section class="both-bar">
<nav class="side-bar">
    <a class="links" href="dashboard.php">Dashboard</a>
    <a class="links"  href="list_clients.php">Customers</a>
    <a class="links"  href="list_accounts.php">Accounts</a>
    <a class="links"  href="list_transactions.php">Today's Transactions</a>
    <button class="logout-btn">Logout</button>
</nav>
<div  class="bg">
    <?php 
        foreach($account_amount as $accAm){
            echo  "<p class = 'account'>" . $accAm['account_id'] . " - ". $accAm['account_number'] . " - ". $accAm['balance'] . " - ". $accAm['account_type'] ." - ". $accAm['full_name'] . "</p>";
        }
    ?>
</div>
</section>

</body>
</html>

