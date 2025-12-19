<?php
include("database.php");
session_start();
if (empty($_SESSION)){
    session_destroy();
    header("location: login.php");
}
?>
<?php
    $account_id = $_GET['id'];
    mysqli_query($connect, "DELETE FROM accounts WHERE account_id = {$account_id}");
    header("Location: list_accounts.php");
    exit();
?>