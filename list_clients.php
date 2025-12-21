<?php
include("database.php");
session_start();
if (empty($_SESSION)){
    session_destroy();
    header("location: login.php");
}
?>

<?php 
    $sqlc = "select * from customers";
    $datac = mysqli_query($connect, $sqlc);
    $customer_amount = [];
    while ($row_c = mysqli_fetch_assoc($datac)){
        $customer_amount [] = $row_c;
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
    <a class="links"  href="list_clients.php">Customer</a>
    <a class="links"  href="list_accounts.php">Accounts</a>
    <a class="links"  href="list_transactions.php">Today's Transactions</a>
    <a class="logout-btn" href="logout.php">Logout</a>
</nav>
<div  class="bg">
    <a href="add_clients.php">Add Customer</a>
    <?php 
        foreach($customer_amount as $cusAm){
            echo  "<p class = 'customer'>" . $cusAm['customer_id'] . " - ". $cusAm['full_name'] . " - ". $cusAm['email'] . " - ". $cusAm['phone'] . "<a href='edit_client.php?id=" . $cusAm['customer_id'] . "'>Edit</a>" . "</p>";
        }
    ?>
</div>
</section>

</body>
</html>

