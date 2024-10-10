<?php
//session_unset 函式只取消 session 變數，但 session 仍在
session_unset();

$redirectLogout = "index.php";  // 設定 logout 之後的轉址 URL
session_start();

// session_destroy 函式將會消滅 session 與相關資料
session_destroy();

// 連帶刪除帶 session_id 的 cookie
setcookie(session_name(), '', 1);

// 登出之後，再轉址到會員登入 (login) 頁面
header("Location: " . $redirectLogout);
// exit;
