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
URL = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Route&a=index';
APP = 'http://127.0.0.1/houbeicms/HDCMS';
COMMON = 'http://127.0.0.1/houbeicms/HDCMS/Common';
HDPHP = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP';
HDPHP_DATA = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Data';
HDPHP_EXTEND = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Extend';
MODULE = 'http://127.0.0.1/houbeicms/index.php?m=Admin';
CONTROLLER = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Route';
ACTION = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Route&a=index';
STATIC = 'http://127.0.0.1/houbeicms/Static';
HDPHP_TPL = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Lib/Tpl';
VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View';
PUBLIC = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public';
CONTROLLER_VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/Route';
HISTORY = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Index&a=index';
</script>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public/common.css"/>
</head>
<body>
<div class="hd-menu-list">
    <ul>
        <li class="active"><a href="http://127.0.0.1/houbeicms/index.php?m=Admin&c=Route&a=index">路由器设置</a></li>
    </ul>
</div>
<form onsubmit="return hd_submit(this,'<?php echo U(index);?>','<?php echo U(index);?>')">
    <table class="hd-table hd-table-form hd-form">
        <thead>
        <tr style="background: #E6E6E6;">
            <td class="hd-w250">描述</td>
            <td class="hd-w300">路由规则</td>
            <td>正常URL</td>
        </tr>
        </thead>
        <tbody id="route">
                <?php
        //初始化
        $hd['list']['r'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($route)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($route as $r) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=100)break;
                //第几个值
                $hd['list'][r]['index']++;
                //第1个值
                $hd['list'][r]['first']=($listId == 0);
                //最后一个值
                $hd['list'][r]['last']= (count($route)-1 <= $listId);
                //总数
                $hd['list'][r]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
            <tr>
                <td><input type="text" name="title[]" class="hd-w250" value="<?php echo $r['title'];?>"/></td>
                <td><input type="text" name="route[]" class="hd-w300" value="<?php echo $r['route'];?>"/></td>
                <td>
                    <input type="text" name="url[]" class="hd-w400" value="<?php echo $r['url'];?>"/>
                    <a href="javascript:;" class="hd-btn hd-btn-xm" onclick="delRoute(this);">删除</a>
                    <a href="javascript:;" class="hd-btn hd-btn-xm" onclick="addRoute();">添加</a>
                </td>
            </tr>
        <?php }}?>
        </tbody>
    </table>
    <input type="submit" class="hd-btn hd-btn-sm" value="确定"/>
</form>
<script type="text/javascript">
    function addRoute() {
        var tr = $('#route tr').eq(0).clone().find('input').val('').end();
        $('#route').append(tr);
    }
    function delRoute(obj) {
        if (confirm('确定删除吗？')) {
            if ($('#route tr').length == 1) {
                alert('再删就没了..');
            } else {
                $(obj).parents('tr').eq(0).remove();
            }
        }
    }
</script>
</body>
</html>