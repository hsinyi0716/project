<?php session_start();
    if (!isset($_SESSION["username"]))
    {
        $redirectLogin = "login.php";
        header("Refresh: 0.1; URL=$redirectLogin");  
    }?>