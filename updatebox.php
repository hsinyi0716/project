<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改盲盒</title>
    <?php
    session_start();
    ob_start();
    header("content-type:text/html;charset=utf-8");
    ?><script>
        function previewFile() {
            var preview = document.getElementById('previewImage');
            var fileInput = document.getElementById('file');
            var file = fileInput.files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            };
            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "images/uppic.png"; // 如果沒有選擇文件，恢復預設圖片
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
        if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $descp = $_POST['descp'];
            $address = $_POST['address'];
            $sql = sprintf("UPDATE `blindbox` SET name = '$name',price = '$price',descp = '$descp',address = '$address' WHERE bid =%s", $_POST['bid']);
            mysqli_query($dbcon1, $sql);
            echo "<script type='text/javascript'>alert('修改成功!');</script>";
            echo "<script type='text/javascript'>window.location.href='seller.php';</script>";
        }
    }
    mysqli_close($dbcon1); ?>
</head>

<body>
    <?php
    $host = 'localhost';
    $dbname = 'sa';
    $dbuser = 'root';
    $dbpassword = '';
    $dbcon1 = mysqli_connect($host, $dbuser, $dbpassword, $dbname, "3308");
    if ($dbcon1 && isset($_GET['bid'])) {
        $query_getItem = sprintf("SELECT * FROM blindbox WHERE bid = %d", $_GET['bid']);
        $currentItem = mysqli_query($dbcon1, $query_getItem);
        $row_Edit = mysqli_fetch_assoc($currentItem);
        $editFormAction = $_SERVER['PHP_SELF'];
    }
    ?>
    <div style="width: 1440px; height: 2228px; position: relative; background: white">
        <div style="width: 808px; height: 384px; left: 310px; top: 170px; position: absolute; background: rgba(217, 217, 217, 0.54); border-radius: 105px"></div>
        <div style="width: 808px; height: 300px; left: 310px; top: 856px; position: absolute; background: rgba(217, 217, 217, 0.54); border-radius: 87px"></div>
        <div style="width: 808px; height: 200px; left: 316px; top: 1212px; position: absolute; background: rgba(217, 217, 217, 0.54); border-radius: 87px"></div>
        <div style="width: 808px; height: 106px; left: 310px; top: 584px; position: absolute; background: rgba(217, 217, 217, 0.54); border-radius: 105px"></div>
        <div style="width: 808px; height: 106px; left: 310px; top: 720px; position: absolute; background: rgba(217, 217, 217, 0.54); border-radius: 105px"></div>
        <div style="width: 1452px; height: 144px; left: -12px; top: -4px; position: absolute; background: white; box-shadow: 0px 7px 3px rgba(0, 0, 0, 0.03)"></div>
        <div style="width: 154px; height: 44px; left: 656px; top: 56px; position: absolute; color: black; font-size: 38px; font-family: Inika; font-weight: 400; word-wrap: break-word">修改商品</div>

        <div style="width: 192px; height: 54px; left: 618px; top: 474px; position: absolute; color: black; font-size: 38px; font-family: Inika; font-weight: 400; word-wrap: break-word">上傳商品圖</div>
        <div style="width: 159px; height: 54px; left: 365px; top: 610px; position: absolute; color: black; font-size: 38px; font-family: Inika; font-weight: 400; word-wrap: break-word">商品名稱</div>
        <div style="width: 159px; height: 54px; left: 365px; top: 746px; position: absolute; color: black; font-size: 38px; font-family: Inika; font-weight: 400; word-wrap: break-word">商品定價</div>
        <div style="width: 159px; height: 54px; left: 365px; top: 902px; position: absolute; color: black; font-size: 38px; font-family: Inika; font-weight: 400; word-wrap: break-word">盲盒成分</div>
        <div style="width: 146px; left: 372px; top: 1248px; position: absolute; color: black; font-size: 36px; font-family: Inika; font-weight: 400; word-wrap: break-word">店家資訊</div>
        <div style="width: 159px; height: 54px; left: 365px; top: 1308px; position: absolute; color: black; font-size: 38px; font-family: Inika; font-weight: 400; word-wrap: break-word">店家地址</div>
        <form action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <input name="bid" type="hidden" id="bid" value="<?php echo $row_Edit['bid']; ?>" /><br>
            <label for="file">
                <img id="previewImage" src="<?php echo $row_Edit['photo']; ?>" alt="上傳圖片" style="width: 254px; height: 254px; left: 587px; top: 192px; position: absolute; cursor: pointer;" />
                <input type="file" name='file' id="file" style="display: none;" onchange=" previewFile()" />
            </label>
            <input type="text" name='name' id="name" value="<?php echo $row_Edit['name']; ?>" style="width: 514px; height: 54px; left: 531px; top: 610px; position: absolute; background: rgba(255, 255, 255, 0.79);font-size: 40px">
            <input type="number" name='price' id="price" value="<?php echo $row_Edit['price']; ?>" style="width: 514px; height: 54px; left: 531px; top: 746px; position: absolute; background: rgba(255, 255, 255, 0.79);font-size: 40px">
            <textarea name="descp" id="descp" style="width: 514px; height: 200px; top: 906px; left: 531px; position: absolute; background: rgba(255, 255, 255, 0.79); font-size: 40px; resize: none; overflow: hidden;"><?php echo $row_Edit['descp']; ?> </textarea>
            <input type="text" name="address" id="address" value="<?php echo $row_Edit['address']; ?>" style="width: 514px; height: 50px; left: 531px; top: 1310px; position: absolute; background: rgba(255, 255, 255, 0.79);font-size: 40px">
            <div style="width: 417px; height: 108px; left: 506px; top: 1600px; position: absolute">
                <input type="submit" value="更改商品內容" style="width: 417px; height: 108px; left: 0px; top: 0px; position: absolute; background: #2F6C39; border-radius: 69px; text-align: center; color: white; font-size: 64px; font-family: Inika; font-weight: 400; word-wrap: break-word">
            </div>
            <input type="hidden" name="MM_update" value="form1" />
        </form>
    </div>
    <div style="width: 102px; height: 102px; left: 78px; top: 27px; position: absolute">
        <input type="image" src="images/go_back.png" onclick="goback()" style=" width: 35.07px; height: 63.76px; left: 15.93px; top: 19.12px; position: absolute;">
    </div>
    <script src="script.js"></script>

</body>

</html>