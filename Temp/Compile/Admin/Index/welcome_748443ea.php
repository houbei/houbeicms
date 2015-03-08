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
URL = 'http://127.0.0.1/HoubeiCMS/index.php?m=Admin&c=Index&a=welcome';
APP = 'http://127.0.0.1/HoubeiCMS/HDCMS';
COMMON = 'http://127.0.0.1/HoubeiCMS/HDCMS/Common';
HDPHP = 'http://127.0.0.1/HoubeiCMS/HDCMS/HDPHP';
HDPHP_DATA = 'http://127.0.0.1/HoubeiCMS/HDCMS/HDPHP/Data';
HDPHP_EXTEND = 'http://127.0.0.1/HoubeiCMS/HDCMS/HDPHP/Extend';
MODULE = 'http://127.0.0.1/HoubeiCMS/index.php?m=Admin';
CONTROLLER = 'http://127.0.0.1/HoubeiCMS/index.php?m=Admin&c=Index';
ACTION = 'http://127.0.0.1/HoubeiCMS/index.php?m=Admin&c=Index&a=welcome';
STATIC = 'http://127.0.0.1/HoubeiCMS/Static';
HDPHP_TPL = 'http://127.0.0.1/HoubeiCMS/HDCMS/HDPHP/Lib/Tpl';
VIEW = 'http://127.0.0.1/HoubeiCMS/HDCMS/Admin/View';
PUBLIC = 'http://127.0.0.1/HoubeiCMS/HDCMS/Admin/View/Public';
CONTROLLER_VIEW = 'http://127.0.0.1/HoubeiCMS/HDCMS/Admin/View/Index';
HISTORY = 'http://127.0.0.1/HoubeiCMS/index.php?m=Admin&c=Content&a=index';
</script>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/HoubeiCMS/HDCMS/Admin/View/Public/common.css"/>
</head>
<body>
<div class="hd-title-header">
    温馨提示
</div>
<table class="hd-table hd-table-list">
    <tr>
        <td style="color:red;font-weight: bold;">
            HDCMS是国内唯一真正的百分百免费开源产品，可以用在任何网站（包括商业网站），您不用担心任何版权问题。
        </td>
    </tr>
</table>
<div class="hd-title-header">
    安全提示
</div>
<table class="hd-table hd-table-list">
    <tr>
        <td>建议将hdcms目录(及子目录)设置为750,文件设置为640</td>
    </tr>
</table>
<div style="height:10px;overflow: hidden">
    &nbsp;
</div>
<div class="hd-title-header">
    HDCMS动态
</div>
<table class="hd-table hd-table-list">
    <tr>
        <td>
            <a href="http://www.hdphp.com" target="_blank">
                >>查看所有动态
            </a></td>
    </tr>
</table>
<div class="hd-title-header">
    BUG反馈
</div>
<table class="hd-table hd-table-list">
    <tr>
        <td style="color:red">
            <a href="http://bbs.houdunwang.com/forum-105-1.html"
               target="_blank">
                提交反馈
            </a></td>
    </tr>
</table>
<div style="height:10px;overflow: hidden">
    &nbsp;
</div>
<div class="hd-title-header">
    系统信息
</div>
<table class="hd-table hd-table-list">
    <tr>
        <td class="w100">HDCMS版本</td>
        <td> <?php echo $hd['config']['HDCMS_NAME'];?></td>
    </tr>
    <tr>
        <td class="hd-w80">版本号</td>
        <td><font color="red"><?php echo $hd['config']['HDCMS_VERSION'];?></font></td>
    </tr>
    <tr>
        <td class="hd-w80">核心框架</td>
        <td>
            <a href="http://www.hdphp.com" target="_blank">
                HDPHP
            </a>
        </td>
    </tr>
    <tr>
        <td>PHP版本</td>
        <td><?php echo PHP_OS; ?></td>
    </tr>
    <tr>
        <td>运行环境</td>
        <td> <?php echo $hd['server']['SERVER_SOFTWARE'];?></td>
    </tr>
    <tr>
        <td>允许上传大小</td>
        <td><?php echo ini_get("upload_max_filesize"); ?></td>
    </tr>
    <tr>
        <td>剩余空间</td>
        <td><?php echo get_size(disk_free_space(".")); ?></td>
    </tr>
</table>
<div style="height:10px;overflow: hidden">
    &nbsp;
</div>
<div class="hd-title-header">
    程序团队
</div>
<table class="hd-table hd-table-list">
    <tr>
        <td class="hd-w80">版权所有</td>
        <td>
            <a href="http://www.houdunwang.com" target="_blank">
                后盾网
            </a> &
            <a href="http://www.hdphp.com" target="_blank">
                HDCMS
            </a>
        </td>
    </tr>
    <tr>
        <td>作者</td>
        <td> 后盾网向军</td>
    </tr>
    <tr>
        <td>鸣谢</td>
        <td>
            <a href="http://bbs.houdunwang.com" target="_blank">
                后盾网所有盾友
            </a>
        </td>
    </tr>
</table>
<style type="text/css">
    a {
        color: #666;
    }

    div.wrap {
        margin-bottom: 0px;
    }

    h2 {
        font-size: 12px;
        font-weight: normal;
        margin-bottom: 10px;
    }

    div#RecordSite, div#RecordSite a {
        padding: 40px 0px 0px;
        font-size: 18px;
        text-align: center;
    }

    div#RecordSite a {
        color: #03565E;
        font-weight: bold;
        padding-left: 10px;
    }
</style>
    <?php if($updateMessage){ ?>
    <script>
        var updateMessage = '<?php echo $updateMessage;?>';
        hd_modal({
            width: 500,//宽度
            height: 260,//高度
            title: '通知',//标题
            content: "<div id='RecordSite'>" + updateMessage + "</div>",//提示信息
            timeout: 0,//自动关闭时间 0：不自动关闭
            shade: true,//背景遮罩
            shadeOpacity: 0.2
        });
    </script>
<?php } ?>
</body>
</html>