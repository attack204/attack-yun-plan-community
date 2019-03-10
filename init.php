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
</head>



<body class="mdui-theme-primary-purple mdui-theme-accent-purple mdui-container">
    <div class="mdui-center mdui-container">
        <div >
            <div class="mdui-row">
                <p class="mdui-text mdui-text-center mdui-text-color-theme-accent">本页面用于初始化数据库，请务必正确填写下列内容</p>
                <form action="./BaseDeal.php" method="post">
                    <div class="mdui-col-sm-6 mdui-col-md-6 mdui-col-offset-sm-3 mdui-col-offset-md-3 mdui-textfield mdui-textfield-floating-label">
                        <label class="mdui-textfield-label">数据库地址</label>
                        <input class="mdui-textfield-input" type="text" name="DatabaseAddress">
                        <div class="mdui-textfield-helper">一般为localhost/127.0.0.1</div>
                    </div>
                    <div class="mdui-col-sm-6 mdui-col-md-6 mdui-col-offset-sm-3 mdui-col-offset-md-3 mdui-textfield mdui-textfield-floating-label">
                        <label class="mdui-textfield-label">数据库名称</label>
                        <input class="mdui-textfield-input" type="text" name="DatabaseName">
                        <div class="mdui-textfield-helper">本程序不会自动创建数据库，请提前手动创建</div>
                    </div>
                    <div class="mdui-col-sm-6 mdui-col-md-6 mdui-col-offset-sm-3 mdui-col-offset-md-3 mdui-textfield mdui-textfield-floating-label">
                        <label class="mdui-textfield-label">数据库用户名</label>
                        <input class="mdui-textfield-input" type="text" name="DatabaseUserName">
                    </div>
                    <div class="mdui-col-sm-6 mdui-col-md-6 mdui-col-offset-sm-3 mdui-col-offset-md-3 mdui-textfield mdui-textfield-floating-label">
                        <label class="mdui-textfield-label">数据库密码</label>
                        <input class="mdui-textfield-input" type="text" name="DatabaseUserPassword">
                    </div>
                    <div class="mdui-col-sm-6 mdui-col-md-6 mdui-col-offset-sm-3 mdui-col-offset-md-3 mdui-textfield mdui-textfield-floating-label">
                        <label class="mdui-textfield-label">数据库表名称</label>
                        <input class="mdui-textfield-input" type="text" name="DatabaseTableName" value="DailyLife">
                        <div class="mdui-textfield-helper">若无特殊需求默认即可</div>
                    </div>
                    <div class="mdui-col-sm-6 mdui-col-md-6 mdui-col-offset-sm-3 mdui-col-offset-md-3 mdui-textfield mdui-textfield-floating-label">
                        <input class = "mdui-center mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" type = "submit" name = "InitBase">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html> 