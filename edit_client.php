<?php
include("database.php");
session_start();
if (empty($_SESSION)){
    session_destroy();
    header("location: login.php");
}
?>

<?php 
    $customer_id = $_GET['id'];
    echo $customer_id;
    if(isset($_POST['Submit'])){
        $fullName = $_POST['Full_name'];
        $email = $_POST['Email'];
        $phone = $_POST['Phone'];
        $sql = "update customers set full_name = '$fullName', email = '$email', phone = '$phone' where customer_id = $customer_id";
        mysqli_query($connect, $sql);
       header("location: list_clients.php");
    }
?>

<?php 
    $info = mysqli_query($connect, "select * from customers where customer_id = $customer_id");
    $inf = mysqli_fetch_assoc($info);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dashboard.css">
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
    <button class="logout-btn">Logout</button>
</nav>
<div  class="bg">
    <form action="edit_client.php?id= <?php echo $customer_id ?>" method="post" >
    <label>Full_name</label>
    <input type="text" name="Full_name" value = "<?php echo "{$inf['full_name']}" ?>">
    <label>Email</label>
    <input type="email" name="Email"value = "<?php echo "{$inf['email']}" ?>">
    <label>Phone</label>
    <input type="text" name="Phone" value = "<?php echo "{$inf['phone']}" ?>">
    <input type="submit" value="submit" name="Submit">
</form>
</div>
</section>

</body>
</html>

