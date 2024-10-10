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
                <li><a href="addbox.php">新增商品</a></li>
                <li><a href="#">參與聖誕節活動</a></li>
                <li><a href="logout.php">登出</a></li>
                <!-- 加入其他選項... -->
            </ul>
        </div>
        <div class="content1">

            <div style="width: 1360px; height: 1588px; position: relative; background: white">
                <div style="width: 1360px; height: 126px; left: 0px; top: 0px; position: absolute">
                    <div style="width: 1360px; height: 126px; left: 0px; top: 0px; position: absolute; background: rgba(244, 234, 224, 0.81); ">
                    </div>
                    <div style="width: 278.30px; height: 62px; left: 248.07px; top: 36px; position: absolute; color: black; font-size: 50px; font-family: Inter; font-style: italic; font-weight: 100; word-wrap: break-word">
                        盲盒管理</div>
                    <div style="width: 117.11px; height: 37px; left: 1080.44px; top: 35px; position: absolute; ">
                        <h3 style="display: <?php echo $displayStyle1; ?>">你好，<?php echo $_SESSION['username']; ?></h3>
                    </div>
                    <div style="width: 47.73px; height: 64px; left: 21px; top: 31px; position: absolute">
                        <input type="image" class="toggle-btn" src="images/menu.png" onclick="toggleSidebar()" style="width: 30.83px; height: 30.67px; left: 17.15px; top: 17px; position: absolute; ">
                    </div>
                </div>

                <img style="width: 88.15px; height: 100px; left: 124.67px; top: 14px; position: absolute" src="images/logo.png" />
                <img style="width: 1360px; height: 1462px; left: 0px; top: 126px; position: absolute;z-index: 0;" src="images/bg.png" />
                <div style="width: 410px; height: 241px; left: 121px; top: 1168px; position: absolute; background: rgba(206, 250, 182, 0.83)">
                </div>
                <div style="width: 411px; height: 241px; left: 831px; top: 1168px; position: absolute; background: rgba(206, 250, 182, 0.83)">
                </div>
                <div><img style="width: 358px; height: 67px; left: 110px; top: 1302px; position: absolute" src='images/connect.png' />
                    <script>
                        function delConfirm(name) {
                            if (confirm("確定要刪除 " + name + " 嗎？")) //用戶按確定
                            {
                                return true;
                            } else // 用戶按取消
                            {
                                return false;
                            }
                        }
                    </script>
                    <?php
                    $host = 'localhost';
                    $dbname = 'sa';
                    $dbuser = 'root';
                    $dbpassword = '';
                    $dbcon1 = mysqli_connect($host, $dbuser, $dbpassword, $dbname, "3308");

                    if ($dbcon1) {
                        $sql = "SELECT id FROM user WHERE username='$_SESSION[username]'";
                        $result = mysqli_query($dbcon1, $sql);
                        $row = mysqli_fetch_row($result);
                        $uid = $row[0];
                        $sql = "SELECT * FROM blindbox where uid='$uid'";
                        $result = mysqli_query($dbcon1, $sql);

                        if (mysqli_num_rows($result) > 0) {  // 查詢結果有資料
                            echo "<div style='position: absolute;width:90%;top: 100px;margin-top: 20px; margin-left: 20px;'>"; // 添加 div 開始標籤，可以自行調整 margin 屬性
                            echo "<h3>您所管理的商品項目如下</h3>";
                            echo "<table border=1 style='width:100%;'>";
                            echo "<tr>";
                            echo "<th style='text-align:center;width:40%'>商品照片</th>";
                            echo "<th style='text-align:center;width:10%'>商品名稱</th>";
                            echo "<th style='text-align:center;width:10% '>商品價格</th>";
                            echo "<th style='text-align:center;width:10%'>商品描述</th>";
                            echo "<th style='text-align:center;width:10%'>商家地址</th>";
                            echo "<th colspan='2' style='text-align:center;width:20%'>操作</th>"; // 合併修改和刪除列
                            echo "</tr>";

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td style='text-align:center'><img style='width: 40%;' src=\"" . htmlspecialchars($row["photo"]) . "\" alt='Product Image'></td>\n";
                                echo "<td style='text-align:center'>" . $row["name"] . "</td>\n";
                                echo "<td style='text-align:center'>" . $row["price"] . "</td>\n";
                                echo "<td style='text-align:center'>" . $row["descp"] . "</td>\n";
                                echo "<td style='text-align:center'>" . $row["address"] . "</td>\n";
                                echo "<td style='text-align:center; width=10%'><a class=\"btn btn-primary\" href=\"updatebox.php?bid=" . $row["bid"] . "\">修改</a></td>\n";
                                echo "<td style='text-align:center;'><a class='btn btn-danger' onclick=\"return delConfirm('" . $row["name"] . "')\" " . "href='deletebox.php?bid=" . $row["bid"] . "'>刪除</a></td>\n";
                                echo "</tr>";
                            }

                            echo "</table>";
                            echo "</div>"; // 添加 div 結束標籤
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div style="width: 202px; height: 45px; left: 222px; top: 1201px; position: absolute; color: black; font-size: 36px; font-family: Inika; font-weight: 400; word-wrap: break-word">
        Contact us</div>
    <div style="width: 337px; height: 0px; left: 121px; top: 1257px; position: absolute; border: 1px rgba(173.52, 173.52, 173.52, 0.61) solid">
    </div>
    <div style="width: 262px; height: 0px; left: 899px; top: 1257px; position: absolute; border: 1px rgba(173.52, 173.52, 173.52, 0.61) solid">
    </div>
    <div style="width: 160px; height: 233px; left: 472px; top: 380px; position: absolute;">
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
    <script src="script.js"></script>
</body>

</html>

</body>

</html>