<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>食物盲盒</title>
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
                        <div style="width: 1154px; height: 1226px; position: relative">
                            <input type="image" onclick="goorder()" style="width: 461.60px; height: 241.08px; left: 90px; top: 220px; position: absolute; border-radius: 48px" src="images/family_meal.png" />
                            <img style="width: 461.60px; height: 241.08px; left: 820px; top: 220px; position: absolute; border-radius: 48px" src="images/bussiness meal.png" />
                            <img style="width: 461.60px; height: 241.08px; left: 90px; top: 620px; position: absolute; border-radius: 48px" src="images/combat meal.png" />
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>