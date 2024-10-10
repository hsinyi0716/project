<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>瑜你在珈</title>
    <link rel="stylesheet" href="style.css">
    <?php
     require_once('check.php'); ?>
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
        <div class="tab_box">
            <button class="tab_btn active">製作理念</button>
            <button class="tab_btn">作品特色</button>
            <button class="tab_btn">遊戲說明</button>
            <button class="tab_btn">關於我們</button>
            <div class="line"></div>
        </div>
        <div class="content_box">
            <div class="content active">
                <br>
                <h1>製作理念</h1>
                <br>
                <h3>選擇瑜珈作為此作品的主要運動是因為瑜珈帶來許多好處，例如:消除整天上班上課的疲勞、透過規律的呼吸平靜心靈、
                    <br>也可以紓解生活中帶來的壓力，還可以有效改善睡眠品質
                </h3>
                <br>
                <!-- <img src="images/範例圖檔 4.png" style="width:300px;"> -->
            </div>
            <div class="content">
                <br>
                <h1>作品特色</h1>
                <br>
                <h3>語音提醒、影像辨識、建立專屬用戶、顯示排行榜</h3>
                <br>
                <!-- <img src="images/範例圖檔 5.png" style="width:300px;"> -->
            </div>
            <div class="content">
                <br>
                <h1>遊戲說明</h1>
                <br>
                <h3>準備好您的鏡頭與安全的場域，就可立即開始運動</h3>
                <br>
                <!-- <img src="images/範例圖檔 6.png" style="width:300px;"> -->
            </div>
            <div class="content">
                <br>
                <h1>關於我們</h1>
                <br>
                <h3>製作成員:林欣儀、羅于絜、簡楹錡</h3>
                <br>
                <!-- <img src="images/範例圖檔 7.png" style="width:300px;"> -->
            </div>
        </div>
    </div>
    <script>
        const tabs = document.querySelectorAll('.tab_btn');
        const all_content = document.querySelectorAll('.content');
        tabs.forEach((tab, index) => {
            tab.addEventListener('click', (e) => {
                tabs.forEach(tab => {
                    tab.classList.remove('active');
                });
                tab.classList.add('active');
                var line = document.querySelector('.line');
                line.style.width = e.target.offsetWidth + 'px';
                line.style.left = e.target.offsetLeft + 'px';

                all_content.forEach(content => {
                    content.classList.remove('active');
                })
                all_content[index].classList.add('active');
            })

        })
    </script>

</body>




</html>