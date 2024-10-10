<?php
$host = 'localhost';
$dbname = 'sa';
$dbuser = 'root';
$dbpassword = '';
$dbcon1 = mysqli_connect($host, $dbuser, $dbpassword, $dbname, "3308");
if ((isset($_GET['id']))) {
    $deleteSQL = sprintf("SELECT *FROM review WHERE id= '%s'", $_GET['id']);
    //echo $deleteSQL;
    // 執行並取回結果
    $result = mysqli_query($dbcon1, $deleteSQL);
    $row = mysqli_fetch_assoc($result);
    $type = $row['type'];
    $username = $row['username'];
    $phone = $row['phone'];
    $email = $row['email'];
    $password = $row['password'];
    $sql = "INSERT INTO `user` VALUES('','$type','$username','$phone','$email','$password')";
    mysqli_query($dbcon1, $sql);
    $deleteSQL = sprintf("DELETE FROM review WHERE id= '%s'", $_GET['id']);
    $result = mysqli_query($dbcon1, $deleteSQL);
    $deleteGoTo = "review.php";
    header("Location: " . $deleteGoTo);
}
