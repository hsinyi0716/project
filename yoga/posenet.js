
var eye1x = 0, eye1y = 0,
    eye2x = 0, eye2y = 0,
    nosex = 0, nosey = 0,
    ear1x = 0, ear1y = 0,
    ear2x = 0, ear2y = 0,
    shoulder1x = 0, shoulder1y = 0,
    shoulder2x = 0, shoulder2y = 0,
    elbow1x = 0, elbow1y = 0,
    elbow2x = 0, elbow2y = 0,
    wrist1x = 0, wrist1y = 0,
    wrist2x = 0, wrist2y = 0,
    hip1x = 0, hip1y = 0,
    hip2x = 0, hip2y = 0,
    knee1x = 0, knee1y = 0,
    knee2x = 0, knee2y = 0,
    ankle1x = 0, ankle1y = 0,
    ankle2x = 0, ankle2y = 0;
var cnv;
let poseData = new Array(17).fill({ name: '', x: 0, y: 0 });
var is_sport = false;
let is_confirm = false;
noneofgreen.hasRun = false;
endyoga.hasRun = false;
var frameCheckInterval = 20;
var elapsedBeforeReset = 0;
var score = 0;
var slopeAB_left = 0;
var slopeBC_left = 0;
var slopeAB_right = 0;
var slopeBC_right = 0;
var angleDegrees_left = 0;
var angleDegrees_right = 0;
var angleRadians_left = 0;
var angleRadians_right = 0;
var turngreen = false;
var main = document.getElementById('main');
function centerCanvas() {
    cnv.position(618, 87);
}
function setup() {
    cnv = createCanvas(540, 533);
    cnv.style('transform:rotateY(180deg)');
    centerCanvas();
    video = createCapture(VIDEO);
    video.size(540, 533);
    video.hide();
    pose = ml5.poseNet(video);
    pose.on('pose', getPoses);
}
function getPoses(poses) {
    if (poses.length > 0) {
        eye1x = poses[0].pose.keypoints[1].position.x;
        eye1y = poses[0].pose.keypoints[1].position.y;

        eye2x = poses[0].pose.keypoints[2].position.x;
        eye2y = poses[0].pose.keypoints[2].position.y;

        nosex = poses[0].pose.keypoints[0].position.x;
        nosey = poses[0].pose.keypoints[0].position.y;

        ear1x = poses[0].pose.keypoints[3].position.x;
        ear1y = poses[0].pose.keypoints[3].position.y;

        ear2x = poses[0].pose.keypoints[4].position.x;
        ear2y = poses[0].pose.keypoints[4].position.y;

        shoulder1x = poses[0].pose.keypoints[5].position.x;
        shoulder1y = poses[0].pose.keypoints[5].position.y;

        shoulder2x = poses[0].pose.keypoints[6].position.x;
        shoulder2y = poses[0].pose.keypoints[6].position.y;

        elbow1x = poses[0].pose.keypoints[7].position.x;
        elbow1y = poses[0].pose.keypoints[7].position.y;

        elbow2x = poses[0].pose.keypoints[8].position.x;
        elbow2y = poses[0].pose.keypoints[8].position.y;

        wrist1x = poses[0].pose.keypoints[9].position.x;
        wrist1y = poses[0].pose.keypoints[9].position.y;

        wrist2x = poses[0].pose.keypoints[10].position.x;
        wrist2y = poses[0].pose.keypoints[10].position.y;

        hip1x = poses[0].pose.keypoints[11].position.x;
        hip1y = poses[0].pose.keypoints[11].position.y;

        hip2x = poses[0].pose.keypoints[12].position.x;
        hip2y = poses[0].pose.keypoints[12].position.y;

        knee1x = poses[0].pose.keypoints[13].position.x;
        knee1y = poses[0].pose.keypoints[13].position.y;

        knee2x = poses[0].pose.keypoints[14].position.x;
        knee2y = poses[0].pose.keypoints[14].position.y;

        ankle1x = poses[0].pose.keypoints[15].position.x;
        ankle1y = poses[0].pose.keypoints[15].position.y;

        ankle2x = poses[0].pose.keypoints[16].position.x;
        ankle2y = poses[0].pose.keypoints[16].position.y;
        for (let i = 0; i < poses[0].pose.keypoints.length; i++) {
            let keypoint = poses[0].pose.keypoints[i];
            poseData[i] = { name: keypoint.part, x: Math.floor(keypoint.position.x), y: Math.floor(keypoint.position.y) };
        }
        if (nosex > 210 && nosex < 240 && nosey > 60 && nosey < 90) {
            is_confirm = true;
        }
        if (hip1x > 150 && hip1x < 350 && hip2x > 150 && hip2x < 350 && hip1y > 200 && hip1y < 400 && hip2x > 200 && hip2x < 400) {
            is_sport = true;
        } else {
            is_sport = false;
        }
        calculate();
    } else {
        is_sport = false;
    }
}
function calculate() {
    slopeAB_left = (knee1y - hip1y) / (knee1x - hip1x);
    slopeBC_left = (ankle1y - knee1y) / (ankle1x - knee1x);
    slopeAB_right = (knee2y - hip2y) / (knee2x - hip2x);
    slopeBC_right = (ankle2y - knee2y) / (ankle2x - knee2x);
    // 计算夹角（弧度）
    angleRadians_left = Math.atan((slopeBC_left - slopeAB_left) / (1 + slopeAB_left * slopeBC_left));
    angleRadians_right = Math.atan((slopeBC_right - slopeAB_right) / (1 + slopeAB_right * slopeBC_right));
    // 将弧度转换为角度
    angleDegrees_left = angleRadians_left * (180 / Math.PI);
    angleDegrees_right = angleRadians_right * (180 / Math.PI);
    if (angleDegrees_left < 0) {
        angleDegrees_left = 180 + angleDegrees_left;
        if (angleDegrees_right < 0) {
            angleDegrees_right = 180 + angleDegrees_right;
        }
    }
    console.log("左：" + angleDegrees_left);
    console.log("右：" + angleDegrees_right);
    compare();
}
function compare() {
    main.addEventListener('timeupdate', function () {
        // 取得目前影片的播放時間
        var currentTime = main.currentTime;

        // 當播放時間到達指定秒數時
        //深蹲
        if (currentTime >= 140) {
            if (angleDegrees_left >= 140 && angleDegrees_left <= 170 && angleDegrees_right <= 170 && angleDegrees_right >= 140) {
                turngreen = true;
            } else {
                turngreen = false;
            }
        }
        //英雄二
        else if (currentTime >= 90) {
            if (angleDegrees_left >= 160 && angleDegrees_left <= 175 && angleDegrees_right <= 157 && angleDegrees_right >= 142) {
                turngreen = true;
            } else {
                turngreen = false;
            }
        }
        //抬腿
        else if (currentTime >= 50) {
            if (angleDegrees_left >= 165 && angleDegrees_left <= 180 && angleDegrees_right <= 110 && angleDegrees_right >= 90) {
                turngreen = true;
            } else {
                turngreen = false;
            }
        }
        //樹
        else if (currentTime >= 30) {
            if (angleDegrees_left >= 30 && angleDegrees_left <= 120 && angleDegrees_right <= 25 && angleDegrees_right >= -10) {
                turngreen = true;
            } else {
                turngreen = false;
            }
        }
    });
    // if (angleDegrees_left > 55 && angleDegrees_left < 65) {
    //     turngreen = true;
    // } else if (angleDegrees_left > 90 && angleDegrees_left < 120) {
    //     turngreen = true;
    // } else if (angleDegrees_right > 90 && angleDegrees_left < 120) {
    //     turngreen = true;
    // } else if (angleDegrees_left > 140 && angleDegrees_left < 180 && angleDegrees_right > 130 && angleDegrees_right < 160) {
    //     turngreen = true;
    // }
    // else {
    //     turngreen = false;
    // }
}
function getIsSportValue() {
    return is_sport;

}
function getIsConfirm() {
    return is_confirm;
}
function noneofgreen() {
    var green = document.getElementById('confirm_a');
    var notice = document.getElementById('notice');
    var main = document.getElementById('main');
    var main_mp3 = document.getElementById('main_mp3');
    green.style.display = 'none';
    notice.style.display = 'none';
    main.style.display = 'block';
    main_mp3.play();
    noneofgreen.hasRun = true;
}
function endyoga() {
}
main.addEventListener('ended', function () {
    endyoga.hasRun = true;
    stop();
    score = elapsedBeforeReset;
    sendscore();
})
function sendscore() {
    fetch('game.php', {
        'method': 'POST',
        'headers': {
            'Content-Type': 'application/json;charset = utf-8'
        },
        'body': JSON.stringify(score)
    }).then(function (response) {
        return response.json();
    }).then(function (data) {
        console.log(data);
    })
}
function processisconfirm() {
    var currentFrame = frameCount;
    if (currentFrame % frameCheckInterval === 0) {
        var yellow = document.getElementById('confirm_b');
        var green = document.getElementById('confirm_a');
        var currentIsConfirm = getIsConfirm();
        if (currentIsConfirm == true) {
            yellow.style.display = 'none';
            green.style.display = 'block';
            setTimeout(noneofgreen, 2000);
        }
    }
}
function processissport() {
    var currentFrame = frameCount;
    if (currentFrame % frameCheckInterval === 0) {
        var currentIsSport = getIsSportValue();
        if (endyoga.hasRun != true) {
            if (currentIsSport == true && noneofgreen.hasRun == true) {
                start();
            } else {
                stop();
            }
        }
    }
}
// 定期发送数据到 PHP 的函数
function sendPoseData() {
    if (poseData.length > 0) {
        // 使用 Fetch API 发送数据到 PHP
        fetch('test.php', {
            'method': 'POST',
            'headers': {
                'Content-Type': 'application/json;charset = utf-8',
            },
            body: JSON.stringify({ poseData }),
        }).then(function (response) {
            return response.json();
        }).then(function (data) {
            displayDataInHTML(data);
        }).catch(function (error) {
            console.error('Error during fetch:', error);
        });
    }
}
function displayDataInHTML(data) {
    // 假設你有一個 id 為 "output" 的元素用於顯示數據
    var outputElement1 = document.getElementById('pose_output1');
    var outputElement2 = document.getElementById('pose_output2');
    // 清空現有內容
    outputElement1.innerHTML = '';
    outputElement2.innerHTML = '';
    data = data.poseData
    for (var key in data) {
        if (data[key].name != 'leftHip' && data[key].name != 'rightHip' && data[key].name != 'leftKnee' && data[key].name != 'rightKnee' && data[key].name != 'rightAnkle' && data[key].name != 'leftAnkle') {
            outputElement1.innerHTML += `<p>${data[key].name}</p><p>${data[key].x}, ${data[key].y}</p>`;
        }
        else {
            outputElement2.innerHTML += `<p>${data[key].name}</p><p>${data[key].x}, ${data[key].y}</p>`;
        }
    }
}
// 设置定期发送数据的时间间隔（毫秒）
const sendDataInterval = 1000; // 1秒

