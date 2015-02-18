<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<?php if (!defined('HDPHP_PATH')) exit(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HDCMS永久免费 - <?php echo $hd['config']['webname'];?> - by HDCMS</title>
    <script type="text/javascript" src="http://127.0.0.1/houbeicms/Static/hdjs/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" href="http://127.0.0.1/houbeicms/Static/hdjs/hdjs.css"/>
    <script type="text/javascript" src="http://127.0.0.1/houbeicms/Static/hdjs/hdjs.min.js"></script>
    <script type='text/javascript'>
HOST = 'http://127.0.0.1';
ROOT = 'http://127.0.0.1/houbeicms';
WEB = 'http://127.0.0.1/houbeicms/index.php';
URL = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Email&a=email';
APP = 'http://127.0.0.1/houbeicms/HDCMS';
COMMON = 'http://127.0.0.1/houbeicms/HDCMS/Common';
HDPHP = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP';
HDPHP_DATA = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Data';
HDPHP_EXTEND = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Extend';
MODULE = 'http://127.0.0.1/houbeicms/index.php?m=Admin';
CONTROLLER = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Email';
ACTION = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Email&a=email';
STATIC = 'http://127.0.0.1/houbeicms/Static';
HDPHP_TPL = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Lib/Tpl';
VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View';
PUBLIC = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public';
CONTROLLER_VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/Email';
HISTORY = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Index&a=index';
</script>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public/common.css"/>
</head>
<body>
<div class="hd-title-header">温馨提示</div>
<div class="help">
    <ul>
        <li>设置邮箱后，请检测发送是否成功</li>
    </ul>
</div>
<form class="hd-form" onsubmit="return hd_submit(this,'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Email&a=email','http://127.0.0.1/houbeicms/index.php?m=Admin&c=Email&a=email')">
    <table class="hd-table hd-table-form">
        <thead>
        <tr>
            <td class="hd-w200">标题</td>
            <td>配置
            </th>
            <td class="hd-w300">变量</td>
            <td class="hd-w300">描述</td>
        </tr>
        </thead>
        <?php foreach ($config as $key=>$val){?>
            <tr>
                <td><?php echo $val['title'];?></td>
                <td>
                    <input type="<?php echo $val['show_type'];?>" name="<?php echo $val['name'];?>" value="<?php echo $val['value'];?>" class="hd-w250"/>
                </td>
                <td><?php echo $val['name'];?></td>
                <td><?php echo $val['message'];?></td>
            </tr>
        <?php }?>
    </table>
    <input type="submit" class="hd-btn" value="确定"/>
    <button class="hd-btn hd-btn-danger hd-btn-sm" type="button" onclick="checkEmail();">发邮件测试</button>
</form>
<script type="text/javascript" charset="utf-8">
    //发邮件测试
    function checkEmail() {
        $.post("<?php echo U('checkEmail');?>", $('form').serialize(), function (json) {
            hd_alert({
                message: json.message,//显示内容
                timeout: 3
            })
        }, 'json');
    }
</script>
</body>
</html>