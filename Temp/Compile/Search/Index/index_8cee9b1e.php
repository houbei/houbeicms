<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $hd['config']['webname'];?></title>
    <script type="text/javascript" src="http://127.0.0.1/houbeicms/Static/hdjs/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" href="http://127.0.0.1/houbeicms/Static/hdjs/hdjs.css"/>
    <script type="text/javascript" src="http://127.0.0.1/houbeicms/Static/hdjs/hdjs.min.js"></script>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Addons/Search/View/Index/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="top">
        <a href="http://127.0.0.1/houbeicms">网站首页</a> |
        <a href="http://127.0.0.1/houbeicms/index.php?m=Member">会员中心</a>
    </div>
    <div class="form">
        <div class="logo">
            <a href="http://127.0.0.1/houbeicms">
                <img src="http://127.0.0.1/houbeicms/HDCMS/Addons/Search/View/Index/image/logo.png" alt="<?php echo $hd['config']['webname'];?>"/>
            </a>
        </div>
        <div class="input">
            <form action="http://127.0.0.1/houbeicms/index.php?g=Addons&m=Search" method="post">
                <input type="text" name="wd"/>
                <input type="submit" value="搜索" class="btn"/>
            </form>
        </div>
    </div>
    <div class="content">
        <div class="left">
            <dl>
                <dt>全部结果</dt>
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
                    <dd>
                        <a href="<?php echo remove_url_param('mid','http://127.0.0.1/houbeicms/index.php?g=Addon&m=Search&c=Index&a=index&wd=houbei');?>&mid=<?php echo $m['mid'];?>"     <?php if($hd['get']['mid']==$m['mid']){ ?>class='cul'<?php } ?>><?php echo $m['model_name'];?></a>
                    </dd>
                <?php }}?>
            </dl>
            <dl>
                <dt>全部结果</dt>
                <dd>
                    <a href="<?php echo remove_url_param('time','http://127.0.0.1/houbeicms/index.php?g=Addon&m=Search&c=Index&a=index&wd=houbei');?>&time=day"     <?php if($hd['get']['time']=='day'){ ?>class='cul'<?php } ?>>一天内</a>
                </dd>
                <dd>
                    <a href="<?php echo remove_url_param('time','http://127.0.0.1/houbeicms/index.php?g=Addon&m=Search&c=Index&a=index&wd=houbei');?>&time=week"     <?php if($hd['get']['time']=='week'){ ?>class='cul'<?php } ?>>一周内</a>
                </dd>
                <dd>
                    <a href="<?php echo remove_url_param('time','http://127.0.0.1/houbeicms/index.php?g=Addon&m=Search&c=Index&a=index&wd=houbei');?>&time=month"     <?php if($hd['get']['time']=='month'){ ?>class='cul'<?php } ?>>一月内</a>
                </dd>
                <dd>
                    <a href="<?php echo remove_url_param('time','http://127.0.0.1/houbeicms/index.php?g=Addon&m=Search&c=Index&a=index&wd=houbei');?>&time=year"     <?php if($hd['get']['time']=='year'){ ?>class='cul'<?php } ?>>一年内</a>
                </dd>
            </dl>
            <dl>
                <dt>搜索历史</dt>
                <?php foreach ($search_history as $k=>$v){?>
                    <dd>
                        <a href="<?php echo remove_url_param('wd','http://127.0.0.1/houbeicms/index.php?g=Addon&m=Search&c=Index&a=index&wd=houbei');?>&wd=<?php echo $v;?>"><?php echo $v;?></a>
                    </dd>
                <?php }?>
            </dl>
        </div>
        <div class="middle">
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
                    <a href="<?php echo Url::content($d);?>" target="_blank"><?php echo $d['title'];?></a>
                    <p class="description">
                       <?php echo mb_substr($d['description'],0,60,'utf-8');?>...
                    </p>
                    <p class="link">
                        <span class="link"><?php echo Url::content($d);?></span>
                        <a href="<?php echo Url::category($d);?>"><?php echo $d['catname'];?></a>
                    </p>
                </li>
                <?php }}?>
            </ul>
        </div>
        <div class="right">

            <dl>
                <dt>顶尖PHP培训</dt>
                <dd>
                    <a href="http://www.houdunwang.com" target="_blank"><img src="http://127.0.0.1/houbeicms/HDCMS/Addons/Search/View/Index/image/study.gif" alt="后盾网"/></a>
                </dd>
            </dl>
        </div>
    </div>
</div>
<div class="bottom-form">
    <div class="input">
        <form action="http://127.0.0.1/houbeicms/index.php?g=Addons&m=Search" method="post">
            <input type="text" name="wd"/>
            <input type="submit" value="搜索" class="btn"/>
        </form>
    </div>
</div>
<div class="copyright">
    <?php echo $hd['config']['copyright'];?>
</div>
</body>
</html>