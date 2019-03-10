<!DOCTYPE HTML>
<html lang="zh-CN">

<head>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <title>LogIn</title>
    </head>
    <link rel="stylesheet" href="//cdnjs.loli.net/ajax/libs/mdui/0.4.2/css/mdui.min.css">
    <script src="//cdnjs.loli.net/ajax/libs/mdui/0.4.2/js/mdui.min.js"></script>
</head>

<style>

</style>

<body class="mdui-theme-primary-purple mdui-theme-accent-purple mdui-container">


    <div class="mdui-container">
        <div class="mdui-row mdui-shadow-23 mdui-center" style = "margin-top: 100px; max-width: 800px; ">
            <div class="mdui-col-sm-6 mdui-col-md-6 mdui-col-offset-sm-3 mdui-col-offset-md-3">
                <h2 style = "margin-left: -50px; float: top;" class = "mdui-text-center mdui-text-color-theme-accent">用户登陆</h2>
                <form action="BaseDeal.php" method="post">
                    <div class="mdui-textfield mdui-textfield-floating-label">
                        <label class="mdui-textfield-label">用户名</label>
                        <input class="mdui-textfield-input" type="text" name="LoginName">
                    </div>
                    <div class="mdui-textfield mdui-textfield-floating-label">
                        <label class="mdui-textfield-label">密码</label>
                        <input class="mdui-textfield-input" type="password" name="LoginPassword">
                    </div>
                    <div class="mdui-textfield mdui-textfield-floating-label">
                        <button class="mdui-btn mdui-btn-block mdui-color-theme-accent mdui-ripple" type = "submit" name = "Login">登录</button>
                    </div>
                </form>
                <p class="mdui-clearfix mdui-m-t-1"> <!--clearfix 清除浮动-->
                    <a class="mdui-float-left" href="#" onclick="alert('暂时还不能找回哦');">忘记密码？</a>
                    <a class="mdui-float-right" href="./register.php">注册账号</a>
                </p>

            </div>
        </div>
    </div>
</body>

</html> 