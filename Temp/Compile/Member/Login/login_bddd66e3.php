<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache"/>
    <title>登录</title>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Member/View/Login/css/login.css"/>
</head>
<body>

<div class="left">
    <div class="icon">
        <img src="http://127.0.0.1/houbeicms/HDCMS/Member/View/Login/image/qr.png" alt="HDCMS"/>

        <p>微信：后盾网<br/>QQ群：1728288289</p>
    </div>
</div>
<div class="right">
    <div class="logo">
        <a href="http://www.hdphp.com">
            <img src="http://127.0.0.1/houbeicms/HDCMS/Member/View/Login/image/logo_reg.png" alt="HDCMS"/>
        </a>

        <p class="">
            简单而强大的内容管理系统<br/>
            开源、安全值得信赖！
        </p>
    </div>
    <div class="form">
        <div class="reg">
            没有账号？ <a href="<?php echo U('reg');?>">立即注册</a>
        </div>
        <form action="http://127.0.0.1/houbeicms/index.php?m=Member&c=Login&a=login" method="post">
            <div class="input">
                <input type="text" name="username" placeholder="帐号" required=""/>
            </div>
            <div class="input">
                <input type="password" name="password" placeholder="密码" required=""/>
            </div>
            <div class="input">
                <input type="submit" value="登录"/>
            </div>
            <div class="getpassword">
                <label><input type="checkbox" name="recond"/> 记住我</label> | <a href="<?php echo U('findPassword/find');?>">忘记密码了</a>
            </div>
        </form>
    </div>
    <div class="copyright">
        Copyright © 2013 - 2014 HDCMS All Right Reserved.
    </div>
</div>
</body>
</html>