// 使用 setInterval 定期调用发送数据的函数
setInterval(sendPoseData, sendDataInterval);
//設定碼錶按鍵:開始、暫停以及清除
var stopwatch = function () {
    //開始
    var startAt = 0;
    //每次
    var lapTime = 0;

    //清除按鈕
    this.reset = function () {
        startAt = lapTime = 0;
    };
    //開始按鈕
    var now = function () {
        return (new Date().getTime());
    }
    this.start = function () {
        startAt = startAt ? startAt : now();
    }
    //暫停按鈕
    this.stop = function () {
        lapTime = startAt ? lapTime + now() - startAt : lapTime;
        startAt = 0;
    }
    //總共經歷的時間
    this.time = function () {
        return lapTime + (startAt ? now() - startAt : 0);
    }
}


//設定時間的格式:時、分、秒，顯示到html
var x = new stopwatch();
var time;
var clocktimer;
// 分、秒幾位數 格式
function pad(num, size) {
    var s = "00" + num;
    return s.substring(s.length - size);
}
// 分、秒幾位數 計算
function formatTime(time) {
    var h = m = s = ms = 0;
    //停止的時間
    var newTime = '';
    //時
    h = Math.floor(time / (60 * 60 * 1000));
    time = time % (60 * 60 * 1000);
    //分
    m = Math.floor(time / (60 * 1000));
    time = time % (60 * 1000);
    //秒
    ms = time % 1000;
    s = Math.floor(time / 1000)
    //顯示時間計算結果，套用到幾位數格式上
    newTime = pad(h, 2) + ":" + pad(m, 2) + ":" + pad(s, 2) + ":" + pad(ms, 3);
    return newTime;
}
//顯示結果放到HTML檔案中
function show() {
    time = document.getElementById('time');
    update();
}
function update() {
    time.innerHTML = formatTime(x.time());
}
function start() {
    clocktimer = setInterval('update()', 1);
    x.start();
}
function stop() {
    x.stop();
    elapsedBeforeReset = x.time();
    clearInterval(clocktimer);
}
function reset() {
    stop();
    x.reset();
    update();
}
function draw() {
    background(220);
    image(video, 0, 0);
    fill(0, 0, 0);
    ellipse(eye1x, eye1y, 10);
    fill(0, 0, 0);
    ellipse(eye2x, eye2y, 10);
    fill(0, 0, 0);
    ellipse(nosex, nosey, 10);
    fill(0, 0, 0);
    ellipse(ear1x, ear1y, 10);
    fill(0, 0, 0);
    ellipse(ear2x, ear2y, 10);
    fill(0, 0, 0);
    ellipse(shoulder1x, shoulder1y, 10);
    fill(0, 0, 0);
    ellipse(shoulder2x, shoulder2y, 10);
    fill(0, 0, 0);
    ellipse(elbow1x, elbow1y, 10);
    fill(0, 0, 0);
    ellipse(elbow2x, elbow2y, 10);
    fill(0, 0, 0);
    ellipse(wrist1x, wrist1y, 10);
    fill(0, 0, 0);
    ellipse(wrist2x, wrist2y, 10);
    fill(0, 0, 0);
    ellipse(hip1x, hip1y, 10);
    fill(0, 0, 0);
    ellipse(hip2x, hip2y, 10);
    fill(0, 0, 0);
    ellipse(knee1x, knee1y, 10);
    fill(0, 0, 0);
    ellipse(knee2x, knee2y, 10);
    fill(0, 0, 0);
    ellipse(ankle1x, ankle1y, 10);
    fill(0, 0, 0);
    ellipse(ankle2x, ankle2y, 10);
    if (turngreen == false) {
        stroke('red');
        strokeWeight(7);
        line(nosex, nosey, shoulder2x, shoulder2y);
        stroke('red');
        line(nosex, nosey, shoulder1x, shoulder1y);
        stroke('red');
        line(shoulder1x, shoulder1y, shoulder2x, shoulder2y);
        stroke('red');
        line(shoulder1x, shoulder1y, elbow1x, elbow1y);
        stroke('red');
        line(shoulder2x, shoulder2y, elbow2x, elbow2y);
        stroke('red');
        line(elbow1x, elbow1y, wrist1x, wrist1y);
        stroke('red');
        line(elbow2x, elbow2y, wrist2x, wrist2y);
        stroke('red');
        line(hip1x, hip1y, shoulder1x, shoulder1y);
        stroke('red');
        line(hip2x, hip2y, shoulder2x, shoulder2y);
        stroke('red');
        line(hip1x, hip1y, hip2x, hip2y);
        stroke('red');
        line(hip1x, hip1y, knee1x, knee1y);
        stroke('red');
        line(knee1x, knee1y, ankle1x, ankle1y);
        stroke('red');
        line(hip2x, hip2y, knee2x, knee2y);
        stroke('red');
        line(knee2x, knee2y, ankle2x, ankle2y);
    } else {
        strokeWeight(7);
        stroke('green');
        line(nosex, nosey, shoulder2x, shoulder2y);
        stroke('green');
        line(nosex, nosey, shoulder1x, shoulder1y);
        stroke('green');
        line(shoulder1x, shoulder1y, shoulder2x, shoulder2y);
        stroke('green');
        line(shoulder1x, shoulder1y, elbow1x, elbow1y);
        stroke('green');
        line(shoulder2x, shoulder2y, elbow2x, elbow2y);
        stroke('green');
        line(elbow1x, elbow1y, wrist1x, wrist1y);
        stroke('green');
        line(elbow2x, elbow2y, wrist2x, wrist2y);
        stroke('green');
        line(hip1x, hip1y, shoulder1x, shoulder1y);
        stroke('green');
        line(hip2x, hip2y, shoulder2x, shoulder2y);
        stroke('green');
        line(hip1x, hip1y, hip2x, hip2y);
        stroke('green');
        line(hip1x, hip1y, knee1x, knee1y);
        stroke('green');
        line(knee1x, knee1y, ankle1x, ankle1y);
        stroke('green');
        line(hip2x, hip2y, knee2x, knee2y);
        stroke('green');
        line(knee2x, knee2y, ankle2x, ankle2y);
    }
    if (!noneofgreen.hasRun) {
        processisconfirm();
    }
    processissport();
}


