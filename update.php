<?php
    session_start(); 
    header("Content-type:text/html;charset=utf-8");
    //echo "123";
    if(isset($_POST['name'])) {//更改用户使用记录
        $q = $_POST['name'];
        if(isset($_SESSION['logstate'])) {
            $user = $_SESSION['logstate'];
            $_SESSION[$user] = (string)$q;
            echo $_SESSION[$user];
        }
        else echo "gg";       
    } else if(isset($_POST['query'])) {//查询用户使用记录
        if(isset($_SESSION['logstate'])) {
            $user = $_SESSION['logstate'];
            $text = "<div id='Main'><div style='margin-top: 10%; width: 60%;' class='mdui-container'><div mdui-table-fluid'><table id='MyTable' class='mdui-table mdui-table-hoverable mdui-table-selectable'><thead><tr><th>#</th><th>时间</th><th>任务</th><th>备注</th><th>操作</th></tr></thead><tbody><tr><td>1</td><td>2</td><td>3</td><td>4</td><td><button class='Delet mdui-btn mdui-btn-icon'><i class='mdui-icon material-icons'>delete</i></button><button class=' Add mdui-btn mdui-btn-icon'><i class='mdui-icon material-icons'>add</i></button></td></tr></tbody></tbody></div></div></div>";
            if(!isset($_SESSION[$user]) || $_SESSION[$user] == "undefined") 
                $_SESSION[$user] = $text;
            echo $_SESSION[$user];
        }
        else echo "failed";
    }

?>