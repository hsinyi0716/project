<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>瑜你在珈</title>
    <link rel="stylesheet" href="style.css">
    <?php
     require_once('check.php'); 
    ?>
</head>

<body>
    <header>
        <h2 class="logo">Yoga</h2>
        <p><?php echo "歡迎，您好!".$_SESSION['username']?></p>
        <nav class="navigation">
            <a href="index.php">首頁</a>
            <a href="feature.php">作品簡介</a>
            <a href="report.php">問題回報</a>
            <a href="game.php">進入瑜珈</a>
        </nav>
        <button style="background-color: rgba(255,255,255,0.5);border-style:none;" onclick="window.location.href='logout.php'">logout</button>
    </header>
    <div class="container">
    <div class="form-container">
    <h1 style="text-align: center;">問題回報表單</h1><br>
    <form id="reportForm" action="submit.php" method="post">
        <div class="form-input">
            <label for="name" class="input-label">姓名</label>
            <input type="text" id="name" name="name" class="input-field" style=" width: 30%;">
        </div>
        <div class="form-input">
            <label for="email" class="input-label">信箱</label>
            <input type="email" id="email" name="email" class="input-field">
        </div>
        <div class="form-input">
            <label for="issue" class="input-label">問題內容</label>
            <textarea id="issue" name="issue" rows="4" class="input-field"></textarea>
        </div>
        <button type="submit" class="submit-button">送出</button>
    </form>
    </div>
</div>

    </div>
</body>



</html>