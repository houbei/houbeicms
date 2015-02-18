<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $hd['config']['webname'];?></title>
    <meta http-equiv="Cache-Control" content="no-cache"/>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Member/View/Public/static/css/common.css"/>
    
    
            <script type="text/javascript" src="http://127.0.0.1/houbeicms/Static/hdjs/jquery-1.8.2.min.js"></script>
            <link rel="stylesheet" href="http://127.0.0.1/houbeicms/Static/hdjs/hdjs.css"/>
            <script type="text/javascript" src="http://127.0.0.1/houbeicms/Static/hdjs/hdjs.min.js"></script>
        
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
        <div class="list">
            <div class="header">
                <?php echo $model['model_name'];?>
            </div>
            <div class="article_menu">
                <a href="javascript:;" onclick="window.open('<?php echo U('add',array('mid'=>$_GET['mid']));?>')">发表文章</a>
            </div>
            <div class="article">
                <table class="table2 hd-form">
                    <thead>
                    <tr>
                        <td>文章标题</td>
                        <td width="100">栏目</td>
                        <td width="50">状态</td>
                        <td width="50">点击</td>
                        <td width="100">发布时间</td>
                        <td width="100">操作</td>
                    </tr>
                    </thead>
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
                                <a href="<?php echo U('Index/Content/index',array('mid'=>$c['mid'],'cid'=>$c['cid'],'aid'=>$c['aid']));?>" target="_blank">
                                    <?php echo $c['title'];?>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo U('Index/Category/index',array('cid'=>$c['cid']));?>" target="_blank">
                                    <?php echo $c['catname'];?>
                                </a>
                            </td>
                            <td>
                                    <?php if($c['content_status']==1){ ?>
                                    已审核
                                <?php }else{ ?>
                                    未审核
                                <?php } ?>
                            </td>
                            <td><?php echo $c['click'];?></td>
                            <td><?php echo date("Y-m-d",$c['addtime']);?></td>
                            <td>
                                <a href="<?php echo U('Index/Content/index',array('cid'=>$c['cid'],'aid'=>$c['aid']));?>" target="_blank">
                                    访问
                                </a>
                                <span class="line">|</span>
                                <a href="javascript:;"
                                    onclick="window.open('<?php echo U(edit,array('mid'=>$c['mid'],'cid'=>$c['cid'],'aid'=>$c['aid']));?>')">
                                    编辑
                                </a>
                                <span class="line">|</span>
                                <a href="javascript:;" onclick="del(<?php echo $c['mid'];?>,<?php echo $c['cid'];?>,<?php echo $c['aid'];?>)">
                                    删除
                                </a>
                            </td>
                        </tr>
                    <?php }}?>
                </table>
                <div class="page1">
                    <?php echo $page;?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    /**
     * 删除单一文章
     * @param mid
     * @param cid
     * @param aid
     */
    function del(mid,cid,aid) {
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
                hd_ajax('<?php echo U("del");?>', {mid:mid,cid:cid,aid: aid}, 'http://127.0.0.1/houbeicms/index.php?m=Member&c=Content&a=content&mid=1');
            },
            cancel: function () {//点击关闭后的事件

            }
        });
    }
</script>
</body>
</html>