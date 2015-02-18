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
URL = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=WebStyle&a=styleList';
APP = 'http://127.0.0.1/houbeicms/HDCMS';
COMMON = 'http://127.0.0.1/houbeicms/HDCMS/Common';
HDPHP = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP';
HDPHP_DATA = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Data';
HDPHP_EXTEND = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Extend';
MODULE = 'http://127.0.0.1/houbeicms/index.php?m=Admin';
CONTROLLER = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=WebStyle';
ACTION = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=WebStyle&a=styleList';
STATIC = 'http://127.0.0.1/houbeicms/Static';
HDPHP_TPL = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Lib/Tpl';
VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View';
PUBLIC = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public';
CONTROLLER_VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/WebStyle';
HISTORY = 'http://127.0.0.1/houbeicms/index.php?m=admin';
</script>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public/common.css"/>
</head>
<body>
    <div class="hd-title-header">友情提示</div>
    <div class="help">
        <ul>
            <li>
                1. HDCMS官网不断更新免费优质模板 <a href="http://www.hdphp.com" class="action" target="_blank">立刻获取</a>
            </li>
            <li>
                2. 非HDCMS官网提供的模板，可能存在恶意木马程序
            </li>
            <li>
                3. 你需要了解HDCMS标签，才可以灵活编辑模板，当然这很简单 >>><a href="http://www.hdphp.com" target="_blank">获得视频教程</a>
            </li>
        </ul>
    </div>
    <div class="hd-title-header">当前模板</div>
    <div class="tpl-list">
        <ul>
                    <?php
        //初始化
        $hd['list']['t'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($style)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($style as $t) {
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
                $hd['list'][t]['last']= (count($style)-1 <= $listId);
                //总数
                $hd['list'][t]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
                <li     <?php if($t['current']==1){ ?>class="active current"<?php } ?>>
                    <img src="<?php echo $t['image'];?>" width="260"/>
                    <h2><?php echo $t['name'];?></h2>
                    <p>作者: <?php echo $t['author'];?></p>
                    <p>Email: <?php echo $t['email'];?></p>
                    <p>目录: <?php echo $t['filename'];?></p>

                    <div class="link">
                            <?php if($t['current']<>1){ ?>
                            <a href="javascript:;" class="btn" attr='select_tpl' onclick="hd_ajax('<?php echo U(selectStyle);?>', {dirName:'<?php echo $t['filename'];?>'}, 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=WebStyle&a=styleList',1)">使用</a>
                       <?php }else{ ?>
                        <strong>使用中...</strong>
                        <?php } ?>
                    </div>
                </li>
            <?php }}?>
        </ul>
    </div>
<style type="text/css">
    a:hover {
        text-decoration: underline;
    }

    div.tpl-list ul li {
        float: left;
        margin: 10px;
        height: auto;
        overflow: hidden;
        background: #efefef;
        border: solid 5px #DDDDDD;
        padding-bottom: 2px;
        position: relative;
    }

    div.tpl-list ul li.current {
        border: solid 5px #09AEEF;
        background: #09AEEF;
        color: #ffffff;
    }

    div.tpl-list ul li.current a, div.tpl-list ul li.current h2 {
        color: #ffffff;
    }

    div.tpl-list ul li.current img {
        opacity: 1;
    }

    div.tpl-list ul li img {
        width: 230px;
        height: 260px;
        border-bottom: solid 2px #DCDCDC;
        margin-bottom: 6px;
        opacity: 0.5;
    }

    div.tpl-list ul li h4 {
        font-size: 18px;
        padding-left: 10px;
        color: #333333;
        margin-bottom: 5px;
    }

    div.tpl-list ul li h4 strong {
        font-size: 12px;
        color: #03565E;
        font-weight: normal;
    }

    div.tpl-list ul li h2 {
        font-size: 18px;
        font-weight: bold;
        padding-left: 10px;
        margin-bottom: 5px;
        color: #333;
    }

    div.tpl-list ul li p {
        font-size: 12px;
        padding-left: 10px;
        margin: 0px;
    }

    div.tpl-list ul li div.link {
        padding-left: 10px;
        margin-top: 6px;
        padding-top: 5px;
    }

    div.tpl-list ul li div.link a, div.tpl-list ul li div.link strong {
        font-size: 16px;
        padding: 2px 8px 0px 0px;
        line-height: 25px;
    }
</style>
<script>
    //改变li样式
    $(".tpl-list li").mouseover(function () {
        $(this).addClass("active")
    }).mouseout(function () {
        $(this).removeClass("active")
    })
</script>
</body>
</html>