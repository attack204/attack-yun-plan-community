<!DOCTYPE HTML>
<html lang="zh-CN">

<head>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <title>Init</title>
    </head>
    <link rel="stylesheet" href="//cdnjs.loli.net/ajax/libs/mdui/0.4.2/css/mdui.min.css">
    <script src="//cdnjs.loli.net/ajax/libs/mdui/0.4.2/js/mdui.min.js"></script>
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script>
        function check() {
            var name = $("#UserName").val(),
                email = $("#UserEmail"),
                password = $("#Password").val(),
                repassword = $("#RePassword").val();
            if (name == "") {
                mdui.alert("用户名不能为空哦");
                return false;
            }
            if (email == "") {
                mdui.alert("邮箱不能为空哦");
                return false;
            }
            if (password == "") {
                mdui.alert("密码不能为空哦");
                return false;
            }
            if (password != repassword) {
                mdui.alert("两次输入的密码不一样呢");
                return false;
            }
            return true;
        }
    </script>

</head>



<body class="mdui-theme-primary-purple mdui-theme-accent-purple mdui-container">
    <div class="mdui-center mdui-container">
        <div class="mdui-center mdui-row mdui-shadow-23" style = "margin-top: 100px; max-width: 800px; ">
            <h2 style="margin-left: -50px; float: top;" class="mdui-text-center mdui-text-color-theme-accent">用户注册</h2>
            <p class="mdui-text mdui-text-center mdui-text-color-theme-accent">本页面有IP记录，想搞事情的后果自负</p>
            <form action="./BaseDeal.php" method="post" onsubmit="return check()">
                <div class="mdui-col-sm-6 mdui-col-md-6 mdui-col-offset-sm-3 mdui-col-offset-md-3 mdui-textfield mdui-textfield-floating-label">
                    <label class="mdui-textfield-label">用户名</label>
                    <input id="UserName" class="mdui-textfield-input" type="text" name="RegisterName">
                </div>
                <div class="mdui-col-sm-6 mdui-col-md-6 mdui-col-offset-sm-3 mdui-col-offset-md-3 mdui-textfield mdui-textfield-floating-label">
                    <label class="mdui-textfield-label">邮箱</label>
                    <input id="UserEmail" class="mdui-textfield-input" type="email" name="RegisterEmail">
                </div>
                <div class="mdui-col-sm-6 mdui-col-md-6 mdui-col-offset-sm-3 mdui-col-offset-md-3 mdui-textfield mdui-textfield-floating-label">
                    <label class="mdui-textfield-label">密码</label>
                    <input id="Password" class="mdui-textfield-input" type="password" name="RegisterPassword">
                </div>
                <div class="mdui-col-sm-6 mdui-col-md-6 mdui-col-offset-sm-3 mdui-col-offset-md-3 mdui-textfield mdui-textfield-floating-label">
                    <label class="mdui-textfield-label">确认密码</label>
                    <input id="RePassword" class="mdui-textfield-input" type="password" name="RegisterRePassword">
                </div>
                <div class="mdui-col-sm-6 mdui-col-md-6 mdui-col-offset-sm-3 mdui-col-offset-md-3 mdui-textfield mdui-textfield-floating-label">
                    <input class="mdui-center mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" type="submit" name="Register" value="注册">
                </div>
            </form>
        </div>
    </div>
</body>

</html> 