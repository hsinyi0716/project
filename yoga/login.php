<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>瑜你在珈_登入&註冊</title>
    <link rel="stylesheet" href="style.css">


</head>

<body>
    <header>
        <h2 class="logo">Yoga</h2>
    </header>
    <nav class="navigation" style="margin-left: 350px;">
        <button class="login-popup">login</button>
    </nav>
    <div class="wrapper">
        <span class="icon-close">
            <ion-icon name="close-outline"></ion-icon>
        </span>
        <div class="form-box login">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person-outline"></ion-icon>
                    </span>
                    <input type="text" name="username" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <a href="#">忘記密碼?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="login-register">
                    <p>還沒有帳號?<a href="#" class="register-link">註冊</a></p>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <h2>Registration</h2>
            <form action="register.php" method="post">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person-outline"></ion-icon>
                    </span>
                    <input type="text" name="username" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail-outline"></ion-icon>
                    </span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">
                        我同意隱私政策</label>
                </div>
                <button type="submit" class="btn">Register</button>
                <div class="login-register">
                    <p>已有帳號?
                        <a href="#" class="login-link">登入</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
<?php
session_start();
$username = "";
$password = "";
$host = 'localhost';
$dbname = 'project';
$dbuser = 'root';
$dbpassword = '';
$dbcon1 = mysqli_connect($host, $dbuser, $dbpassword, $dbname, "3308");
if ($dbcon1) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        //檢查使用者是否存在
        $sql = "SELECT username,password FROM user WHERE username='$username'";
        $result = mysqli_query($dbcon1, $sql);
        $nums = mysqli_num_rows($result);
        if ($nums == 0) {
            echo "<script type='text/javascript'>alert('使用者不存在');</script>";
            echo "<script>history.back(-1)</script>";
        } else {
            $row = mysqli_fetch_row($result);
            if (hash_equals($row[1], $password)) {
                $_SESSION['username'] = $row[0];
                echo "<script type='text/javascript'>alert('登入成功');</script>";
                echo "<script type='text/javascript'>window.location.href='index.php';</script>";
            } else {
                echo "<script type='text/javascript'>alert('密碼錯誤');</script>";
                echo "<script>history.back(-1)</script>";
            }
        }
    }
}
mysqli_close($dbcon1);
?>

</html>