<?php
include("database.php");
session_start();
if (empty($_SESSION)){
    session_destroy();
    header("location: login.php");
}
?>

<?php 
    $sql_t = "select * from transactions";
    $data_t = mysqli_query($connect, $sql_t);
    $transaction_amount = [];
    while ($row_t = mysqli_fetch_assoc($data_t)){
        $transaction_amount [] = $row_t;
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
    <a class="logout-btn" href="logout.php">Logout</a>
</nav>
<div  class="bg">
    <a href="make_transaction.php">make a transaction</a>
     <?php 
        foreach($transaction_amount as $trans){
            echo  "<p class = 'customer'>" . $trans['transaction_id'] . " - ". $trans['amount'] . " - ". $trans['transaction_type'] . " - ". $trans['transaction_date'] . "</p>";
        }
    ?>
</div>
</section>

</body>
</html>

