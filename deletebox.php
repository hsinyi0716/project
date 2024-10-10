<?php
$host = 'localhost';
$dbname = 'sa';
$dbuser = 'root';
$dbpassword = '';
$dbcon1 = mysqli_connect($host, $dbuser, $dbpassword, $dbname, "3308");
if ((isset($_GET['bid']))) {
    $deleteSQL = sprintf("DELETE FROM blindbox WHERE bid= '%s'", $_GET['bid']);
    //echo $deleteSQL;
    // 執行並取回結果
    $result = mysqli_query($dbcon1, $deleteSQL);
    $deleteGoTo = "seller.php";
    header("Location: " . $deleteGoTo);
}
