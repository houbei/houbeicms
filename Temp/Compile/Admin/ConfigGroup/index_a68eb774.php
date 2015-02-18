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
URL = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=ConfigGroup&a=index';
APP = 'http://127.0.0.1/houbeicms/HDCMS';
COMMON = 'http://127.0.0.1/houbeicms/HDCMS/Common';
HDPHP = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP';
HDPHP_DATA = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Data';
HDPHP_EXTEND = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Extend';
MODULE = 'http://127.0.0.1/houbeicms/index.php?m=Admin';
CONTROLLER = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=ConfigGroup';
ACTION = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=ConfigGroup&a=index';
STATIC = 'http://127.0.0.1/houbeicms/Static';
HDPHP_TPL = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Lib/Tpl';
VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View';
PUBLIC = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public';
CONTROLLER_VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/ConfigGroup';
HISTORY = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Index&a=index';
</script>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public/common.css"/>
</head>
<body>
    <div class="hd-menu-list">
        <ul>
            <li class="active"><a href="<?php echo U('index');?>">配置组列表</a></li>
            <li><a href="<?php echo U('add');?>">添加配置组</a></li>
        </ul>
    </div>
    <table class="hd-table hd-table-list hd-form">
        <thead>
            <tr>
                <td class="hd-w50">ID</td>
                <td class="hd-w100">组名</td>
                <td>中文标题</td>
                <td>系统组</td>
                <td class="hd-w80"></td>
            </tr>
        </thead>
        <tbody>
                <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($data)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($data as $d) {
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
                $hd['list'][d]['index']++;
                //第1个值
                $hd['list'][d]['first']=($listId == 0);
                //最后一个值
                $hd['list'][d]['last']= (count($data)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
            <tr>
                <td><?php echo $d['cgid'];?></td>
                <td><?php echo $d['cgname'];?></td>
                <td><?php echo $d['cgtitle'];?></td>
                <td>
                        <?php if($d['system']){ ?>
                        <font color="red">√</font>
                        <?php }else{ ?>
                            <font color="blue">×</font>
                    <?php } ?>
                </td>
                <td>
                        <?php if($d['system']){ ?>
                        <span>修改</span> |
                        <span>删除</span>
                    <?php }else{ ?>
                        <a href="<?php echo U('edit',array('cgid'=>$d['cgid']));?>">修改</a> |
                        <a href="javascript:del(<?php echo $d['cgid'];?>)">删除</a>
                    <?php } ?>
                </td>
            </tr>
        <?php }}?>
        </tbody>
    </table>
    <script>
        //删除栏目
        function del(cgid) {
            hd_modal({
                width: 400,//宽度
                height: 200,//高度
                title: '提示',//标题
                content: '确定删除吗',//提示信息
                button: true,//显示按钮
                button_success: "确定",//确定按钮文字
                button_cancel: "关闭",//关闭按钮文字
                timeout: 0,//自动关闭时间 0：不自动关闭
                shade: true,//背景遮罩
                shadeOpacity: 0.1,//背景透明度
                success: function () {//点击确定后的事件
                    hd_ajax('<?php echo U("del");?>', {cgid: cgid}, 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=ConfigGroup&a=index');
                }
            });
        }
    </script>
</body>
</html>