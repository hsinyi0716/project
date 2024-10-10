<?php
session_start();
$username = "";
$password = "";
$host = 'localhost';
$dbname = 'sa';
$dbuser = 'root';
$dbpassword = '';
$dbcon1 = mysqli_connect($host, $dbuser, $dbpassword, $dbname, "3308");
if ($dbcon1) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];
        //檢查使用者是否存在
        $sql = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($dbcon1, $sql);
        $nums = mysqli_num_rows($result);
        if ($nums == 0) {
            echo "<script type='text/javascript'>alert('使用者不存在');</script>";
            echo "<script>history.back(-1)</script>";
        } else {
            $row = mysqli_fetch_row($result);
            if (hash_equals($row[5], $password)) {
                $_SESSION['user_type'] = $row[1];
                $_SESSION['username'] = $row[2];
                echo "<script type='text/javascript'>alert('登入成功');</script>";
                if ($row[1] == '1') {
                    echo "<script type='text/javascript'>window.location.href='seller.php';</script>";
                } else if ($row[1] == '2') {
                    echo "<script type='text/javascript'>window.location.href='index.php';</script>";
                } else {
                    echo "<script type='text/javascript'>window.location.href='admin.php';</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('密碼錯誤');</script>";
                echo "<script>history.back(-1)</script>";
            }
        }
    }
}
mysqli_close($dbcon1);
