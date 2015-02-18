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
URL = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Role&a=add';
APP = 'http://127.0.0.1/houbeicms/HDCMS';
COMMON = 'http://127.0.0.1/houbeicms/HDCMS/Common';
HDPHP = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP';
HDPHP_DATA = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Data';
HDPHP_EXTEND = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Extend';
MODULE = 'http://127.0.0.1/houbeicms/index.php?m=Admin';
CONTROLLER = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Role';
ACTION = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Role&a=add';
STATIC = 'http://127.0.0.1/houbeicms/Static';
HDPHP_TPL = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Lib/Tpl';
VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View';
PUBLIC = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public';
CONTROLLER_VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/Role';
HISTORY = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Role&a=index';
</script>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public/common.css"/>
</head>
<body>
    <div class="hd-menu-list">
        <ul>
            <li><a href="<?php echo U('index');?>">角色列表</a></li>
            <li class="active"><a href="http://127.0.0.1/houbeicms/index.php?m=Admin&c=Role&a=add">添加角色</a></li>
        </ul>
    </div>
    <div class="hd-title-header">角色信息</div>
    <form onsubmit="return hd_submit(this,'<?php echo U(add);?>','<?php echo U(index);?>')">
        <input type="hidden" name="admin" value="1"/>
        <table class="hd-table hd-table-form hd-form">
            <tr>
                <th class="hd-w100">角色名称</th>
                <td>
                    <input type="text" name="rname" class="hd-w200"/>
                </td>
            </tr>
            <tr>
                <th class="hd-w100">角色描述</th>
                <td>
                    <textarea name="title" class="hd-w300 hd-h100"></textarea>
                </td>
            </tr>
        </table>
            <input type="submit" class="hd-btn" value="确定"/>
    </form>
</body>
</html>