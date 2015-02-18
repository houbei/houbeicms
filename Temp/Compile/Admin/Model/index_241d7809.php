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
URL = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Model&a=index';
APP = 'http://127.0.0.1/houbeicms/HDCMS';
COMMON = 'http://127.0.0.1/houbeicms/HDCMS/Common';
HDPHP = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP';
HDPHP_DATA = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Data';
HDPHP_EXTEND = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Extend';
MODULE = 'http://127.0.0.1/houbeicms/index.php?m=Admin';
CONTROLLER = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Model';
ACTION = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Model&a=index';
STATIC = 'http://127.0.0.1/houbeicms/Static';
HDPHP_TPL = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Lib/Tpl';
VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View';
PUBLIC = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public';
CONTROLLER_VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/Model';
HISTORY = 'http://127.0.0.1/houbeicms/index.php?m=admin';
</script>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public/common.css"/>
</head>
<body>
<div class="hd-menu-list">
    <ul>
        <li class="active">
            <a href="<?php echo U('index');?>">
                模型列表
            </a>
        </li>
        <li>
            <a href="<?php echo U('add');?>">
                添加模型
            </a>
        </li>
        <li>
            <a href="javascript:;" onclick="hd_ajax('<?php echo U(updateCache);?>')">
                更新缓存
            </a>
        </li>
    </ul>
</div>
<div class="content">
    <table class="hd-table hd-table-list">
        <thead>
        <tr>
            <td class="hd-w30">mid</td>
            <td>模型名称</td>
            <td class="hd-w100">主表</td>
            <td class="hd-w100">系统模型</td>
            <td class="hd-w100">前台投稿</td>
            <td class="hd-w30">状态</td>
            <td class="hd-w150">操作</td>
        </tr>
        </thead>
        <tbody>
                <?php
        //初始化
        $hd['list']['m'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($model)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($model as $m) {
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
                $hd['list'][m]['index']++;
                //第1个值
                $hd['list'][m]['first']=($listId == 0);
                //最后一个值
                $hd['list'][m]['last']= (count($model)-1 <= $listId);
                //总数
                $hd['list'][m]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
            <tr>
                <td><?php echo $m['mid'];?></td>
                <td><?php echo $m['model_name'];?></td>
                <td><?php echo $m['table_name'];?></td>
                <td>
                        <?php if($m['is_system']==1){ ?>
                        <font color="red">√</font>
                        <?php }else{ ?>
                        <font color="blue">×</font>
                    <?php } ?>
                </td>

                <td class="w30">
                        <?php if($m['contribute']==1){ ?>
                        <font color="red">√</font>
                        <?php }else{ ?>
                        <font color="blue">×</font>
                    <?php } ?>
                </td>
                <td>
                        <?php if($m['enable']){ ?>
                        <font color="red">√</font>
                        <?php }else{ ?>
                        <font color="blue">×</font>
                    <?php } ?>
                </td>
                <td>
                    <a href="<?php echo U('Field/index',array('mid'=>$m['mid']));?>">
                        字段管理
                    </a> |
                    <a href="<?php echo U('edit',array('mid'=>$m['mid']));?>">
                        修改
                    </a>
                    |
                        <?php if($m['is_system']==1){ ?>
                        删除
                        <?php }else{ ?>
                        <a href="javascript:delModel(<?php echo $m['mid'];?>)">删除</a>
                    <?php } ?>
                </td>
            </tr>
        <?php }}?>
        </tbody>
    </table>
</div>
<script>
    function delModel(mid) {
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
                hd_ajax('<?php echo U("del");?>', {mid: mid}, 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Model&a=index');
            },
            cancel: function () {//点击关闭后的事件

            }
        });
    }
</script>
</body>
</html>