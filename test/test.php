<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>盲盒管理系統</title>
    <?php
    session_start()
    ?>
</head>

<body>
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
            echo "<h3>您所管理的商品項目如下</h3>";
            echo "<p><table border=1 style='width:95%;margin-left:20px'>\n";
            // while 迴圈每 1次執行會顯示 1列 (即1筆記錄)
            echo "<tr>";
            echo "<th style='text-align:center'>商品照片</th>";
            echo "<th style='text-align:center'>商品名稱</th>";
            echo "<th style='text-align:center;width:10% '>商品價格</th>";
            echo "<th style='text-align:center'>商品描述</th>";
            echo "<th style='text-align:center'>商家地址</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td style='text-align:center'><img src=\"" . htmlspecialchars($row["photo"]) . "\">" . "</td>\n";
                echo "<td style='text-align:center'>" . $row["name"] . "</td>\n";
                echo "<td style='text-align:center'>" . $row["price"] . "</td>\n";
                echo "<td style='text-align:center'>" . $row["descp"] . "</td>\n";
                echo "<td style='text-align:center'>" . $row["address"] . "</td>\n";
                echo "<td style='text-align:center; width=10%'><a class=\"btn btn-primary\" href=\"itemUpdate.php?id=" . $row["bid"] . "\">修改</a></td>\n";
                // 未經確認就直接刪除，誤刪風險?
                //echo "<td><a href=\"delItem.php?id=" . $row["itemID"] . "\">刪除</a></td>\n";

                // 用 JS function delConfirm() 先做確認再 delete;  
                echo "<td style='text-align:center; width=10%'><a class=\"btn btn-danger\" onclick=\"return delConfirm('" . $row["name"] . "')\" " . "href=\"delItem.php?id=" . $row["bid"] . "\">刪除</a></td>\n";
                echo "<tr>";
            }
            echo "</table>\n";
        }
    } ?>
</body>

</html>