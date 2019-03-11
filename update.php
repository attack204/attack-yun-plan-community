<?php
    session_start(); 
    header("Content-type:text/html;charset=utf-8");
    $q = $_POST['name'];
    if(isset($_SESSION['logstate'])) {
        $user = $_SESSION['logstate'];
        $_SESSION[$user] = (string)$q;
        echo $_SESSION[$user];
    }
    else echo "gg";
?>