<!DOCTYPE HTML>
<html lang="zh-CN">
<?php session_start(); ?>

<head>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <title>attack社区</title>
    </head>
    <link rel="stylesheet" href="//cdnjs.loli.net/ajax/libs/mdui/0.4.2/css/mdui.min.css">
    <script src="//cdnjs.loli.net/ajax/libs/mdui/0.4.2/js/mdui.min.js"></script>
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="./main.js"></script>
</head>

<?php
if (isset($_SESSION['logstate'])) {
    $user = $_SESSION['logstate'];
    if (isset($user)) {
        echo "<script> flag = 1; </script>"; //逻辑是这样的：首先把flag赋值为1表示用户已经登陆，然后根据_SESSION里面的信息加载页面元素
    }
}
?>

<body class="mdui-theme-primary-indigo mdui-theme-accent-indigo">
    <div class="mdui-container">
        <div class="mdui-dialog" id="dialog">
            <div class="mdui-dialog-title">添加计划</div>
            <div class="mdui-dialog-content">
                <input style="max-width: 500px;" id="time" type="text" class="mdui-textfield-input" placeholder="时间">
                <input style="max-width: 500px;" id="plan" type="text" class="mdui-textfield-input" placeholder="任务计划">
                <input style="max-width: 500px;" id="remarks" type="text" class="mdui-textfield-input" placeholder="备注">
            </div>

            <div class="mdui-dialog-actions">
                <button class="mdui-btn mdui-ripple" mdui-dialog-cancel>取消</button>
                <button id="ConfrimPlan" class="mdui-btn mdui-ripple" mdui-dialog-confirm>确定</button>
            </div>
        </div>
    </div>

    <div class="mdui-appbar">
        <div class="mdui-toolbar mdui-color-indigo">
            <a href="javascript:;" class="mdui-btn mdui-btn-icon" mdui-drawer="{target: '#LeftDrawer'}"><i class="mdui-icon material-icons">menu</i></a>
            <a href="javascript:;" class="mdui-typo-title">Title</a>
            <div class="mdui-toolbar-spacer"></div>
            <a href="javascript:;" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">search</i></a>
            <a href="javascript:;" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">refresh</i></a>
            <!-- <a href="javascript:;" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">more_vert</i></a> -->
            <a href="javascript:;" class="mdui-btn mdui-btn-icon" mdui-menu="{target: '#example-1'}"><i class="mdui-icon material-icons">more_vert</i></a>
            <ul class="mdui-menu" id="example-1">
                <li class="mdui-menu-item" onclick="Update();">
                    <a href="javascript:;" class="mdui-ripple">刷新</a>
                </li>
                <li class="mdui-divider"></li>
                <li class="mdui-menu-item" onclick="SignOut()">
                    <a href="javascript:;" class="mdui-ripple">登出</a>
                </li>
            </ul>
        </div>

        <div class="mdui-tab mdui-color-indigo" mdui-tab>
            <a href="#tab1" class="mdui-ripple mdui-ripple-white">web</a>
            <a href="#tab2" class="mdui-ripple mdui-ripple-white">shopping</a>
            <a href="#tab3" class="mdui-ripple mdui-ripple-white">videos</a>
        </div>
    </div>
    <button style="margin-top: 20px; " onclick="Update()" class="mdui-hidden mdui-btn mdui-ripple mdui-color-theme-accent mdui-center">更改完表格后务必点击此按钮进行保存!</button>
    <div class="mdui-drawer mdui-drawer-close" id="LeftDrawer">
        <ul class="mdui-list">
            <li class="mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons">move_to_inbox</i>
                <div class="mdui-list-item-content">Inbox</div>
            </li>
            <li class="mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons">star</i>
                <div class="mdui-list-item-content">Starred</div>
            </li>
            <li class="mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons">send</i>
                <div class="mdui-list-item-content">Sent mail</div>
            </li>
            <li class="mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons">drafts</i>
                <div class="mdui-list-item-content">Drafts</div>
            </li>
            <li class="mdui-subheader">Subheader</li>
            <li class="mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons">email</i>
                <div class="mdui-list-item-content">All mail</div>
            </li>
            <li class="mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons">delete</i>
                <div class="mdui-list-item-content">Trash</div>
            </li>
            <li class="mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons">error</i>
                <div class="mdui-list-item-content">Spam</div>
            </li>
        </ul>
    </div>

    <div id="NotLogin">
        <div style="margin-top: 100px; max-width: 800px; height: 300px; " class="mdui-container mdui-center mdui-shadow-23 mdui-clearfix">
            <h1 style="padding-top: 50px; " class="mdui-center mdui-text-center mdui-text-color-theme">欢迎来到attack云计划社区</h1>
            <div class="mdui-center mdui-text-center">
                <h2>请登录后使用</h2>
                <a href="./login.php" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-cyan mdui-text-color-white">登录</a>
                <a href="./register.php" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-green mdui-text-color-white">注册</a>
            </div>
        </div>
    </div>

</body>

</html> 