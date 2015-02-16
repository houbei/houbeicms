<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<?php if (!defined('HDPHP_PATH')) exit(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HDCMS永久免费 - <?php echo $hd['config']['webname'];?> - by HDCMS</title>
    <script type="text/javascript" src="http://127.0.0.1/Static/hdjs/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" href="http://127.0.0.1/Static/hdjs/hdjs.css"/>
    <script type="text/javascript" src="http://127.0.0.1/Static/hdjs/hdjs.min.js"></script>
    <script type='text/javascript'>
HOST = 'http://127.0.0.1';
ROOT = 'http://127.0.0.1';
WEB = 'http://127.0.0.1/index.php';
URL = 'http://127.0.0.1/index.php?m=Admin&c=Content&a=add&mid=1&cid=52';
APP = 'http://127.0.0.1/HDCMS';
COMMON = 'http://127.0.0.1/HDCMS/Common';
HDPHP = 'http://127.0.0.1/HDCMS/HDPHP';
HDPHP_DATA = 'http://127.0.0.1/HDCMS/HDPHP/Data';
HDPHP_EXTEND = 'http://127.0.0.1/HDCMS/HDPHP/Extend';
MODULE = 'http://127.0.0.1/index.php?m=Admin';
CONTROLLER = 'http://127.0.0.1/index.php?m=Admin&c=Content';
ACTION = 'http://127.0.0.1/index.php?m=Admin&c=Content&a=add';
STATIC = 'http://127.0.0.1/Static';
HDPHP_TPL = 'http://127.0.0.1/HDCMS/HDPHP/Lib/Tpl';
VIEW = 'http://127.0.0.1/HDCMS/Admin/View';
PUBLIC = 'http://127.0.0.1/HDCMS/Admin/View/Public';
CONTROLLER_VIEW = 'http://127.0.0.1/HDCMS/Admin/View/Content';
HISTORY = 'http://127.0.0.1/index.php?m=Admin&c=Content&a=show&cid=52&mid=1';
</script>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/HDCMS/Admin/View/Public/common.css"/>
</head>
<body>
<script type="text/javascript" src="http://127.0.0.1/Static/cal/lhgcalendar.min.js"></script>
<script type="text/javascript" src="http://127.0.0.1/HDCMS/Admin/View/Content/js/js.js"></script>
<link type="text/css" rel="stylesheet" href="http://127.0.0.1/HDCMS/Admin/View/Content/css/css.css"/>
<script type="text/javascript" charset="utf-8" src="http://127.0.0.1/Static/ueditor1_4_3/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="http://127.0.0.1/Static/ueditor1_4_3/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="http://127.0.0.1/Static/ueditor1_4_3/lang/zh-cn/zh-cn.js"></script>
<script src="http://127.0.0.1/Static/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Static/uploadify/uploadify.css">
<form method="post" class="hd-form">
    <input type="hidden" name="mid" value="<?php echo $hd['get']['mid'];?>"/>
        <!--右侧缩略图区域-->
        <div class="content_right">
            <table class="hd-table hd-table-form">
                <?php foreach ($form['nobase'] as $field): ?>
                    <tr>
                        <th><?php echo $field['title'];?></th>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $field['form'];?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="content_left">
            <div class="hd-title-header">添加文章</div>
            <table class="hd-table hd-table-form">
                <?php foreach ($form['base'] as $field): ?>
                    <tr>
                        <th class="hd-w80"><?php echo $field['title'];?></th>
                            <td>
                                <?php echo $field['form'];?>
                            </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <input type="submit" class="hd-btn hd-btn-primary" value="确定"/>
        <input type="button" class="hd-btn" onclick="window.close()" value="关闭"/>
</form>
</body>
</html>