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
URL = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Node&a=index';
APP = 'http://127.0.0.1/houbeicms/HDCMS';
COMMON = 'http://127.0.0.1/houbeicms/HDCMS/Common';
HDPHP = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP';
HDPHP_DATA = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Data';
HDPHP_EXTEND = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Extend';
MODULE = 'http://127.0.0.1/houbeicms/index.php?m=Admin';
CONTROLLER = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Node';
ACTION = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Node&a=index';
STATIC = 'http://127.0.0.1/houbeicms/Static';
HDPHP_TPL = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Lib/Tpl';
VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View';
PUBLIC = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public';
CONTROLLER_VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/Node';
HISTORY = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Index&a=index';
</script>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public/common.css"/>
</head>
<body>
<div class="hd-menu-list">
    <ul>
        <li class="active"><a href="<?php echo U('index');?>">菜单管理</a></li>
        <li><a href="<?php echo U('add',array('pid'=>0));?>">添加菜单</a></li>
    </ul>
</div>
<div class="hd-title-header">注意</div>
<div class="help">
    <ul>
        <li>将影响后台菜单布局与权限控制</li>
    </ul>
</div>
<form onsubmit="return hd_submit(this,'<?php echo U('updateOrder');?>','http://127.0.0.1/houbeicms/index.php?m=Admin&c=Node&a=index');">
    <table class="hd-table hd-table-list hd-form">
        <thead>
        <tr>
            <td class="hd-w50">排序</td>
            <td class="hd-w50">ID</td>
            <td>菜单名称</td>
            <td>状态</td>
            <td class="hd-w80">类型</td>
            <td class="hd-w150">操作</td>
        </tr>
        </thead>
        <tbody>
                <?php
        //初始化
        $hd['list']['n'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($node)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($node as $n) {
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
                $hd['list'][n]['index']++;
                //第1个值
                $hd['list'][n]['first']=($listId == 0);
                //最后一个值
                $hd['list'][n]['last']= (count($node)-1 <= $listId);
                //总数
                $hd['list'][n]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
            <tr>
                <td>
                    <input type="text" class="hd-w50" value="<?php echo $n['list_order'];?>" name="list_order[<?php echo $n['nid'];?>]"/>
                </td>
                <td><?php echo $n['nid'];?></td>
                <td><?php echo $n['_name'];?></td>
                <td>
                        <?php if($n['is_show']==1){ ?>
                        显示
                        <?php }else{ ?>
                        隐藏
                    <?php } ?>
                </td>
                <td>
                        <?php if($n['type']==1){ ?>
                        权限菜单
                        <?php }else{ ?>
                        普通菜单
                    <?php } ?>
                </td>
                <td style="text-align: right">
                        <?php if($n['_level']==3){ ?>
                        <span class="disabled">添加子菜单  | </span>
                        <?php }else{ ?>
                        <a href="<?php echo U('add',array('pid'=>$n['nid']));?>">添加子菜单</a> |
                    <?php } ?>

                        <?php if($n['is_system']==0){ ?>
                        <a href="<?php echo U('edit',array('nid'=>$n['nid']));?>">修改</a> |
                        <a href="javascript:del(<?php echo $n['nid'];?>)">删除</a>
                        <?php }else{ ?>
                        <span class="disabled">修改 | </span>
                        <span class="disabled">删除</span>
                    <?php } ?>
                </td>
            </tr>
        <?php }}?>
        </tbody>
    </table>
    <input type="submit" class="hd-btn" value="排序""/>
</form>
<script>
    //删除栏目
    function del(nid) {
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
                hd_ajax('<?php echo U("del");?>', {nid: nid}, 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Node&a=index');
            }
        });
    }
</script>
</body>
</html>