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
    <link rel="stylesheet" href="form.css">
</head>
<body>
 
   <header>
    <a class="links" href="list_clients.php"> <-Back </a>
    <h1>add Client</h1>
    <a class="logout-btn" href="logout.php">Logout</a>
   </header>
<section class="both-bar">
<nav class="side-bar">
    
</nav>
<div  class="bg">
    <form action="add_clients.php" method="post">
    <div class="in"><label>Full_name</label>
    <input type="text" name="Full_name"></div>
    <div class="in"><label>Email</label>
    <input type="email" name="Email"></div>
    <div class="in"><label>Phone</label>
    <input type="text" name="Phone"></div>
    
    
    
    <input type="submit" value="submit" name="Submit">
</form>
</div>
</section>

</body>
</html>

