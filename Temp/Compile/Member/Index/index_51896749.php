<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta http-equiv="Cache-Control" content="no-cache"/>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Member/View/Public/static/css/common.css"/>
    
    <bootstarp/>
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

<div class="wrap">
    <div class="menu">
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
    </div>
    <div class="content">
        <div class="member_info">
            <div class="user-icon">
                <img src="<?php echo $hd['session']['user']['icon'];?>"/>
            </div>
            <div class="user-info">
                <div class="top-info">
                    <div class="username"><?php echo $hd['session']['user']['username'];?></div>
                    <div class="role"><?php echo $hd['session']['user']['rname'];?></div>
                </div>
                <div class="logintime">
                    本次登录时间：<?php echo date("Y-m-d H:i",$hd['session']['user']['logintime']);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;本次登录IP： <?php echo $hd['session']['user']['lastip'];?>
                </div>
            </div>
        </div>
        <div class="list">
            <div class="header">
                收藏夹
            </div>
            <div class="article">
                <table class="table2 hd-form">
                            <?php
        //初始化
        $hd['list']['c'] = array(
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
            foreach ($data as $c) {
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
                $hd['list'][c]['last']= (count($data)-1 <= $listId);
                //总数
                $hd['list'][c]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
                        <tr>
                            <td>
                                <a href="<?php echo U('Index/Content/index',array('mid'=>$c['mid'],'cid'=>$c['cid'],'aid'=>$c['aid']));?>"
                                   target="_blank">
                                    <?php echo $c['title'];?>
                                </a>
                            </td>
                        </tr>
                    <?php }}?>
                </table>
                    <?php if($count){ ?>
                    <div class="page1">
                        <?php echo $page;?>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
</body>
</html>