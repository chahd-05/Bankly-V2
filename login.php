<?php 
$error = "";
include("database.php");
session_start();
if(isset($_POST ["sub"])){
    $user_name = $_POST["user_name"];
    $pass = $_POST["password"];
    $sql = "select * from user where user_name = '{$user_name}'";
    $data = mysqli_query($connect, $sql);
    if(mysqli_num_rows($data) > 0){
        $row = mysqli_fetch_assoc($data);
        if ($pass === $row["password"]){
            $_SESSION["user"] = $row["user_name"];
            header("Location: dashboard.php");
            exit();
        }
        else $error = "wrong password please try again!";
    }


    else $error = "username not exist please try again!";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="login_page">
    
<div class="user_countainer">
    <div id="login">
    <h1>Login</h1>
    </div>
    <form action="login.php" method="post">
        <div class="countainer">
        <label>User Identification</label>
        <input type="text" placeholder="My Identification" required name="user_name">
        <label>Password</label>
        <input type="password" placeholder="My Password" required name="password" >
        <input type="submit" value="submit" name="sub">
        <?php 
            if (!empty($error)){
                echo "<h5 style= 'color : red;'>{$error}</h5>";
            }
        ?>
        </div>
    </form>
    
</div>




</body>
</html>