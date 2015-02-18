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
URL = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=User&a=index';
APP = 'http://127.0.0.1/houbeicms/HDCMS';
COMMON = 'http://127.0.0.1/houbeicms/HDCMS/Common';
HDPHP = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP';
HDPHP_DATA = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Data';
HDPHP_EXTEND = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Extend';
MODULE = 'http://127.0.0.1/houbeicms/index.php?m=Admin';
CONTROLLER = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=User';
ACTION = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=User&a=index';
STATIC = 'http://127.0.0.1/houbeicms/Static';
HDPHP_TPL = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Lib/Tpl';
VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View';
PUBLIC = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public';
CONTROLLER_VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/User';
HISTORY = 'http://127.0.0.1/houbeicms/index.php?m=admin';
</script>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public/common.css"/>
</head>
<body>
<div class="hd-menu-list">
    <ul>
        <li class="active"><a href="<?php echo U('index');?>">会员列表</a></li>
        <li><a href="<?php echo U('add');?>">添加会员</a></li>
    </ul>
</div>
<table class="hd-table hd-table-list hd-form">
    <thead>
    <tr>
        <td class="hd-w30">uid</td>
        <td>昵称</td>
        <td class="hd-w200">帐号</td>
        <td CLASS="W300">会员组</td>
        <td class="hd-w150">登录时间</td>
        <td CLASS="W300">锁定</td>
        <td class="hd-w100">注册IP</td>
        <td class="hd-w100">最近登录IP</td>
        <td class="hd-w100">积分</td>
        <td class="hd-w60">操作</td>
    </tr>
    </thead>
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
            <td><?php echo $d['uid'];?></td>
            <td><?php echo $d['nickname'];?></td>
            <td><?php echo $d['username'];?></td>
            <td><?php echo $d['rname'];?></td>
            <td><?php echo date('Y-m-d H:i:s',$d['logintime']);?></td>
            <td>
                <?php if ($d['lock_end_time'] > 0 && $d['lock_end_time'] < time()) { ?>
                    √</a>
                <?php } else { ?>
                    x
                <?php } ?>
            </td>
            <td><?php echo $d['regip'];?></td>
            <td><?php echo $d['lastip'];?></td>
            <td><?php echo $d['credits'];?></td>
            <td>
                    <?php if($d['username']==C('WEB_MASTER')){ ?>
                    修改 | 删除
                    <?php }else{ ?>
                    <a href="<?php echo U('edit',array('uid'=>$d['uid']));?>">修改</a>
                    <span class="line">|</span>
                    <a href="<?php echo U('del',array('uid'=>$d['uid']));?>">删除</a>
                <?php } ?>
            </td>
        </tr>
    <?php }}?>
</table>
</body>
</html>