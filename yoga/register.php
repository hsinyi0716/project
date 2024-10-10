<?php
session_start();
$username = "";
$email="";
$password = "";
$host='localhost';
$dbname='project';
$dbuser='root';
$dbpassword='';
$dbcon1 = mysqli_connect($host, $dbuser, $dbpassword, $dbname, "3308");
if($dbcon1){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        //檢查使用者是否重複 主鍵username
        $sql="SELECT username FROM user WHERE username='$username'";
        $result=mysqli_query($dbcon1, $sql);
        $nums=mysqli_num_rows($result);
        if($nums==0){
            $sql="INSERT INTO `user` VALUES('$username','$email','$password','')";
            mysqli_query($dbcon1, $sql);
            echo "<script type='text/javascript'>alert('註冊成功!');</script>";
            echo "<script type='text/javascript'>window.location.href='login.php';</script>";
        }else{
            echo "<script type='text/javascript'>alert('使用者名稱重複! 請再次取名');</script>";
            echo "<script>history.back(-1)</script>";
        }
    
    }
}
mysqli_close($dbcon1);
?>