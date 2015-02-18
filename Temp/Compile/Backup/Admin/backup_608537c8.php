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
        <li class="active"><a href="<?php echo addon_url('backup',array('app'=>'Addon'));?>">备份数据</a></li>
        <li><a href="<?php echo addon_url('index',array('app'=>'Addon'));?>">备份列表</a></li>
    </ul>
</div>
<form action="<?php echo addon_url('backup_db',array('app'=>'Addon'));?>" method="post">
    <table class="hd-table hd-table-form hd-form">
        <thead>
        <tr>
            <td width="50">数据备份</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <table class="hd-table hd-table-form" width="100%">
                    <tr>
                        <td class="hd-w100">分卷大小</td>
                        <td>
                            <input type="text" class="hd-w150" name="size" value="200"/> KB
                        </td>
                    </tr>
                    <tr>
                        <td class="hd-w100">&nbsp;</td>
                        <td>
                            <input type="submit" class="hd-btn" value="开始备份"/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="hd-table hd-table-list hd-form" id="table_list">
        <thead>
        <tr>
            <td class="hd-w50">
                <label><input type="checkbox" class="s_all_ck" checked=""/> 全选</label>
            </td>
            <td>表名</td>
            <td>类型</td>
            <td>编码</td>
            <td>记录数</td>
            <td>使用空间</td>
            <td>碎片</td>
            <td class="hd-w60">操作</td>
        </tr>
        </thead>
        <tbody>
                <?php
        //初始化
        $hd['list']['t'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($table['table'])) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($table['table'] as $t) {
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
                $hd['list'][t]['index']++;
                //第1个值
                $hd['list'][t]['first']=($listId == 0);
                //最后一个值
                $hd['list'][t]['last']= (count($table['table'])-1 <= $listId);
                //总数
                $hd['list'][t]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
            <tr>
                <td>
                    <input type="checkbox" name="table[]" value="<?php echo $t['tablename'];?>" checked=""/>
                </td>
                <td><?php echo $t['tablename'];?></td>
                <td><?php echo $t['engine'];?></td>
                <td><?php echo $t['charset'];?></td>
                <td><?php echo $t['rows'];?></td>
                <td><?php echo $t['size'];?></td>
                <td><?php echo _default($t['data_free']);?></td>
                <td>
                    <a href="javascript:hd_ajax('<?php echo addon_url(optimize);?>',{table:['<?php echo $t['tablename'];?>']},'http://127.0.0.1/houbeicms/index.php?g=Addon&m=Backup&c=Admin&a=backup&app=Addon')">优化</a> |
                    <a href="javascript:hd_ajax('<?php echo addon_url(repair);?>',{table:['<?php echo $t['tablename'];?>']},'http://127.0.0.1/houbeicms/index.php?g=Addon&m=Backup&c=Admin&a=backup&app=Addon')">修复</a>
                </td>
            </tr>
        <?php }}?>
        </tbody>
    </table>
</form>
<input type="button" class="hd-btn hd-btn-sm" onclick="optimize()" value="批量优化"/>
<input type="button" class="hd-btn hd-btn-sm" onclick="repair()" value="批量修复"/>
<script>
    //全选与反选
    $(".s_all_ck").click(function () {
        $("[name='table[]']").attr("checked", !!$(this).attr("checked"));
    })

    //检查有没有选择备份目录
    function check_select_table() {
        if ($("[name*='table']:checked").length == 0) {
            alert("你还没有选择表");
            return false;
        }
        return true;
    }

    //优化表
    function optimize() {
        if (check_select_table()) {
            hd_ajax('<?php echo addon_url("optimize");?>', $("[name*='table']:checked").serialize());
        }
    }
    //修复表
    function repair() {
        if (check_select_table()) {
            hd_ajax('<?php echo addon_url("repair");?>', $("[name*='table']:checked").serialize());
        }
    }
</script>
</body>
</html>