<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<dl>
    <dt>文章管理</dt>
    <?php foreach(S('model') as $m):?>
        <?php if($m['enable']==0 ||$m['contribute']==0)continue;?>
    <dd><a href="<?php echo U('Content/content',array('mid'=>$m['mid']));?>"     <?php if($hd['get']['mid']==$m['mid']){ ?>class="cur"<?php } ?>><?php echo $m['model_name'];?></a></dd>
    <?php endforeach;?>
<!--    <dd><a href="<?php echo U('Content/add');?>"     <?php if(ACTION=='add'){ ?>class="cur"<?php } ?>>发表文章</a></dd>-->
<!--    <dd><a href="<?php echo U('Content/collect');?>"     <?php if(ACTION=='collect'){ ?>class="cur"<?php } ?>>我的收藏</a></dd>-->
</dl>
<dl>
    <dt>帐号管理</dt>
    <dd><a href="<?php echo U('Account/personal');?>"     <?php if(ACTION=='personal'){ ?>class="cur"<?php } ?>>个人资料</a></dd>
    <dd><a href="<?php echo U('Account/setPassword');?>"     <?php if(ACTION=='setPassword'){ ?>class="cur"<?php } ?>>修改密码</a></dd>
    <dd><a href="<?php echo U('Account/setIcon');?>"     <?php if(ACTION=='setIcon'){ ?>class="cur"<?php } ?>>修改头像</a></dd>
    <dd><a href="<?php echo U('Login/out');?>">退出登录</a></dd>
</dl>