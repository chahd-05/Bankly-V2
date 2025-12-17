<?php ?>
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
    <a class="links"  href="list_clients.php">Client</a>
    <a class="links"  href="list_accounts.php">Comptes</a>
    <a class="links"  href="">Total Transaction for the day</a>
    <button class="logout-btn">Logout</button>
</nav>
<div  class="bg">
<div class="client">
    <h4><span>👩‍💼</span>Client</h4>  
    <h1>10</h1> 
</div>

<div class="client">
    <h4><span>🔒</span>Comptes</h4>   
</div>
<div class="client">
    <h4><span>💰</span>Today Transactions</h4>   
</div>
<div class="client">
    <h4><span>🗓️</span> Latest Transaction</h4>   
</div>
</div>
</section>

</body>
</html>

