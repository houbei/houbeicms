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
URL = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=MyInfo&a=edit';
APP = 'http://127.0.0.1/houbeicms/HDCMS';
COMMON = 'http://127.0.0.1/houbeicms/HDCMS/Common';
HDPHP = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP';
HDPHP_DATA = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Data';
HDPHP_EXTEND = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Extend';
MODULE = 'http://127.0.0.1/houbeicms/index.php?m=Admin';
CONTROLLER = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=MyInfo';
ACTION = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=MyInfo&a=edit';
STATIC = 'http://127.0.0.1/houbeicms/Static';
HDPHP_TPL = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Lib/Tpl';
VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View';
PUBLIC = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public';
CONTROLLER_VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/MyInfo';
HISTORY = 'http://127.0.0.1/houbeicms/index.php?m=Admin';
</script>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public/common.css"/>
</head>
<body>
<div class="hd-title-header">个人资料修改</div>
<form onsubmit="return hd_submit(this,'http://127.0.0.1/houbeicms/index.php?m=Admin&c=MyInfo&a=edit','http://127.0.0.1/houbeicms/index.php?m=Admin&c=MyInfo&a=edit')">
    <table class="hd-table hd-table-form hd-form">
        <tr>
            <th class="hd-w100">管理员名称</th>
            <td>
                <?php echo $user['username'];?>
            </td>
        </tr>
        <tr>
            <th class="hd-w100">最后登录时间</th>
            <td>
                <?php echo date("Y-m-d",$user['logintime']);?>
            </td>
        </tr>
        <tr>
            <th class="hd-w100">最后登录IP</th>
            <td>
                <?php echo $user['lastip'];?>
            </td>
        </tr>
        <tr>
            <th class="hd-w100">昵称</th>
            <td>
                <input type="text" name="nickname" class="hd-w200" value="<?php echo $user['nickname'];?>"/>
            </td>
        </tr>
        <tr>
            <th class="w100">邮箱</th>
            <td>
                <input type="text" name="email" class="hd-w200" value="<?php echo $user['email'];?>"/>
            </td>
        </tr>
    </table>
    <input type="submit" class="hd-btn" value="确定"/>
</form>
</div>
</body>
</html>