<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 獲取表單數據
    $name = $_POST["name"];
    $email = $_POST["email"];
    $issue = $_POST["issue"];
    // 構建郵件內容
    $mailContent = "姓名： $name\n信箱： $email\n問題內容： $issue";

    // 設定郵件標題和收件人
    $subject = "問題回報";
    $to = "anna99525@gmail.com";  // 將 your_email@example.com 替換為你的實際郵箱地址

    // 使用 mail() 函數發送郵件
    $headers = "From: $email";
    ini_set("SMTP", "smtp.gmail.com");
    ini_set("smtp_port", 465);
    ini_set("sendmail_from", "shih23800@gmail.com");  // 更改為你的 Gmail 地址
    // 發送郵件
    mail($to, $subject, $mailContent, $headers);

    // 返回成功消息（你也可以根據情況返回 JSON 格式的數據）
    echo "<script type='text/javascript' > alert('您的問題已成功送出');</script>";
    echo "<script type='text/javascript' > window.location.href='report.php';;</script>";
} else {
    // 如果不是 POST 請求，返回錯誤消息
    http_response_code(405);  // Method Not Allowed
    echo "<script type='text/javascript' > alert('不允許的請求方法');</script>";
}
?>
