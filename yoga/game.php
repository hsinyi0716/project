<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.6.0/p5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.6.0/addons/p5.sound.min.js"></script>
    <script src="https://unpkg.com/ml5@0.4.3/dist/ml5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>
    <title>瑜你在珈</title>
    <link rel="stylesheet" href="style.css">
    <?php
     require_once('check.php'); 
    ?>
</head>

<body onload="show()">
    <header>
        <h2 class="logo">Yoga</h2>
        <p><?php $username = $_SESSION['username'];echo "歡迎，您好!".$_SESSION['username'];?></p>
        <nav class="navigation">
            <a href="index.php">首頁</a>
            <a href="feature.php">作品簡介</a>
            <a href="report.php">問題回報</a>
            <a href="game.php">進入瑜珈</a>
        </nav>
        <button style="background-color: rgba(255,255,255,0.5);border-style:none;" onclick="window.location.href='logout.php'">logout</button>
    </header>
    <div class="pose_output1" id="pose_output1"style="position:absolute;left:10px;top: 100px;">
    </div>
    <div class="pose_output2" id="pose_output2"style="position:absolute;right:10px;top: 330px;">
    </div>
    <div class="container" style="position:absolute;width:200px;height: 100px;right:10px;top: 100px;padding: 15px;">
        <h3 style="top: 20px;">運動持續時間:</h3>
        <span id="time"></span>
    </div>
    <div class="game" id="game" style="border: 2px black solid;width: 952px;height: 537px;position:absolute;top:85px;">
        <div class="loading">
            <video autoplay muted class="loading" id="loading" style="width: 950px;z-index:98;">
                <source src="images/loading.mp4" type="video/mp4">
            </video>
        </div>
        <div id="game_index" class="game_index" style="display: none; width: 948px;z-index: 40;">
            <img class="game_background" id="game_background" src="images/game_background.png"
                style="width: 100%;position:relative;z-index: 45;">

            <input type="image" class="startbtn" id="startbtn" src="images/button3.png"
                style="display: none;width: 200px; position: absolute;transform: translate(175%,-135%);z-index: 50;">
        </div>
        <div class="warning">
            <video autoplay muted class="warning" id="warning" style="width: 950px;z-index:98;display: none;">
                <source src="images/開始前.mp4" type="video/mp4">
            </video>
            <audio src="images/開始前.mp3" id='warning_mp3' style="display: none;"></audio>
        </div>
        <div id='confirm' class="confirm" id ='confirm'style="position:absolute;left:465px;top:-46px;width: 470px;height:533px;">
            <img class="confirm_b" id="confirm_b" src="images/辨識前(黃).png" style="width: 100%;position:relative;z-index: 44;display: none;">
            <img class="confirm_a" id="confirm_a" src="images/辨識前(綠).png" style="width: 100%;position:relative;z-index: 44;display: none;">
        </div>
        <div id='notice' class="notice" id ='notice' style="position:absolute;left:1px;top:-1px;width: 400px;height:533px;display: none;" >
            <img class="notice" id="notice" src="images/辨識前注意.jpg" style="width:100%;position:relative;">
        </div>
        <div class="main">
            <video autoplay muted class="main" id="main" style="position:absolute;left:-34px;width: 470px;height:533px;display: none;">
                <source src="images/姿勢整合.mp4" type="video/mp4">
            </video>
            <audio src="images/語音整合.mp3" id='main_mp3' style="display: none;"></audio>
        </div>
        <script src="posenet.js"></script>
    </div>
</body>
<script>
    var loading = document.getElementById('loading');
    var index = document.getElementById('game_index');
    var startbtn = document.getElementById('startbtn');
    var warning = document.getElementById('warning');
    var warning_mp3 = document.getElementById('warning_mp3');
    var main_mp3 = document.getElementById('main_mp3');
    var confirm_b = document.getElementById('confirm_b');
    var confirm_a = document.getElementById('confirm_a');
    var notice = document.getElementById('notice');
    var game = document.getElementById('game');
    var game_background = document.getElementById('game_background');
    warning_mp3.pause();
    main_mp3.pause();
    loading.addEventListener('ended', function () {
        this.remove();
        index.style.display = 'block';
        startbtn.style.display = 'block';
    });
    warning.addEventListener('ended',function(){
        warning.remove();
        warning_mp3.remove();
        confirm_b.style.display="block";
        notice.style.display='block';
        canvas.style.display = "block";
        centerCanvas();
    })
    startbtn.addEventListener('click', function () {
        index.remove();
        warning.style.display='block';
        warning_mp3.play();
    });
</script>
<?php
if(isset($_POST)){
    $data = file_get_contents('php://input');
    $score = (int)(json_encode(json_decode($data,true)));
    $score =($score/1000)/60;
    // echo $user['username'];
    $host='localhost';
    $dbname='project';
    $dbuser='root';
    $dbpassword='';
    $dbcon1 = mysqli_connect($host, $dbuser, $dbpassword, $dbname, "3308");
    if($dbcon1){
            $sql="SELECT score FROM user WHERE username='$username'";
            $result=mysqli_query($dbcon1, $sql);
            $row=mysqli_fetch_row($result);
            $score=$score+$row[0];
            $sql="UPDATE user SET score=$score WHERE username='$username'";
            mysqli_query($dbcon1, $sql);
        }
        mysqli_close($dbcon1); 
}
?>

</html>