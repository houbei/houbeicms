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
