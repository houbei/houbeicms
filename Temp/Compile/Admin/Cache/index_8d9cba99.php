<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<?php if (!defined('HDPHP_PATH')) exit(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HDCMS永久免费 - <?php echo $hd['config']['webname'];?> - by HDCMS</title>
    <script type="text/javascript" src="http://127.0.0.1/HoubeiCMS/Static/hdjs/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" href="http://127.0.0.1/HoubeiCMS/Static/hdjs/hdjs.css"/>
    <script type="text/javascript" src="http://127.0.0.1/HoubeiCMS/Static/hdjs/hdjs.min.js"></script>
    <script type='text/javascript'>
HOST = 'http://127.0.0.1';
ROOT = 'http://127.0.0.1/HoubeiCMS';
WEB = 'http://127.0.0.1/HoubeiCMS/index.php';
URL = 'http://127.0.0.1/HoubeiCMS/index.php?m=Admin&c=Cache&a=index';
APP = 'http://127.0.0.1/HoubeiCMS/HDCMS';
COMMON = 'http://127.0.0.1/HoubeiCMS/HDCMS/Common';
HDPHP = 'http://127.0.0.1/HoubeiCMS/HDCMS/HDPHP';
HDPHP_DATA = 'http://127.0.0.1/HoubeiCMS/HDCMS/HDPHP/Data';
HDPHP_EXTEND = 'http://127.0.0.1/HoubeiCMS/HDCMS/HDPHP/Extend';
MODULE = 'http://127.0.0.1/HoubeiCMS/index.php?m=Admin';
CONTROLLER = 'http://127.0.0.1/HoubeiCMS/index.php?m=Admin&c=Cache';
ACTION = 'http://127.0.0.1/HoubeiCMS/index.php?m=Admin&c=Cache&a=index';
STATIC = 'http://127.0.0.1/HoubeiCMS/Static';
HDPHP_TPL = 'http://127.0.0.1/HoubeiCMS/HDCMS/HDPHP/Lib/Tpl';
VIEW = 'http://127.0.0.1/HoubeiCMS/HDCMS/Admin/View';
PUBLIC = 'http://127.0.0.1/HoubeiCMS/HDCMS/Admin/View/Public';
CONTROLLER_VIEW = 'http://127.0.0.1/HoubeiCMS/HDCMS/Admin/View/Cache';
HISTORY = 'http://127.0.0.1/HoubeiCMS/index.php?m=Admin&c=Cache&a=updateCache';
</script>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/HoubeiCMS/HDCMS/Admin/View/Public/common.css"/>
</head>
<body>
<form method="post" action="<?php echo U('index');?>" class="hd-form">
    <div class="hd-title-header">
        温馨提示
    </div>
    <div class="help">
        首次安装必须更新全站缓存
    </div>
    <div class="hd-title-header">
        更新缓存
    </div>
    <table class="hd-table hd-table-form hd-form">
        <tr>
            <th class="hd-w100">选择更新</th>
            <td>
                <table class="hd-table hd-table-list">
                    <tr>
                        <td><label>
                                <input type="checkbox" name="Action[]" value="Config" checked=''/>
                                更新网站配置 </label></td>
                    </tr>
                    <tr>
                        <td><label>
                                <input type="checkbox" name="Action[]" value="Model" checked=''/>
                                内容模型 </label></td>
                    </tr>
                    <tr>
                        <td><label>
                                <input type="checkbox" name="Action[]" value="Field" checked=''/>
                                模型字段 </label></td>
                    </tr>
                    <tr>
                        <td><label>
                                <input type="checkbox" name="Action[]" value="Category" checked=''/>
                                栏目缓存 </label></td>
                    </tr>
                    <tr>
                        <td><label>
                                <input type="checkbox" name="Action[]" value="Node" checked=''/>
                                权限节点 </label></td>
                    </tr>
                    <tr>
                        <td><label>
                                <input type="checkbox" name="Action[]" value="Role" checked=''/>
                                会员角色 </label></td>
                    </tr>
                    <tr>
                        <td><label>
                                <input type="checkbox" name="Action[]" value="Flag" checked=''/>
                                内容FLAG </label></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <input type="submit" value="开始更新" class="hd-btn"/>
</form>
</body>
</html>