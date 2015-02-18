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
URL = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Config&a=webConfig';
APP = 'http://127.0.0.1/houbeicms/HDCMS';
COMMON = 'http://127.0.0.1/houbeicms/HDCMS/Common';
HDPHP = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP';
HDPHP_DATA = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Data';
HDPHP_EXTEND = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Extend';
MODULE = 'http://127.0.0.1/houbeicms/index.php?m=Admin';
CONTROLLER = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Config';
ACTION = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Config&a=webConfig';
STATIC = 'http://127.0.0.1/houbeicms/Static';
HDPHP_TPL = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Lib/Tpl';
VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View';
PUBLIC = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public';
CONTROLLER_VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/Config';
HISTORY = 'http://127.0.0.1/houbeicms/index.php?m=admin';
</script>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public/common.css"/>
</head>
<body>
<div class="hd-menu-list">
    <ul>
        <li class="active"><a href="<?php echo U('webConfig');?>">网站配置</a></li>
        <li><a href="<?php echo U('add');?>">添加配置</a></li>
        <li><a href="javascript:hd_ajax('<?php echo U(updateCache);?>',{},'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Config&a=webConfig')">更新缓存</a></li>
    </ul>
</div>
<div class="hd-title-header">温馨提示</div>
<div class="help">
    <ul>
        <li>模板中使用配置项方法为{$hd.config.变量名}，请仔细修改配置项，不当设置将影响网站的性能与安全</li>
    </ul>
</div>
<form class="hd-form" onsubmit="return hd_submit(this,'<?php echo U('webConfig');?>','http://127.0.0.1/houbeicms/index.php?m=Admin&c=Config&a=webConfig')">

        <div class="hd-tab">
            <ul class="hd-tab-menu">
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
                    <li lab="<?php echo $d['cgname'];?>"     <?php if($hd['list']['d']['first']){ ?>class="active"<?php } ?>>
                        <a href="#"><?php echo $d['cgtitle'];?></a>
                    </li>
                <?php }}?>
            </ul>
            <div class="hd-tab-content">
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
                    <div lab="<?php echo $d['cgname'];?>" class="hd-tab-area">
                        <table class="hd-table hd-table-form">
                            <thead>
                                <tr style="background: #E6E6E6;">
                                    <th class="hd-w50">排序</th>
                                    <th class="hd-w200">标题</th>
                                    <th>配置</th>
                                    <th class="hd-w300">变量</th>
                                    <th class="hd-w300">描述</th>
                                </tr>
                            </thead>
                                    <?php
        //初始化
        $hd['list']['c'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($d['_config'])) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($d['_config'] as $c) {
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
                $hd['list'][c]['last']= (count($d['_config'])-1 <= $listId);
                //总数
                $hd['list'][c]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
                                <tr>
                                    <td>
                                        <input type="text" name="config[<?php echo $c['id'];?>][order_list]" value="<?php echo $c['order_list'];?>"
                                               class="hd-w30"/>
                                        <input type="hidden" name="config[<?php echo $c['id'];?>][id]" value="<?php echo $c['id'];?>"/>
                                    </td>
                                    <td><?php echo $c['title'];?>
                                            <?php if($c['system']==0){ ?>
                                            <a href="javascript:del(<?php echo $c['id'];?>)">删除</a>
                                        <?php } ?>
                                    </td>
                                    <td><?php echo $c['_html'];?></td>
                                    <td><?php echo $c['name'];?></td>
                                    <td><?php echo $c['message'];?></td>
                                </tr>
                            <?php }}?>
                        </table>
                    </div>
                <?php }}?>
            </div>
        </div>
        <input type="submit" class="hd-btn" value="确定"/>
</form>
<script>
    //删除栏目
    function del(id) {
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
                hd_ajax('<?php echo U("del");?>', {id: id}, 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Config&a=webConfig');
            }
        });
    }
</script>
</body>
</html>