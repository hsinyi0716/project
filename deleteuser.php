<?php
$host = 'localhost';
$dbname = 'sa';
$dbuser = 'root';
$dbpassword = '';
$dbcon1 = mysqli_connect($host, $dbuser, $dbpassword, $dbname, "3308");
if ((isset($_GET['id']))) {
    $deleteSQL = sprintf("DELETE FROM user WHERE id= '%s'", $_GET['id']);
    //echo $deleteSQL;
    // 執行並取回結果
    $result = mysqli_query($dbcon1, $deleteSQL);
    $deleteGoTo = "admin.php";
    header("Location: " . $deleteGoTo);
}
