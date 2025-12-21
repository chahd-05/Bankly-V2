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
    <link rel="stylesheet" href="form.css">
</head>
<body>
 
   <header>
    <a class="links" href="list_clients.php"> <-Back </a>
    <h1>Edit Client</h1>
    <a class="logout-btn" href="logout.php">Logout</a>
    </header>
<section class="both-bar">
<nav class="side-bar">
    
</nav>
<div  class="bg">
    
    <form action="edit_client.php?id= <?php echo $customer_id ?>" method="post" >
    <div class="in"><label>Full_name</label>
    <input type="text" name="Full_name" value = "<?php echo "{$inf['full_name']}" ?>"></div>
    <div class="in"><label>Email</label>
    <input type="email" name="Email"value = "<?php echo "{$inf['email']}" ?>"></div>
    <div class="in"><label>Phone</label>
    <input type="text" name="Phone" value = "<?php echo "{$inf['phone']}" ?>"></div>
    <input type="submit" value="submit" name="Submit">
</form>
</div>
</section>

</body>
</html>

