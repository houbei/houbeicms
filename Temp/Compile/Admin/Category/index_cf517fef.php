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
URL = 'http://127.0.0.1/index.php?m=Admin&c=Category&a=index';
APP = 'http://127.0.0.1/HDCMS';
COMMON = 'http://127.0.0.1/HDCMS/Common';
HDPHP = 'http://127.0.0.1/HDCMS/HDPHP';
HDPHP_DATA = 'http://127.0.0.1/HDCMS/HDPHP/Data';
HDPHP_EXTEND = 'http://127.0.0.1/HDCMS/HDPHP/Extend';
MODULE = 'http://127.0.0.1/index.php?m=Admin';
CONTROLLER = 'http://127.0.0.1/index.php?m=Admin&c=Category';
ACTION = 'http://127.0.0.1/index.php?m=Admin&c=Category&a=index';
STATIC = 'http://127.0.0.1/Static';
HDPHP_TPL = 'http://127.0.0.1/HDCMS/HDPHP/Lib/Tpl';
VIEW = 'http://127.0.0.1/HDCMS/Admin/View';
PUBLIC = 'http://127.0.0.1/HDCMS/Admin/View/Public';
CONTROLLER_VIEW = 'http://127.0.0.1/HDCMS/Admin/View/Category';
HISTORY = 'http://127.0.0.1/index.php?m=admin';
TEMPLATE = 'http://127.0.0.1/Template/default';
</script>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/HDCMS/Admin/View/Public/common.css"/>
</head>
<body>
<form action="<?php echo U('BulkEdit');?>" method="post">
    <div class="hd-menu-list">
        <ul>
            <li class="active">
                <a href="<?php echo U(index);?>">栏目列表</a>
            </li>
            <li>
                <a href="<?php echo U('add');?>">添加顶级栏目</a>
            </li>
            <li>
                <a href="javascript:hd_ajax('<?php echo U(updateCache);?>',{},'http://127.0.0.1/index.php?m=Admin&c=Category&a=index',1)">更新栏目缓存</a>
            </li>
        </ul>
    </div>
    <table class="hd-table hd-table-list hd-form">
        <thead>
        <tr>
            <td class="hd-w30">
                <input type="checkbox" class="select_all"/>
            </td>
            <td class="hd-w30">cid</td>
            <td class="hd-w50">排序</td>
            <td>栏目名称</td>
            <td class="hd-w100">类型</td>
            <td class="hd-w100">模型</td>
            <td class="hd-w180">操作</td>
        </tr>
        </thead>
        <tbody>
                <?php
        //初始化
        $hd['list']['c'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($category)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($category as $c) {
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
                $hd['list'][c]['index']++;
                //第1个值
                $hd['list'][c]['first']=($listId == 0);
                //最后一个值
                $hd['list'][c]['last']= (count($category)-1 <= $listId);
                //总数
                $hd['list'][c]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
            <tr     <?php if($c['pid']==0){ ?>class="top"<?php } ?>>
            <td>
                <input type="checkbox" name="cid[]" value="<?php echo $c['cid'];?>"/>
            </td>
            <td><?php echo $c['cid'];?></td>
            <td>
                <input type="text" class="hd-w30" value="<?php echo $c['catorder'];?>" name="list_order[<?php echo $c['cid'];?>]"/>
            </td>
            <td>
                    <?php if($c['pid']==0 && Data::hasChild(S('category'),$c['cid'])){ ?>
                    <img src="http://127.0.0.1/Static/image/contract.gif" action="2" class="explodeCategory"/>
                <?php } ?>
                    <?php if($c['pid']==0){ ?>
                    <strong><?php echo $c['_name'];?></strong>
                    <?php }else{ ?>
                    <?php echo $c['_name'];?>
                <?php } ?>
            </td>
            <td><?php echo $c['cat_type_name'];?></td>
            <td><?php echo $c['model_name'];?></td>
            <td>
                <a href="<?php echo U('Index/Category/index',array('mid'=>$c['mid'],'cid'=>$c['cid']));?>" target="_blank">
                    访问
                </a>
                <span class="line">|</span>
                <a href="<?php echo U('add',array('pid'=>$c['cid'],'mid'=>$c['mid']));?>">
                    添加子栏目
                </a>
                <span class="line">|</span>
                <a href="<?php echo U('edit',array('cid'=>$c['cid']));?>">
                    修改
                </a>
                <span class="line">|</span>
                <a href="javascript:delCategory(<?php echo $c['cid'];?>)">
                    删除
                </a></td>
            </tr>
        <?php }}?>
        </tbody>
    </table>
    <input type="button" class="hd-btn hd-btn-xm" onclick="select_all(1)" value='全选'/>
    <input type="button" class="hd-btn hd-btn-xm" onclick="select_all(0)" value='反选'/>
    <input type="button" class="hd-btn hd-btn-xm" onclick="explodeCategory()" value="收缩"/>
    <input type="button" class="hd-btn hd-btn-xm" onclick="updateOrder()" value="更改排序"/>
    <input type="button" class="hd-btn hd-btn-xm" onclick="BulkEdit()" value="批量编辑"/>
</form>
<style type="text/css">
    img.explodeCategory {
        cursor: pointer;
    }
</style>
<script>
    //展开栏目
    $(".explodeCategory").click(function () {
        var action = parseInt($(this).attr("action"));
        var tr = $(this).parents('tr').eq(0);
        switch (action) {
            case 1://展示
                $(tr).nextUntil('.top').show();
                $(this).attr('action', 2);
                $(this).attr('src', "http://127.0.0.1/Static/image/contract.gif");
                break;
            case 2://收缩
                $(tr).nextUntil('.top').hide();
                $(this).attr('action', 1);
                $(this).attr('src', "http://127.0.0.1/Static/image/explode.gif");
                break;
        }
    })
    //关闭栏目子栏目（隐藏子栏目）
    $(".explodeCategory").trigger('click');
    //全部收起子栏目
    function explodeCategory() {
        $(".explodeCategory").each(function (i) {
            $(this).trigger('click');
        })
    }
    //更新排序
    function updateOrder() {
        //栏目检测
        if ($("input[type='text']").length > 0) {
            var post = $("input[type='text']").serialize();
            hd_ajax("<?php echo U('updateOrder');?>", post, 'http://127.0.0.1/index.php?m=Admin&c=Category&a=index', 1);
        }

    }
    //全选
    $("input.select_all").click(function () {
        $("[type='checkbox']").attr("checked", $(this).attr('checked') == 'checked');
    })
    //全选复选框
    function select_all(state) {
        if (state == 1) {
            $("[type='checkbox']").attr("checked", state);
        } else {
            $("[type='checkbox']").attr("checked", function () {
                return !$(this).attr('checked')
            });
        }
    }
    //删除栏目
    function delCategory(cid) {
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
                hd_ajax('<?php echo U("del");?>', {cid: cid}, 'http://127.0.0.1/index.php?m=Admin&c=Category&a=index');
            }
        });
    }
    //指量编辑
    function BulkEdit() {
        //栏目检测
        if ($("input[type='checkbox']:checked").length == 0) {
            alert('请选择栏目');
            return false;
        }
        var cid = '';
        $("[name='cid[]']:checked").each(function (i) {
            cid += $(this).val() + '|';
        })
        cid = cid.slice(0, -1);
        var url = CONTROLLER + '&a=BulkEdit&cids=' + cid;
        location.href = url;
    }
</script>
</body>
</html>