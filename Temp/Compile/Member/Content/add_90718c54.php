<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
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
URL = 'http://127.0.0.1/houbeicms/index.php?m=Member&c=Content&a=add&mid=1';
APP = 'http://127.0.0.1/houbeicms/HDCMS';
COMMON = 'http://127.0.0.1/houbeicms/HDCMS/Common';
HDPHP = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP';
HDPHP_DATA = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Data';
HDPHP_EXTEND = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Extend';
MODULE = 'http://127.0.0.1/houbeicms/index.php?m=Member';
CONTROLLER = 'http://127.0.0.1/houbeicms/index.php?m=Member&c=Content';
ACTION = 'http://127.0.0.1/houbeicms/index.php?m=Member&c=Content&a=add';
STATIC = 'http://127.0.0.1/houbeicms/Static';
HDPHP_TPL = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Lib/Tpl';
VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Member/View';
PUBLIC = 'http://127.0.0.1/houbeicms/HDCMS/Member/View/Public';
CONTROLLER_VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Member/View/Content';
HISTORY = 'http://127.0.0.1/houbeicms/index.php?m=Member&c=Content&a=content&mid=1';
</script>
    <script type="text/javascript" src="http://127.0.0.1/houbeicms/HDCMS/Member/View/Content/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Member/View/Content/css/css.css"/>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Member/View/Public/static/css/common.css"/>
    <script type="text/javascript" charset="utf-8" src="http://127.0.0.1/houbeicms/Static/ueditor1_4_3/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="http://127.0.0.1/houbeicms/Static/ueditor1_4_3/ueditor.all.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="http://127.0.0.1/houbeicms/Static/ueditor1_4_3/lang/zh-cn/zh-cn.js"></script>
    <script src="http://127.0.0.1/houbeicms/Static/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="http://127.0.0.1/houbeicms/Static/uploadify/uploadify.css">
</head>
<body>
<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<div class="top">
    <div class="top_warp">
        <div class="logo">
            <a href="<?php echo U('Member/Index/index');?>">
                <img src="http://127.0.0.1/houbeicms/HDCMS/Member/View/Public/images/member.png" alt=""/>
            </a>
        </div>
        <div class="top_menu">
            <a href="<?php echo U('Member/Index/index');?>">会员中心</a>
            <a href="<?php echo U('Space/index',array('uid'=>$_SESSION['user']['uid']));?>">个人空间</a>
            <a href="http://127.0.0.1/houbeicms">网站首页</a>
            <a href="<?php echo U('Index/index');?>" class="login">
                <img src="<?php echo $hd['session']['user']['icon'];?>" class="user"/>
                <?php echo $hd['session']['user']['username'];?>
            </a>
        </div>
    </div>
</div>

<div style="margin: 0 auto;width:1100px;">
    <form method="post" class="hd-form">
        <input type="hidden" name="mid" value="<?php echo $hd['get']['mid'];?>"/>
        <!--右侧缩略图区域-->
        <div class="content_right">
            <div class="mod-body">
                <h3>文章发起指南</h3>
                <p><b>• 文章标题:</b> 请用准确的语言描述您发布的文章思想</p>
                <p><b>• 文章内容:</b> 详细补充您的文章内容, 并提供一些相关的素材以供参与者更多的了解您所要文章的主题思想</p>
                <p><b>• 选择栏目:</b> 选择一个或者多个合适的话题, 让您发布的文章得到更多有相同兴趣的人参与. 所有人可以在您发布文章之后添加和编辑该文章所属的话题</p>
            </div>
        </div>
        <div class="content_left">
            <div class="hd-title-header">添加文章</div>
            <table class="hd-table hd-table-form">
                <?php foreach ($form as $field): ?>
                    <tr>
                        <th class="hd-w80"><?php echo $field['title'];?></th>
                        <td>
                            <?php echo $field['form'];?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <input type="submit" class="hd-btn hd-btn-primary" value="确定"/>
        <input type="button" class="hd-btn" onclick="window.close()" value="关闭"/>
    </form>
</div>
</body>
</html>