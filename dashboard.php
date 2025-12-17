<?php
include("database.php");
session_start();
if (empty($_SESSION)){
    session_destroy();
    header("location: login.php");
}
?>

<?php 
    $sqlc = "select count(*) as total_customers from customers";
    $datac = mysqli_query($connect, $sqlc);
    $customer_amount = 0;
    if ($row_c = mysqli_fetch_assoc($datac)){
        $customer_amount = $row_c['total_customers'];
    }
?>

<?php 
    $sql_a = "select count(*) as total_accounts from accounts";
    $data_a = mysqli_query($connect, $sql_a);
    $account_amount = 0;
    if ($row_a = mysqli_fetch_assoc($data_a)){
        $account_amount = $row_a['total_accounts'];
    }
?>

<?php 
    $sql_t = "select count(*) as total_transactions from transactions where date(transaction_date) = curdate()";
    $data_t = mysqli_query($connect, $sql_t);
    $transaction_amount = 0;
    if ($row_t = mysqli_fetch_assoc($data_t)){
        $transaction_amount = $row_t['total_transactions'];
    }
?>

<?php 
    $sql_l = "select * from transactions order by transaction_id desc limit 3";
    $data_l = mysqli_query($connect, $sql_l);
    $latestTransaction = [];
    while ($row_l = mysqli_fetch_assoc($data_l)){
        $latestTransaction [] = $row_l;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dash.css">
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
<div class="client">
    <h4><span>👩‍💼</span>Customers</h4>  
    <?php 
        echo $customer_amount;
    ?>
</div>

<div class="client">
    <h4><span>🔒</span>Accounts</h4> 
    <?php 
        echo $account_amount;
    ?>  
</div>
<div class="client">
    <h4><span>💰</span>Today's Transactions</h4> 
    <?php 
        echo $transaction_amount;
    ?>  
</div>
<div class="client">
    <h4><span>🗓️</span> Latest Transaction</h4>
    <?php 
    foreach($latestTransaction as $latest){
    echo $latest['transaction_date'] . "<br>";
    }
    ?>  
</div>
</div>
</section>

</body>
</html>

