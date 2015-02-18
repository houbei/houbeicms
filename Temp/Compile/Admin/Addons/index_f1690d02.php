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
URL = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Addons&a=index';
APP = 'http://127.0.0.1/houbeicms/HDCMS';
COMMON = 'http://127.0.0.1/houbeicms/HDCMS/Common';
HDPHP = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP';
HDPHP_DATA = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Data';
HDPHP_EXTEND = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Extend';
MODULE = 'http://127.0.0.1/houbeicms/index.php?m=Admin';
CONTROLLER = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Addons';
ACTION = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Addons&a=index';
STATIC = 'http://127.0.0.1/houbeicms/Static';
HDPHP_TPL = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Lib/Tpl';
VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View';
PUBLIC = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public';
CONTROLLER_VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/Addons';
HISTORY = 'http://127.0.0.1/houbeicms/index.php?m=admin';
</script>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public/common.css"/>
</head>
<body>
<div class="hd-menu-list">
    <ul>
        <li class="active">
            <a href="<?php echo U('index');?>">插件列表</a>
        </li>
        <li>
            <a href="<?php echo U('add');?>">创建插件</a>
        </li>
    </ul>
</div>
    <form class="hd-form">
        <table class="hd-table hd-table-list hd-form">
            <thead>
            <tr>
                <td class="hd-w150">名称</td>
                <td class="hd-w100">标识</td>
                <td>描述</td>
                <td class="hd-w60">安装</td>
                <td class="hd-w100">作者</td>
                <td class="hd-w50">版本</td>
                <td class="hd-w200">操作</td>
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
                    <td>
                        <?php echo $d['name'];?>
                    </td>
                    <td><?php echo $d['title'];?></td>
                    <td><?php echo $d['description'];?></td>
                    <td>
                            <?php if($d['status']){ ?>
                            <font color="red">√</font>
                            <?php }else{ ?>
                            <font color="blue">×</font>
                        <?php } ?>
                    </td>
                    <td><?php echo $d['author'];?></td>
                    <td><?php echo $d['version'];?></td>
                    <td>
                        <a href="javascript:package('<?php echo $d['name'];?>')">打包</a>
                            <?php if($d['install']){ ?>
                                <?php if($d['config']){ ?>
                                <a href="<?php echo U('config',array('id'=>$d['id']));?>">设置</a>
                            <?php }else{ ?>
                                设置
                            <?php } ?>
                                <?php if($d['status']){ ?>
                                <a href="javascript:disabled('<?php echo $d['name'];?>')">禁用</a>
                            <?php }else{ ?>
                                <a href="javascript:enabled('<?php echo $d['name'];?>')">启用</a>
                            <?php } ?>
                            <a href="javascript:uninstall('<?php echo $d['title'];?>','<?php echo $d['name'];?>')">卸载</a>
                        <?php }else{ ?>
                            <a href="javascript:install('<?php echo $d['name'];?>')">安装</a>
                        <?php } ?>
                            <?php if($d['IndexAction']){ ?>
                            <a href="<?php echo $d['IndexAction'];?>" target="_blank">前台</a>
                        <?php }else{ ?>
                            前台
                        <?php } ?>
                            <?php if($d['help']){ ?>
                            <a href="<?php echo $d['help'];?>" target="_blank">帮助</a>
                        <?php }else{ ?>
                            帮助
                        <?php } ?>
                    </td>
                </tr>
            <?php }}?>
            </tbody>
        </table>
    </form>
<script>
    //打包
    function package(name){
        hd_ajax("<?php echo U('package');?>",{addon:name},'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Addons&a=index');
    }
    //启用
    function enabled(name){
        hd_ajax("<?php echo U('enabled');?>",{addon:name},'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Addons&a=index');
    }
    //禁用
    function disabled(name){
        hd_ajax("<?php echo U('disabled');?>",{addon:name},'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Addons&a=index');
    }
    //安装
    function install(name){
        hd_ajax("<?php echo U('install');?>",{addon:name},'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Addons&a=index');
    }
    //卸载
    function uninstall(title,name){
        if(confirm('确证卸载 【'+title+'】 插件吗？')){
            hd_ajax("<?php echo U('uninstall');?>",{addon:name},'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Addons&a=index');
        }
    }
</script>
</body>
</html>