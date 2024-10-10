<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>食物盲盒</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="style.css">
    <?php
    session_start();
    if (isset($_SESSION['username'])) {
        $displayStyle = 'none'; // 如果已登入，將按鈕設為隱藏
        $displayStyle1 = 'block';
    } else {
        $displayStyle = 'block'; // 如果未登入，按鈕顯示
        $displayStyle1 = 'none';
    }
    ?>
</head>

<body>
    <div class="container">
        <div class="overlay" id="overlay"></div>
        <div class="sidebar" id="sidebar">
            <ul>
                <li><a href="#" style="display: <?php echo $displayStyle1; ?>">訂單紀錄</a></li>
                <li><a href="#" style="display: <?php echo $displayStyle1; ?>">會員資料修改</a></li>
                <li><a href="#" style="display: <?php echo $displayStyle1; ?>">喜好項目</a></li>
                <li><a href="logout.php" style="display: <?php echo $displayStyle1; ?>">登出</a></li>
            </ul>
        </div>
        <div class="overlay2" id="overlay2"></div>
        <div class="sidebar2" id="sidebar2">
            <ul>
                <li><a href="#">Your Car</a></li>
                <!-- 加入其他選項... -->
            </ul>
        </div>
        <div class="content1">
            <div class="content2">
                <div style="width: 1360px; height: 1588px; position: relative; background: white">
                    <div style="width: 1360px; height: 126px; left: 0px; top: 0px; position: absolute">
                        <div style="width: 1360px; height: 126px; left: 0px; top: 0px; position: absolute; background: rgba(244, 234, 224, 0.81); ">
                        </div>
                        <div style="width: 278.30px; height: 62px; left: 248.07px; top: 36px; position: absolute; color: black; font-size: 50px; font-family: Inter; font-style: italic; font-weight: 100; word-wrap: break-word">
                            食物盲盒</div>
                        <div style="width: 117.11px; height: 37px; left: 1080.44px; top: 35px; position: absolute; ">
                            <button class="login-popup" style="width: 117.11px; height: 37px; left: 0px; top: 0px; position: absolute; background: #D9D9D9; border-radius: 80px;font-size: 16px; font-family: Inika; font-weight: 700; word-wrap: break-word;display: <?php echo $displayStyle; ?>">
                                登入/註冊</button>
                            <h3 style="display: <?php echo $displayStyle1; ?>">你好，<?php echo $_SESSION['username']; ?></h3>
                        </div>
                        <input placeholder="搜尋盲盒" style="width: 339.06px; height: 38px; left: 600px; top: 40px; position: absolute; background: rgba(217, 217, 217, 0.50); border-radius: 68px">
                        <button style="width: 50px; height: 38px; left: 950px; top: 40px; position: absolute; background: rgba(217, 217, 217, 0.50); border-radius: 68px">查詢</button>
                        <img style="width: 88.15px; height: 100px; left: 124.67px; top: 14px; position: absolute" src="images/logo.png" />
                        <div>
                            <input type="image" class="toggle-btn2" onclick="toggleSidebar2()" style="width: 36.55px; height: 42px; left: 1250px; top: 39px; position: absolute" src="images/shopping.png" />
                        </div>
                        <div style="width: 47.73px; height: 64px; left: 21px; top: 31px; position: absolute">
                            <input type="image" class="toggle-btn" src="images/menu.png" onclick="toggleSidebar()" style="width: 30.83px; height: 30.67px; left: 17.15px; top: 17px; position: absolute; ">
                        </div>
                    </div>
                    <img style="width: 1360px; height: 1462px; left: 0px; top: 126px; position: absolute" src="images/bg.png" />
                    <div style="width: 642px; height: 642px; left: 325px; top: 215px; position: absolute; background: rgba(253.45, 255, 177.25, 0.30); border-radius: 9900px">
                    </div>
                    <img style="width: 220px; height: 189px; left: 250px; top: 563px; position: absolute; " src="images/index_2.png">
                    <img style="width: 175px; height: 171px; left: 860px; top: 563px; position: absolute; " src="images/index_6.png">
                    <img style="width: 214px; height: 154px; left: 860px; top: 342px; position: absolute; " src="images/index_3.png">
                    <input type="image" src="images/index_4.png" onclick="gochicken()" style="width: 267px; height: 180px; left: 545px; top: 171px; position: absolute;">
                    <img style="width: 219px; height: 183px; left: 250px; top: 328px; position: absolute; " src="images/index_1.png">
                    <img style="width: 205px; height: 187px; left: 550px; top: 750px; position: absolute; " src="images/index_5.png">
                    <div style="width: 127px; height: 127px; left: 1142px; top: 813px; position: absolute">
                        <div style="width: 127px; height: 127px; left: 0px; top: 0px; position: absolute; background: #FDFFB1; border-radius: 9999px">
                        </div>
                        <div style="width: 105.40px; height: 105.40px; left: 10.37px; top: 11.23px; position: absolute">
                            <div>
                                <img style="width: 87.83px; height: 83.44px; left: 8.78px; top: 13.18px; position: absolute; " src="images/star.png">
                            </div>
                        </div>
                    </div>
                    <div style="width: 410px; height: 241px; left: 121px; top: 1168px; position: absolute; background: rgba(206, 250, 182, 0.83)">
                    </div>
                    <div style="width: 411px; height: 241px; left: 831px; top: 1168px; position: absolute; background: rgba(206, 250, 182, 0.83)">
                    </div>
                    <div><img style="width: 358px; height: 67px; left: 110px; top: 1302px; position: absolute" src='images/connect.png' />

                    </div>
                    <div style="width: 202px; height: 45px; left: 222px; top: 1201px; position: absolute; color: black; font-size: 36px; font-family: Inika; font-weight: 400; word-wrap: break-word">
                        Contact us</div>
                    <div style="width: 337px; height: 0px; left: 121px; top: 1257px; position: absolute; border: 1px rgba(173.52, 173.52, 173.52, 0.61) solid">
                    </div>
                    <div style="width: 262px; height: 0px; left: 899px; top: 1257px; position: absolute; border: 1px rgba(173.52, 173.52, 173.52, 0.61) solid">
                    </div>
                    <div style="width: 160px; height: 233px; left: 472px; top: 380px; position: absolute;">
                        <img style="width: 160px; height: 233px; left: 100px; top: 50px; position: absolute; " src="images/抽.png" />
                    </div>
                    <div style="width: 159px; height: 44px; left: 976px; top: 1205px; position: absolute; color: black; font-size: 32px; font-family: Inika; font-weight: 400; word-wrap: break-word">
                        資傳三A</div>
                    <div style="width: 369px; height: 36px; left: 686px; top: 1321px; position: absolute">
                        <div style="width: 113px; height: 36px; left: 415px; top: 6px; position: absolute; color: black; font-size: 24px; font-family: Inika; font-weight: 400; word-wrap: break-word">
                            羅于絜</div>
                        <div style="width: 113px; height: 36px; left: 302px; top: 6px; position: absolute; color: black; font-size: 24px; font-family: Inika; font-weight: 400; word-wrap: break-word">
                            簡楹錡</div>
                        <div style="width: 113px; height: 36px; left: 169px; top: 6px; position: absolute; color: black; font-size: 24px; font-family: Inika; font-weight: 400; word-wrap: break-word">
                            林欣儀</div>
                    </div>
                </div>
                <div class="wrapper">
                    <span class="icon-close">
                        <ion-icon name="close-outline"></ion-icon>
                    </span>
                    <div class="form-box login">
                        <h2>登入/註冊</h2>
                        <form action="login.php" method="post">
                            <div class="input-box">
                                <input type="email" name="email" required>
                                <label>Email</label>
                            </div>
                            <div class="input-box">
                                <input type="password" name="password" required>
                                <label>Password</label>
                            </div>
                            <button type="submit" class="btn">登入</button>
                        </form>
                        <div class="login-register">
                            <button class="register-link1" style="background: #B1C0D6;  border-radius: 16px; font-size: 24px; font-family: Inika; font-weight: 700; word-wrap: break-word">賣家註冊</button>
                            <button class="register-link2" style="background: #B1D6B9;  border-radius: 16px; font-size: 24px; font-family: Inika; font-weight: 700; word-wrap: break-word">買家註冊</button>
                        </div>
                    </div>

                    <div class="form-box register1">
                        <h2>賣家註冊</h2>
                        <form action="register.php" method="post">
                            <div class="input-box">
                                <input type="text" name="username" required>
                                <label>賣家名稱</label>
                            </div>
                            <div class="input-box">
                                <input type="phone" name="phone" required>
                                <label>手機號碼</label>
                            </div>
                            <div class="input-box">
                                <input type="email" name="email" required>
                                <label>Email</label>
                            </div>
                            <div class="input-box">
                                <input type="password" name="password" required>
                                <label>Password</label>
                            </div>
                            <input type="hidden" name="type" value="1">
                            <button type="submit" class="btn">提交申請</button>
                            <div class="login-register">
                                <p>已有帳號?
                                    <a href="#" class="login-link1">登入</a>
                                </p>
                            </div>
                        </form>
                    </div>
                    <div class="form-box register2">
                        <h2>買家註冊</h2>
                        <form action="register.php" method="post">
                            <div class="input-box">
                                <input type="text" name="username" required>
                                <label>會員名稱</label>
                            </div>
                            <div class="input-box">
                                <input type="phone" name="phone" required>
                                <label>手機號碼</label>
                            </div>
                            <div class="input-box">
                                <input type="email" name="email" required>
                                <label>Email</label>
                            </div>
                            <div class="input-box">
                                <input type="password" name="password" required>
                                <label>Password</label>
                            </div>
                            <input type="hidden" name="type" value="2">
                            <button type="submit" class="btn">創建帳號</button>
                            <div class="login-register">
                                <p>已有帳號?
                                    <a href="#" class="login-link2">登入</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>

</body>

</html>