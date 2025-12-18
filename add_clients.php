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
        $fullName = $_POST['Full_name'];
        $email = $_POST['Email'];
        $phone = $_POST['Phone'];
        $sql = "insert into customers (full_name, email, phone) values ('$fullName', '$email', $phone)";
        mysqli_query($connect, $sql);
       header("location: list_clients.php");
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
    <a class="links" href="dashboard.php">Dashboard</a>
    <a class="links"  href="list_clients.php">Customers</a>
    <a class="links"  href="list_accounts.php">Accounts</a>
    <a class="links"  href="list_transactions.php">Today's Transactions</a>
    <button class="logout-btn">Logout</button>
</nav>

<form action="add_clients.php" method="post">
    <label>Full_name</label>
    <input type="text" name="Full_name">
    <label>Email</label>
    <input type="email" name="Email">
    <label>Phone</label>
    <input type="text" name="Phone">
    <input type="submit" value="submit" name="Submit">
</form>

<div  class="bg"></div>
</section>

</body>
</html>

