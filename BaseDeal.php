<!DOCTYPE HTML>
<html lang="zh-CN">

<head>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <title>数据库处理</title>
    </head>
    <link rel="stylesheet" href="//cdnjs.loli.net/ajax/libs/mdui/0.4.2/css/mdui.min.css">
    <script src="//cdnjs.loli.net/ajax/libs/mdui/0.4.2/js/mdui.min.js"></script>
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script>
        function check() {
            mdui.alert("注册成功");
        }
    </script>
</head>


<?php
$address = $basename = $user = $password = $table = $dbname = "123";
if (isset($_POST['InitBase'])) { //初始化数据库
    $address   = $_POST["DatabaseAddress"];
    $dbname    = $_POST["DatabaseName"];
    $username  = $_POST["DatabaseUserName"];
    $password  = $_POST["DatabaseUserPassword"];
    $table     = $_POST["DatabaseTableName"];
    // echo $address . "<br>";
    // echo $dbname . "<br>";
    // echo $username . "<br>";
    // echo $password . "<br>";
    // echo $table . "<br>";
    if (empty($address) || empty($dbname) || empty($username) || empty($table)) {
        echo "Fail, something error; <br> please return and check your input information;";
    } else {
        $conn = new mysqli($address, $username, $password, $dbname);
        if ($conn->connect_error) { //连接数据库
            die("link failed bacause -> " . $conn->connect_error);
        } else { //创建数据库表
            echo "link successful <br>";
            $sql = "CREATE TABLE $table (
                        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                        username VARCHAR(30) NOT NULL,
                        password VARCHAR(30) NOT NULL,
                        email VARCHAR(50),
                        regip VARCHAR(50),
                        reg_date TIMESTAMP
                        )";
            if ($conn->query($sql) == true) {
                echo "Table created successful! <br>";
                $file = fopen("config.php", "w");
                echo fwrite($file, $address . "\n" . $username . "\n" . $password . "\n" . $dbname . "\n" . $table . "\n");
            } else {
                echo "Table created failed because ->" . $conn->error;
            }
        }
    }
} else if (isset($_POST["Register"])) { //注册   这里的变量是每次都刷新的啊qwq

    $UserName     = $_POST["RegisterName"]; //获取注册信息
    $UserEmail    = $_POST["RegisterEmail"];
    $UserPassword = $_POST["RegisterPassword"];
    $UserIp = 0;
    if (!isset($_SERVER['HTTP_X_FORWARDED_FOR'])) $UserIp = $_SERVER['REMOTE_ADDR'];
    else $UserIp = $_SERVER['HTTP_X_FORWARDED_FOR'];

    $file = fopen("config.php", "r") or exit("Can't open the config file");
    if (feof($file)) die("please initialize your database first ");
    $address   = trim(fgets($file));
    $username  = trim(fgets($file));
    $password  = trim(fgets($file));
    $dbname    = trim(fgets($file));
    $table     = trim(fgets($file));

    $conn = new mysqli($address, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("can't link to database because->" . $conn->error);
    } else {
        echo "linksuccess" . "<br>";
        mysqli_query($conn, "set names utf8"); //tag 防止中文乱码
        mysqli_select_db($conn, $dbname);
        $sql = "SELECT COUNT(*) FROM $table WHERE BINARY username = '" . $UserName . "' ";
        $retval = mysqli_fetch_array(mysqli_query($conn, $sql));
        if ($retval[0] == 0) {
            $sql = "INSERT INTO DailyLife (username, password, email, regip)
                            VALUES ('" . $UserName . "', '" . $UserPassword . "', '" . $UserEmail . "', '" . $UserIp . "')";
            if ($conn->query($sql) == true) {
                echo "register successful!";
            } else {
                echo "register failed because -> " . $conn->error;
            }
        } else die("user has exists");
    }

    // echo "<script type=text/javascript>alert('1');</script>";
} else if (isset($_POST["Login"])) { //登陆

    $file = fopen("config.php", "r") or exit("Can't open the config file");
    if (feof($file)) die("please initialize your database first ");
    $address   = trim(fgets($file));
    $username  = trim(fgets($file));
    $password  = trim(fgets($file));
    $dbname    = trim(fgets($file));
    $table     = trim(fgets($file));
    $UserName     = $_POST["LoginName"]; //获取登陆信息
    $UserPassword = $_POST["LoginPassword"];

    $conn = new mysqli($address, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("can't link to database because->" . $conn->error);
    } else {
        echo "linksuccess" . "<br>";
        mysqli_query($conn, "set names utf8"); //tag 防止中文乱码
        mysqli_select_db($conn, $dbname);
        echo $UserName . "<br>";
        $sql = "SELECT * FROM $table WHERE username = '" . $UserName . "' ";
        $retval = mysqli_query($conn, $sql);
        if (!$retval) {
            die("can't find the user" . "<br>");
        }
        $row = mysqli_fetch_array($retval, MYSQL_ASSOC);
        // echo $row['password'] . "\n" . $UserPassword;
        if ($row['password'] == $UserPassword) {
            echo "successfully login " . "<br>";
            session_start();
            $_SESSION['logstate'] = $UserName;
            echo "the user name is " . $_SESSION['logstate'] . "<br>";
            echo "the page will break in 2s" . "<br>";
            header("Refresh:1;url=./index.php");
        } else {
            echo "the password is error or the user is not reigster";
        }
    }
}

?> 