<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<?php if (!defined('HDPHP_PATH')) exit(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HDCMS永久免费 - <?php echo $hd['config']['webname'];?> - by HDCMS</title>
    <script type="text/javascript" src="http://192.168.1.105/houbeicms/Static/hdjs/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" href="http://192.168.1.105/houbeicms/Static/hdjs/hdjs.css"/>
    <script type="text/javascript" src="http://192.168.1.105/houbeicms/Static/hdjs/hdjs.min.js"></script>
    <script type='text/javascript'>
HOST = 'http://192.168.1.105';
ROOT = 'http://192.168.1.105/houbeicms';
WEB = 'http://192.168.1.105/houbeicms/index.php';
URL = 'http://192.168.1.105/houbeicms/index.php?m=Admin&c=Cache&a=index';
APP = 'http://192.168.1.105/houbeicms/HDCMS';
COMMON = 'http://192.168.1.105/houbeicms/HDCMS/Common';
HDPHP = 'http://192.168.1.105/houbeicms/HDCMS/HDPHP';
HDPHP_DATA = 'http://192.168.1.105/houbeicms/HDCMS/HDPHP/Data';
HDPHP_EXTEND = 'http://192.168.1.105/houbeicms/HDCMS/HDPHP/Extend';
MODULE = 'http://192.168.1.105/houbeicms/index.php?m=Admin';
CONTROLLER = 'http://192.168.1.105/houbeicms/index.php?m=Admin&c=Cache';
ACTION = 'http://192.168.1.105/houbeicms/index.php?m=Admin&c=Cache&a=index';
STATIC = 'http://192.168.1.105/houbeicms/Static';
HDPHP_TPL = 'http://192.168.1.105/houbeicms/HDCMS/HDPHP/Lib/Tpl';
VIEW = 'http://192.168.1.105/houbeicms/HDCMS/Admin/View';
PUBLIC = 'http://192.168.1.105/houbeicms/HDCMS/Admin/View/Public';
CONTROLLER_VIEW = 'http://192.168.1.105/houbeicms/HDCMS/Admin/View/Cache';
HISTORY = 'http://192.168.1.105/houbeicms/index.php?m=Admin&c=Cache&a=updateCache';
</script>
    <link type="text/css" rel="stylesheet" href="http://192.168.1.105/houbeicms/HDCMS/Admin/View/Public/common.css"/>
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