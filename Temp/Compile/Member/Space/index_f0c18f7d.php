<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人空间</title>
    
            <link rel="stylesheet" href="http://127.0.0.1/houbeicms/Static/bootstrap/css/bootstrap.min.css"/>
            <link rel="stylesheet" href="http://127.0.0.1/houbeicms/Static/bootstrap/css/bootstrap-theme.min.css"/>
            <script type="text/javascript" src="http://127.0.0.1/houbeicms/Static/bootstrap/js/bootstrap.min.js"></script>
        
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Member/View/Space/css/space.css"/>
</head>
<body>
<div class="wrap">
    <div class="content">
        <div class="top_pic">
            空间顶图
        </div>
        <div class="about">
            <div class="feeb">
                <img src="<?php echo icon($user['icon']);?>"/>
            </div>
            <div class="userinfo">
                <div class="username">
                    <span class="userinfo_username"><?php echo $user['nickname'];?></span>
                </div>
                <div class="userinfo_userdata">
                    <span><b>个性签名:</b> <?php echo $user['signature'];?></span>
                    <span class="userinfo_split"></span>&nbsp;&nbsp;&nbsp;
                    <span><b>空间访问数:</b> <?php echo $user['spec_num'];?></span>
                </div>
            </div>
            <div class="userinfo_shortcut">
                <a href="http://127.0.0.1/houbeicms">返回首页</a> |
                <a href="<?php echo U('Member/Index/index');?>">会员中心</a>
            </div>
        </div>
        <div class="content_wrap">
            <div class="article_list">
                <h1 class="list_title"><?php echo $model_name;?></h1>
                <ul>
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
                    <li>
                        <div class="addtime"><?php echo date("Y-m-d",$d['addtime']);?></div>
                        <div class="article_content">
                            <span class="post_ico"></span>
                            <span class="post_content">
                                <a href="<?php echo U('Index/Content/index',array('mid'=>$d['mid'],'cid'=>$d['cid'],'aid'=>$d['aid']));?>"><?php echo $d['title'];?></a>
                            </span>
                        </div>
                    </li>
                    <?php }}?>
                </ul>
                <div class="page1">
                    <?php echo $page;?>
                </div>
            </div>
            <div class="follow">
                <h1 class="ihome_aside_title">频道</h1>
                <ul>
                            <?php
        //初始化
        $hd['list']['m'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($model)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($model as $m) {
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
                $hd['list'][m]['index']++;
                //第1个值
                $hd['list'][m]['first']=($listId == 0);
                //最后一个值
                $hd['list'][m]['last']= (count($model)-1 <= $listId);
                //总数
                $hd['list'][m]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
                        <li style="clear: both">
                                <?php if($m['contribute']){ ?>
                            <a href="<?php echo U('index',array('uid'=>$_GET['uid'],'mid'=>$m['mid']));?>">
                                <?php echo $m['model_name'];?>
                            </a>
                            <?php } ?>
                        </li>
                    <?php }}?>
                </ul>
                <h1 class="ihome_aside_title">最近来访</h1>
                <ul>
                            <?php
        //初始化
        $hd['list']['g'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($guest)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($guest as $g) {
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
                $hd['list'][g]['index']++;
                //第1个值
                $hd['list'][g]['first']=($listId == 0);
                //最后一个值
                $hd['list'][g]['last']= (count($guest)-1 <= $listId);
                //总数
                $hd['list'][g]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
                        <li>
                            <a href="<?php echo U('index',array('uid'=>$g['uid']));?>">
                                <img src="<?php echo icon($g['icon']);?>" alt="<?php echo $g['nickname'];?>" title="<?php echo $g['nickname'];?>"/>
                            </a>
                        </li>
                    <?php }}?>
                </ul>
            </div>
        </div>
    </div>
    <div class="copyright">
        <?php echo $hd['config']['copyright'];?>
    </div>
</div>

</body>
</html>