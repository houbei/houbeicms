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
URL = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=MyPassword&a=edit';
APP = 'http://127.0.0.1/houbeicms/HDCMS';
COMMON = 'http://127.0.0.1/houbeicms/HDCMS/Common';
HDPHP = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP';
HDPHP_DATA = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Data';
HDPHP_EXTEND = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Extend';
MODULE = 'http://127.0.0.1/houbeicms/index.php?m=Admin';
CONTROLLER = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=MyPassword';
ACTION = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=MyPassword&a=edit';
STATIC = 'http://127.0.0.1/houbeicms/Static';
HDPHP_TPL = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Lib/Tpl';
VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View';
PUBLIC = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public';
CONTROLLER_VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/MyPassword';
HISTORY = 'http://127.0.0.1/houbeicms/index.php?m=admin';
</script>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public/common.css"/>
</head>
<body>
<div class="hd-title-header">修改密码</div>
<form onsubmit="return hd_submit(this,'http://127.0.0.1/houbeicms/index.php?m=Admin&c=MyPassword&a=edit','http://127.0.0.1/houbeicms/index.php?m=Admin&c=MyPassword&a=edit')" class="hd-form">
    <table class="hd-table hd-table-form hd-form">
        <tr>
            <th class="hd-w100">管理员名称</th>
            <td>
                <?php echo $user['username'];?>
            </td>
        </tr>
        <tr>
            <th class="hd-w100">旧密码 <span class="star">*</span></th>
            <td>
                <input type="password" name="old_password" class="hd-w200" required=""/>
            </td>
        </tr>
        <tr>
            <th class="hd-w100">新密码 <span class="star">*</span></th>
            <td>
                <input type="password" name="password" class="hd-w200" required=""/>
            </td>
        </tr>
        <tr>
            <th class="hd-w100">确认密码 <span class="star">*</span></th>
            <td>
                <input type="password" name="passwordc" class="hd-w200" required=""/>
            </td>
        </tr>
    </table>
    <input type="submit" class="hd-btn" value="确定"/>
</form>
</body>
</html>