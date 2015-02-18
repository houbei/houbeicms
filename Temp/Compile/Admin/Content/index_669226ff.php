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
URL = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Content&a=index';
APP = 'http://127.0.0.1/houbeicms/HDCMS';
COMMON = 'http://127.0.0.1/houbeicms/HDCMS/Common';
HDPHP = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP';
HDPHP_DATA = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Data';
HDPHP_EXTEND = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Extend';
MODULE = 'http://127.0.0.1/houbeicms/index.php?m=Admin';
CONTROLLER = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Content';
ACTION = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Content&a=index';
STATIC = 'http://127.0.0.1/houbeicms/Static';
HDPHP_TPL = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Lib/Tpl';
VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View';
PUBLIC = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public';
CONTROLLER_VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/Content';
HISTORY = 'http://127.0.0.1/houbeicms/index.php?m=admin';
</script>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public/common.css"/>
</head>
<body>
    <div id="category_tree">
        <div id="tree_title">
            <span></span>
            <a href="javascript:;" onclick="get_category_tree();" target="content">刷新栏目</a>
        </div>
        <ul id="treeDemo" class="ztree" style="top:25px;position: absolute;"></ul>
    </div>
    <div id="move">
        <span class="left"></span>
    </div>
    <div id="content">
        <iframe src="<?php echo U('Index/welcome');?>" name="content" scrolling="auto" frameborder="0" style="height:100%;width: 100%;"></iframe>
    </div>
<link rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Admin/View/Content/ztree/css/zTreeStyle/zTreeStyle.css" type="text/css">
<script type="text/javascript" src="http://127.0.0.1/houbeicms/HDCMS/Admin/View/Content/ztree/js/jquery.ztree.all-3.5.min.js"></script>
<style type="text/css">
    div#category_tree{
        font-size:12px;
    }
    div#tree_title a {
        color: #333;
    }

    /*左侧栏目*/
    div#category_tree {
        width: 190px;
        position: fixed;
        top: 0px;
        bottom: 0px;
        left: 0px;
        overflow-x: hidden;
        overflow-y: auto;
        border-right: solid 1px #DDDDDD;
    }

    div#move {
        width: 5px;
        background: #EEEEEE;
        position: fixed;
        left: 191px;
        top: 0px;
        bottom: 0px;
        border-right: solid 1px #DDDDDD;
        cursor: pointer;
    }

    div#move span {
        font-size: 16px;
        color: #999;
        display: block;
        height: 15px;
        width: 15px;
        position: absolute;
        top: 50%;
        margin-top: -15px;
        z-index: 1000;
    }

    div#move span.left {
        background: url("http://127.0.0.1/houbeicms/HDCMS/Admin/View/Content/img/ico_left.gif") no-repeat;
        left: -10px;
    }

    div#move span.right {
        background: url("http://127.0.0.1/houbeicms/HDCMS/Admin/View/Content/img/ico_right.gif") no-repeat;
        left: 5px;
    }
    div.wrap{margin-bottom: 0px;}
    /*右侧内容显示区*/
    div#content {
        position: fixed;
        left: 197px;
        right: 0px;
        bottom: 0px;
        top: 0px;
        padding:0px;
    }
    #tree_title {
        position: absolute;
        top: 10px;
        left: 10px;
    }

    #tree_title span {
        display: block;
        background: url("http://127.0.0.1/houbeicms/HDCMS/Admin/View/Content/ztree/css/zTreeStyle/img/diy/1_open.png");
        width: 15px;
        height: 15px;
        float: left;
        margin-right: 5px;
    }
</style>
<script type="text/javascript" charset="utf-8">
    //显示左侧栏目列表TREE
    function get_category_tree() {
        $.post(CONTROLLER + '&a=ajaxCategoryZtree', function (data) {
            $("#category_tree").hide();
            var setting = {
                data: {
                    simpleData: {
                        enable: true
                    }
                }
            };
            var zNodes = data;
            $(document).ready(function () {
                $.fn.zTree.init($("#treeDemo"), setting, zNodes);
            });
            $("#category_tree").slideDown(200);
        }, 'json');
    }
    get_category_tree();
    //======================点击move标签DIV时改变div布局===============
    $(function () {
        $("div#move").toggle(function () {
            $("div#category_tree").stop().animate({
                left: '-200px'
            }, 500);
            $(this).find('span').attr('class', 'right').end().stop().animate({
                left: '0px'
            }, 500);
            $('div#content').stop().animate({
                left: '20px'
            }, 500);
        }, function () {
            $("div#category_tree").stop().animate({
                left: '0px'
            }, 500);
            $(this).find('span').attr('class', 'left').end().stop().animate({
                left: '191px'
            }, 500);
            $('div#content').stop().animate({
                left: '197px'
            }, 500);
        })
    })
</script>
</body>
</html>