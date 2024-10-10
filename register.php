<?php
session_start();
$username = "";
$email = "";
$password = "";
$host = 'localhost';
$dbname = 'sa';
$dbuser = 'root';
$dbpassword = '';
$dbcon1 = mysqli_connect($host, $dbuser, $dbpassword, $dbname, "3308");
if ($dbcon1) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $type = $_POST['type'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        //檢查使用者是否重複 主鍵email
        $sql = "SELECT email FROM user WHERE email='$email'";
        $result = mysqli_query($dbcon1, $sql);
        $nums = mysqli_num_rows($result);
        if ($nums == 0) {
            if ($type == 2) {
                $sql = "INSERT INTO `user` VALUES('','$type','$username','$phone','$email','$password')";
                mysqli_query($dbcon1, $sql);
                echo "<script type='text/javascript'>alert('註冊成功!');</script>";
            } else {
                $sql = "INSERT INTO `review` VALUES('','$type','$username','$phone','$email','$password')";
                mysqli_query($dbcon1, $sql);
                echo "<script type='text/javascript'>alert('您已申請帳號，請等待審核');</script>";
            }
            echo "<script type='text/javascript'>window.location.href='index.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('信箱已使用過! 請使用別的信箱');</script>";
            echo "<script>history.back(-1)</script>";
        }
    }
}
mysqli_close($dbcon1);
