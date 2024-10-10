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
    <?php
    $username=$_SESSION['username'];
    $host='localhost';
    $dbname='project';
    $dbuser='root';
    $dbpassword='';
    $max_username=array();
    $max_score=array();
    $dbcon1 = mysqli_connect($host, $dbuser, $dbpassword, $dbname, "3308");
    $sql="SELECT username,score FROM `user` ORDER BY `user`.`score` DESC LIMIT 3";
    $result=mysqli_query($dbcon1, $sql);
    $i=0;
    while($row = $result->fetch_assoc()) {
        $max_username[]=$row["username"];
        $max_score[]=$row["score"];
        $i++;
    }
    $sql="SELECT username,score FROM user WHERE username='$username'";
    $result=mysqli_query($dbcon1, $sql);
    $row=mysqli_fetch_row($result);
    $max_username[]=$row[0];
    $max_score[]=$row[1];
    mysqli_close($dbcon1); 
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
    
    <div class="carousel">
        <button class="carousel_button carousel_button--left is-hidden">
            <img src="images/left.svg" alt="">
        </button>
        <div class="carousel_track-container">
            <ul class="carousel_track">
                <li class="carousel_slide current-slide">
                    <img class="carousel_image" src="images/首頁1.jpg" alt="圖檔1">
                </li>
                <li class="carousel_slide">
                    <img class="carousel_image" src="images/動作橫幅1.jpg" alt="圖檔2">
                </li>
                <li class="carousel_slide">
                    <img class="carousel_image" src="images/動作橫幅2.jpg" alt="圖檔3">
                </li>
            </ul>
        </div>
        <button class="carousel_button carousel_button--right">
            <img src="images/right.svg" alt="">
        </button>

        <div class="carousel_nav">
            <button class="carousel_indicator current-slide"></button>
            <button class="carousel_indicator "></button>
            <button class="carousel_indicator "></button>
        </div>
    </div>
    <script src="carousel.js"></script>
    
    <img style="width: 955px; height: 656px; left: 210px; top: 700px; position: absolute" src="images/排行榜.png" />
      <div style="width: 215px; height: 52px; left: 600px; top: 900px; position: absolute; background: rgba(217, 217, 217, 0.48);font-size: 30px;"><?php echo $max_username[0]?></div>
      <div style="width: 215px; height: 52px; left: 600px; top: 993px; position: absolute; background: rgba(217, 217, 217, 0.48);font-size: 30px;"><?php echo $max_username[1]?></div>
      <div style="width: 215px; height: 52px; left: 600px; top: 1085px; position: absolute; background: rgba(217, 217, 217, 0.48);font-size: 30px;"><?php echo $max_username[2]?></div>
      <div style="width: 215px; height: 52px; left: 600px; top: 1176px; position: absolute; background: rgba(217, 217, 217, 0.48);font-size: 30px;"><?php echo $max_username[3]?></div>
      <div style="width: 150px; height: 52px; left: 850px; top: 900px; position: absolute; background: rgba(217, 217, 217, 0.67);font-size: 30px;"><?php echo $max_score[0].' mins'?></div>
      <div style="width: 150px; height: 52px; left: 850px; top: 993px; position: absolute; background: rgba(217, 217, 217, 0.67);font-size: 30px;"><?php echo $max_score[1].' mins'?></div>
      <div style="width: 150px; height: 52px; left: 850px; top: 1085px; position: absolute; background: rgba(217, 217, 217, 0.67);font-size: 30px;"><?php echo $max_score[2].' mins'?></div>
      <div style="width: 150px; height: 52px; left: 850px; top: 1176px; position: absolute; background: rgba(217, 217, 217, 0.67);font-size: 30px;"><?php echo $max_score[3].' mins'?></div>
    
    <footer>
    <div style="width: 1370px; height: 200px; left: 0px; top: 1350px; position: absolute" >
      <div style="width: 1370px; height: 200px; left: 0px; top: 0px; position: absolute; background: #EFDBC4"></div>
      <div style="width: 587px; height: 80px; left: 25px; top: 100px; position: absolute" >
      <img style="width: 300px; height: 50px; left: 125px; top: 20px; position: absolute;"src="images/mail.png"/>
        <div style="width: 77.53px; height: 77.18px; left: 0px; top: 4.41px; position: absolute"></div>
        <div style="width: 85.28px; height: 86px; left: 165.02px; top: 0px; position: absolute">
        </div>
      </div>
      <div style="width: 200px; height: 59px; left: 220px; top: 30px; position: absolute; color: black; font-size: 36px; font-family: Inika; font-weight: 400; word-wrap: break-word">Contact us</div>
      <div style="width: 146px; height: 57px; left: 980px; top: 30px; position: absolute; color: black; font-size: 32px; font-family: Inika; font-weight: 400; word-wrap: break-word">製作團隊</div>
      <div style="width: 106px; height: 47px; left: 1200px; top: 120px; position: absolute; color: black; font-size: 32px; font-family: Inika; font-weight: 400; word-wrap: break-word">羅于絜</div>
      <div style="width: 106px; height: 47px; left: 1000px; top: 120px; position: absolute; color: black; font-size: 32px; font-family: Inika; font-weight: 400; word-wrap: break-word">簡楹錡</div>
      <div style="width: 106px; height: 47px; left: 800px; top: 120px; position: absolute; color: black; font-size: 32px; font-family: Inika; font-weight: 400; word-wrap: break-word">林欣儀</div>
    </footer>
</body>
</html>
