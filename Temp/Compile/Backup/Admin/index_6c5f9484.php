<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<?php if (!defined('HDPHP_PATH')) exit(); ?>
<!doctype html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <title>系统后台 - <?php echo $hd['config']['webname'];?> - by HDCMS</title>
    <script type="text/javascript" src="http://127.0.0.1/houbeicms/Static/hdjs/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" href="http://127.0.0.1/houbeicms/Static/hdjs/hdjs.css"/>
    <script type="text/javascript" src="http://127.0.0.1/houbeicms/Static/hdjs/hdjs.min.js"></script>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Addons/Backup/View/Public/common.css"/>
</head>
<body>
<div class="hd-menu-list">
    <ul>
        <li><a href="<?php echo addon_url('backup',array('app'=>'Addon'));?>">备份数据</a></li>
        <li class="active"><a href="<?php echo addon_url('index',array('app'=>'Addon'));?>">备份列表</a></li>
    </ul>
</div>
<form action="<?php echo addon_url('delBackupDir');?>" method="post">
    <table class="hd-table hd-table-list hd-form">
        <thead>
        <tr>
            <td>备份目录</td>
            <td>备份时间</td>
            <td>大小</td>
            <td class="hd-w80">操作</td>
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
        if (empty($dir)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($dir as $d) {
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
                $hd['list'][d]['last']= (count($dir)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
            <tr>
                <td><?php echo $d['filename'];?></td>
                <td><?php echo date('Y-m-d h:i:s',$d['filemtime']);?></td>
                <td><?php echo get_size($d['size']);?></td>
                <td>
                    <a href="javascript:" onclick="confirm('确定还原吗？')?location.href='<?php echo addon_url('recovery',array('dir'=>$d['filename']));?>':false;">还原</a>
                    |
                    <a href="javascript:del('<?php echo $d['filename'];?>')">删除</a>
                </td>
            </tr>
        <?php }}?>
        </tbody>
    </table>
</form>
<script>
    //删除目录
    function del(dir) {
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
                hd_ajax('<?php echo addon_url("del");?>', {dir: dir}, 'http://127.0.0.1/houbeicms/index.php?g=Addon&m=Backup&c=Admin&a=index');
            }
        });
    }
</script>
</body>
</html>