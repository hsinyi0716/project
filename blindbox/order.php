<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>下單</title>
    <script src="script.js"></script>
</head>

<body>
    <div style="width: 1360px; height: 2530px; position: relative; background: white">
        <div style="width: 1223px; height: 2484px; left: 60px; top: 46px; position: absolute; background: #E7E7E7; border-top-left-radius: 89px; border-top-right-radius: 89px"></div>
        <div style="width: 878px; height: 213px; left: 195px; top: 2054px; position: absolute; background: rgba(158.68, 196.90, 120.45, 0.49); border-radius: 68px"></div>
        <div style="width: 892px; height: 246px; left: 217px; top: 831px; position: absolute; background: rgba(158.68, 196.90, 120.45, 0.49); border-radius: 68px"></div>
        <div style="width: 188px; height: 35px; left: 208px; top: 2126px; position: absolute; text-align: right; color: #9A9A9A; font-size: 38px; font-family: Inika; font-weight: 400; word-wrap: break-word">在此輸入</div>
        <div style="width: 99px; height: 54px; left: 240px; top: 2068px; position: absolute; text-align: right; color: black; font-size: 38px; font-family: Inika; font-weight: 400; word-wrap: break-word">備註:</div>
        <div style="width: 272px; height: 70px; left: 261px; top: 460px; position: absolute; color: black; font-size: 40px; font-family: Inika; font-weight: 700; word-wrap: break-word">店名:麥當當</div>
        <div style="width: 386px; height: 213px; left: 217px; top: 578px; position: absolute">
            <div style="width: 386px; height: 213px; left: 0px; top: 0px; position: absolute; background: rgba(158.68, 196.90, 120.45, 0.49); border-radius: 68px"></div>
            <div style="width: 283px; height: 71px; left: 52px; top: 71px; position: absolute; color: #1E1C1C; font-size: 35px; font-family: Inika; font-weight: 700; word-wrap: break-word">金額: 250</div>
        </div>
        <div style="width: 386px; height: 213px; left: 723px; top: 578px; position: absolute">
            <div style="width: 386px; height: 213px; left: 0px; top: 0px; position: absolute; background: rgba(158.68, 196.90, 120.45, 0.49); border-radius: 68px"></div>
            <div style="width: 138.36px; height: 29.11px; left: 101.47px; top: 75.26px; position: absolute; color: black; font-size: 36px; font-family: Inika; font-weight: 700; word-wrap: break-word">付現</div>
            <div style="width: 138.36px; height: 29.11px; left: 101.47px; top: 112.89px; position: absolute; color: black; font-size: 36px; font-family: Inika; font-weight: 700; word-wrap: break-word">信用卡</div>
            <div style="width: 138.36px; height: 29.11px; left: 101.47px; top: 156.91px; position: absolute; color: black; font-size: 36px; font-family: Inika; font-weight: 700; word-wrap: break-word">line pay</div>
            <div style="width: 202px; height: 64px; left: 55px; top: 16px; position: absolute; color: #1E1C1C; font-size: 36px; font-family: Inika; font-weight: 700; word-wrap: break-word">付款方式:</div>
        </div>
        <div style="width: 93px; height: 92px; left: 89px; top: 99px; position: absolute">
            <div style="width: 93px; height: 92px; left: 0px; top: 0px; position: absolute; background: #5E875A; border-radius: 9999px"></div>
            <img src="images/返回鍵.png" onclick="goback()" style="width: 55.08px; height: 67.23px; left: 15.02px; top: 12.03px; position: absolute; ">
        </div>
    </div>
    <img style="width: 288.94px; height: 41.29px; left: 776.93px; top: 474.75px; position: absolute" src="images/喜好項目.png" />
    <div style="width: 1022px; height: 545px; left: 121px; top: 1117px; position: absolute">
        <img style="width: 878px; height: 456px; left: 91px; top: 17px; position: absolute; border-radius: 68px" src="images/取餐時間.png" />
    </div>
    <div style="width: 878px; height: 352px; left: 195px; top: 1662px; position: absolute">
        <div style="width: 878px; height: 352px; left: 0px; top: 0px; position: absolute; background: rgba(158.68, 196.90, 120.45, 0.49); border-radius: 68px"></div>
        <div style="width: 568px; height: 273px; left: 155px; top: 39px; position: absolute; text-align: center; color: black; font-size: 32px; font-family: Inika; font-weight: 400; word-wrap: break-word">( 醣類 : 76.9 蛋白質 : 34.5 脂質 : 11.3 熱量 : 547 kcal )100g/ 份（±10g）<br />產地：國產豬<br />圖片僅供參考，以實際餐盒為主<br />（餐盒均附營養米飯、配菜、蛋)<br />（配菜依照當令季節時蔬略有不同，會不定期更換，皆採現場製作配菜為主）</div>
    </div>
    <div style="width: 712px; height: 371px; left: 326px; top: 71px; position: absolute">
        <img style="width: 712px; height: 371px; left: 0px; top: 0px; position: absolute; border-radius: 48px" src="images/family_meal.png" />
    </div>
    <div style="width: 205px; height: 64px; left: 698px; top: 2349px; position: absolute; box-shadow: 0px 30px 40px rgba(0, 0, 0, 0.05)">
        <button onclick="successorder()" style="width: 205px; height: 64px; left: 0px; top: 0px; position: absolute; background: rgba(158.68, 196.90, 120.45, 0.49); border-radius: 68px; color: black; font-size: 24px; font-family: Inika;  word-wrap: break-word">立即下訂</button>
    </div>
    <div style="width: 900px; height: 111px; left: 247px; top: 856px; position: absolute; color: black; font-size: 38px; font-family: Inika; font-weight: 400; word-wrap: break-word">店家資訊<br />地址 :台中市沙鹿區台灣大道七段333號
        <br />電話 : 04-98765432<br />
    </div>
    </div>
</body>

</html>