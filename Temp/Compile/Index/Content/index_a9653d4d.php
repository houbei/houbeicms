<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $hd['config']['WEBNAME'];?></title>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/Static/hdjs/hdjs.css"/>
    <link type="text/css" rel="stylesheet" href="Template/default/css/common.css"/>
    <link href="http://127.0.0.1/Static/css/header.css" rel="stylesheet" type="text/css" />
    <link type="text/css" rel="stylesheet" href="Template/default/css/article_default.css"/>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="http://127.0.0.1/Static/bootstrap/css/bootstrap.min.css">

    <!-- 可选的Bootstrap主题文件（一般不用引入） -->
    <link rel="stylesheet" href="http://127.0.0.1/Static/bootstrap/css/bootstrap-theme.min.css">
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="http://127.0.0.1/Static/jquery-1.11.1.min.js"></script>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="http://127.0.0.1/Static/bootstrap/js/bootstrap.min.js"></script>
    <!--代码高亮-->
    <script type="text/javascript" src="http://127.0.0.1/Static/SyntaxHighlighter/scripts/shCore.js"></script>
    <script type="text/javascript" src="http://127.0.0.1/Static/SyntaxHighlighter/scripts/shBrushBash.js"></script>
    <script type="text/javascript" src="http://127.0.0.1/Static/SyntaxHighlighter/scripts/shBrushCpp.js"></script>
    <script type="text/javascript" src="http://127.0.0.1/Static/SyntaxHighlighter/scripts/shBrushCSharp.js"></script>
    <script type="text/javascript" src="http://127.0.0.1/Static/SyntaxHighlighter/scripts/shBrushCss.js"></script>
    <script type="text/javascript" src="http://127.0.0.1/Static/SyntaxHighlighter/scripts/shBrushDelphi.js"></script>
    <script type="text/javascript" src="http://127.0.0.1/Static/SyntaxHighlighter/scripts/shBrushDiff.js"></script>
    <script type="text/javascript" src="http://127.0.0.1/Static/SyntaxHighlighter/scripts/shBrushGroovy.js"></script>
    <script type="text/javascript" src="http://127.0.0.1/Static/SyntaxHighlighter/scripts/shBrushJava.js"></script>
    <script type="text/javascript" src="http://127.0.0.1/Static/SyntaxHighlighter/scripts/shBrushJScript.js"></script>
    <script type="text/javascript" src="http://127.0.0.1/Static/SyntaxHighlighter/scripts/shBrushPhp.js"></script>
    <script type="text/javascript" src="http://127.0.0.1/Static/SyntaxHighlighter/scripts/shBrushPlain.js"></script>
    <script type="text/javascript" src="http://127.0.0.1/Static/SyntaxHighlighter/scripts/shBrushPython.js"></script>
    <script type="text/javascript" src="http://127.0.0.1/Static/SyntaxHighlighter/scripts/shBrushRuby.js"></script>
    <script type="text/javascript" src="http://127.0.0.1/Static/SyntaxHighlighter/scripts/shBrushScala.js"></script>
    <script type="text/javascript" src="http://127.0.0.1/Static/SyntaxHighlighter/scripts/shBrushSql.js"></script>
    <script type="text/javascript" src="http://127.0.0.1/Static/SyntaxHighlighter/scripts/shBrushVb.js"></script>
    <script type="text/javascript" src="http://127.0.0.1/Static/SyntaxHighlighter/scripts/shBrushXml.js"></script>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/Static/SyntaxHighlighter/styles/shCore.css">
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/Static/SyntaxHighlighter/styles/shThemeDefault.css">
    <script type="text/javascript">
        SyntaxHighlighter.config.clipboardSwf = 'http://127.0.0.1/Static/SyntaxHighlighter/scripts/clipboard.swf';
        SyntaxHighlighter.all();
    </script>
</head>
<body>
<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!--通用头部-->
<!--顶部开始-->
<div class="Header_Box clearfix">
    <div class="Header cWidth">
        <div class="Logo fl">
            <a href="http://127.0.0.1/index.php" title="后备网开源"><img alt="" src="http://127.0.0.1/Static/images/logo_1.png" /></a>
        </div>
        <div class="SearchCnt fl">
            <form action="#" method="get">
                <input name="content" class="Txt fl" type="text" />
                <input name="act" type="hidden" value="search" />
                <input name="type" type="hidden" value="文章" />

                <input class="Btn fl" type="submit" value="搜索" />
            </form>
        </div>
        <div class="HeaderCnt fr">
            <ul>
                <li>
                    <div class="UseImg fl">
                        <a href="#"><img style="width: 29px; height: 29px;" alt="" src="http://127.0.0.1/Static/images/avatar.gif" /></a>
                    </div>
                    <div class="UseName fl">
                        <a href="#" target="_blank"></a>
                    </div></li>
                <li><a  href="#">我的地盘</a> </li>
                <li><a href="#">注销</a> </li>
            </ul>
        </div>
    </div>
</div>
<!--顶部结束-->
<div class="h_10"></div>
<div class="NavBox cWidth clearfix">
    <!--导航-->
    <div class="Nav">
        <ul>
            <li     <?php if(!isset($_GET['cid'])){ ?>class="nav-current"<?php } ?>>
            <a href="http://127.0.0.1/index.php">首页</a>
            </li>
                    <?php
        $type=strtolower(trim('top'));
        $cid=0;
        if(empty($cid)){
            $cid=Q('cid',0,'intval');
        }
        $cid=explode(',',$cid);
        $db = M("category");
        $where=array();
        if ($type == 'top') {
            $where['pid']=array('EQ',0);
        }else if($cid) {
            switch ($type) {
                case 'current':
                    $where['cid'] =array('IN',$cid);
                    break;
                case "son":
                    $where['pid'] =array('IN',$cid);
                    break;
                case "self":
                    $selfMap['cid']=array('IN',$cid);
                    $pid = $db->where($selfMap)->getField('pid');
                    $where['pid'] =array('EQ',$pid);
                    break;
            }
        }
        $where['cat_show']=array('EQ',1);
        $result = $db->where($where)->order("catorder ASC")->limit(10)->all();
        if($result){
            //当前栏目,用于改变样式
            $currentCid = Q('cid',0,'intval');
            foreach ($result as $index=>$field):
                $field['_index']=$index;
                $field['_first']=$index==0?true:false;
                $field['_last']=$index==(count($result)-1)?true:false;
                $field['class']=$currentCid==$field['cid']?"":'';
                $field['caturl'] = Url::category($field);
                if($field['cattype']==3){
                    $field['catlink']='<a href="'.$field['caturl'].'" target="_blank">'.$field['catname'].'</a>';
                }else{
                    $field['catlink']='<a href="'.$field['caturl'].'">'.$field['catname'].'</a>';
                }
                $field['catimage']=empty($field['catimage'])?'':'http://127.0.0.1'.$field['catimage'];
            ?>
                <li     <?php if($_GET['cid']==$field['cid'] || Data::isChild(S(category),$_GET['cid'],$field['cid'])){ ?>class="nav-current"<?php } ?>>
                <?php echo $field['catlink'];?>
                </li>
            <?php endforeach;}

        ?>
        </ul>
    </div>
    <!--/导航-->
</div>
<!--以上为统一头部-->
<!--
<div id="header">
    <div class="header-warp">
        <div id="header-right">
                <?php if(IS_LOGIN){ ?>
                <div class="dropdown">
                    <div id="dropdownMenu1" data-toggle="dropdown">
                        <img src="<?php echo $hd['session']['user']['icon'];?>" class="user" /> <?php echo $hd['session']['user']['username'];?>
                        <span class="caret"></span>
                    </div>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="http://127.0.0.1/index.php?m=Member&c=Content&a=content&mid=1">文章管理</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="http://127.0.0.1/index.php?m=Member&c=Account&a=personal">个人资料</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="http://127.0.0.1/index.php?m=Member&c=Login&a=out">退出</a></li>
                    </ul>
                </div>
            <?php }else{ ?>
                <a href="<?php echo U('Member/Login/login');?>" class="bt-primary">登录</a>
                <a href="<?php echo U('Member/Login/reg');?>" class="bt-default">注册</a>
            <?php } ?>
        </div>
        <a id="logo" href="http://127.0.0.1/index.php" title="后盾网开源"></a>
        <ul id="header-nav">
            <li     <?php if(!isset($_GET['cid'])){ ?>class="nav-current"<?php } ?>>
                <a href="http://127.0.0.1/index.php">首页</a>
            </li>
                    <?php
        $type=strtolower(trim('top'));
        $cid=0;
        if(empty($cid)){
            $cid=Q('cid',0,'intval');
        }
        $cid=explode(',',$cid);
        $db = M("category");
        $where=array();
        if ($type == 'top') {
            $where['pid']=array('EQ',0);
        }else if($cid) {
            switch ($type) {
                case 'current':
                    $where['cid'] =array('IN',$cid);
                    break;
                case "son":
                    $where['pid'] =array('IN',$cid);
                    break;
                case "self":
                    $selfMap['cid']=array('IN',$cid);
                    $pid = $db->where($selfMap)->getField('pid');
                    $where['pid'] =array('EQ',$pid);
                    break;
            }
        }
        $where['cat_show']=array('EQ',1);
        $result = $db->where($where)->order("catorder ASC")->limit(10)->all();
        if($result){
            //当前栏目,用于改变样式
            $currentCid = Q('cid',0,'intval');
            foreach ($result as $index=>$field):
                $field['_index']=$index;
                $field['_first']=$index==0?true:false;
                $field['_last']=$index==(count($result)-1)?true:false;
                $field['class']=$currentCid==$field['cid']?"":'';
                $field['caturl'] = Url::category($field);
                if($field['cattype']==3){
                    $field['catlink']='<a href="'.$field['caturl'].'" target="_blank">'.$field['catname'].'</a>';
                }else{
                    $field['catlink']='<a href="'.$field['caturl'].'">'.$field['catname'].'</a>';
                }
                $field['catimage']=empty($field['catimage'])?'':'http://127.0.0.1'.$field['catimage'];
            ?>
                <li     <?php if($_GET['cid']==$field['cid'] || Data::isChild(S(category),$_GET['cid'],$field['cid'])){ ?>class="nav-current"<?php } ?>>
                <?php echo $field['catlink'];?>
                </li>
            <?php endforeach;}

        ?>
        </ul>
    </div>
</div>-->

<div class="h_10"></div>
<div id="article-default">
    <div class="position">
        <div class="message">
            欢迎QQ加群：<?php echo $hd['config']['QQ_GROUP'];?> 进行使用交流！
        </div>
        <div class="search">
            <form action="http://127.0.0.1/index.php?g=Addons&m=Search" method="post">
                <input type="text" name="wd" placeholder="输入搜索内容..."/>
                <input type="submit" value="搜索"/>
            </form>
        </div>
    </div>
    <div class="content">
        <div class="header">
            <?php echo $hdcms['title'];?>
                <?php if(!empty($hdcms['files'][0]['url'])){ ?>
                <a href="<?php echo $hdcms['files'][0]['url'];?>" style="float:right">下载文件</a>
            <?php } ?>
        </div>
        <div class="info">
            作者：<a href="http://127.0.0.1/index.php?m=Member&c=Space&a=index&uid=<?php echo $hdcms['uid'];?>"><?php echo $hdcms['username'];?></a>
            发布日期：<?php echo date('Y-m-d',$hdcms['addtime']);?>
            栏目：<a href="<?php echo $hdcms['caturl'];?>" class="category"><?php echo $hdcms['catname'];?></a>
            点击数：
            <script type="text/javascript"
                    src="<?php echo U('Index/Content/getClick',array('mid'=>$hdcms['mid'],'cid'=>$hdcms['cid'],'aid'=>$hdcms['aid'],'page'=>$_GET['page']));?>"></script>

            <a href="<?php echo U('Index/Content/favorite',array('mid'=>$hdcms['mid'],'cid'=>$hdcms['cid'],'aid'=>$hdcms['aid']));?>">加入收藏</a>
        </div>
        <div class="body">
            <?php echo $hdcms['content'];?>
            <!--评论Start-->
            <iframe frameborder="0" id="comment" scrolling="no" style="padding: 0px;margin: 0px;" width="100%"
                    src="http://127.0.0.1/index.php?g=Addons&m=Comment&c=Comment&mid=<?php echo $hd['get']['mid'];?>&cid=<?php echo $hd['get']['cid'];?>&aid=<?php echo $hd['get']['aid'];?>"></iframe>
            <!--评论End-->
        </div>
    </div>
    <div class="menu">
        <div class="send">
            <a href="http://127.0.0.1/index.php?m=Member&c=Content&a=add&mid=1&cid=<?php echo $hd['get']['cid'];?>">发表文章</a>
        </div>
        <dl>
            <dt>文章管理</dt>
                    <?php
        $type=strtolower(trim('self'));
        $cid=0;
        if(empty($cid)){
            $cid=Q('cid',0,'intval');
        }
        $cid=explode(',',$cid);
        $db = M("category");
        $where=array();
        if ($type == 'top') {
            $where['pid']=array('EQ',0);
        }else if($cid) {
            switch ($type) {
                case 'current':
                    $where['cid'] =array('IN',$cid);
                    break;
                case "son":
                    $where['pid'] =array('IN',$cid);
                    break;
                case "self":
                    $selfMap['cid']=array('IN',$cid);
                    $pid = $db->where($selfMap)->getField('pid');
                    $where['pid'] =array('EQ',$pid);
                    break;
            }
        }
        $where['cat_show']=array('EQ',1);
        $result = $db->where($where)->order("catorder ASC")->limit(10)->all();
        if($result){
            //当前栏目,用于改变样式
            $currentCid = Q('cid',0,'intval');
            foreach ($result as $index=>$field):
                $field['_index']=$index;
                $field['_first']=$index==0?true:false;
                $field['_last']=$index==(count($result)-1)?true:false;
                $field['class']=$currentCid==$field['cid']?"current":'';
                $field['caturl'] = Url::category($field);
                if($field['cattype']==3){
                    $field['catlink']='<a href="'.$field['caturl'].'" target="_blank">'.$field['catname'].'</a>';
                }else{
                    $field['catlink']='<a href="'.$field['caturl'].'">'.$field['catname'].'</a>';
                }
                $field['catimage']=empty($field['catimage'])?'':'http://127.0.0.1'.$field['catimage'];
            ?>
                <dd><a href="<?php echo $field['caturl'];?>" class="<?php echo $field['class'];?>"><?php echo $field['catname'];?></a></dd>
            <?php endforeach;}

        ?>
            <dt>赞助作者</dt>
            <dd>
                <img src="Template/default/images/ae0ybyad02mcx9kt78.png" alt="赞助作者" width="180"/>
            </dd>
        </dl>
    </div>
</div>
<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="#" target="_blank">高端PHP培训</a>|
                <a href="#" target="_blank">用户中心</a>|
                <a href="http://127.0.0.1/index.php?g=Addon&m=Sitemap&c=Index&a=index">网站地图</a>
                <br>
                © 2012 - 2014 hdphp.com. All Rights Reserved (京ICP备12048441号-1)
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    div.hd_show_pic_bg {
        position: fixed;
        left: 0px;
        right: 0px;
        top: 0px;
        bottom: 0px;
        background: #000000;
        opacity: 0.5;
        filter: alpha(opacity=50);
        z-index: 900;
    }

    div.hd_show_pic_img {
        position: absolute;
        border: solid 1px #aaaaaa;
        background: #FFFFFF;
        z-index: 1000;
        text-align: center;
        padding-top: 35px;
    }

    a.hd_show_pic_close {
        position: absolute;
        display: block;
        right: 10px;
        top: 10px;
        width: 17px;
        height: 17px;
        z-index: 1010;
        background: url("Template/default/images/imgzoom_tb.gif") -80px 0px;
    }
</style>
<script type="text/javascript">
    function remove_show_pic() {
        $(".hd_show_pic_bg").remove();
        $(".hd_show_pic_img").remove();
        $(".hd_show_pic_close").remove();
    }
    function show_pic(url) {
        var div = "<div class='hd_show_pic_bg'></div>";
        div += "<div class='hd_show_pic_img'><img src='" + url + "'/>" +
        "<a href='javascript:;' onclick='remove_show_pic()' class='hd_show_pic_close'></a></div>";
        $('body').append(div);
        var win_w = $(window).width() - 300;
        $('.hd_show_pic_img img').css({'max-width': win_w});
        var t = $(window).scrollTop();
        $('.hd_show_pic_img').css({width: win_w, left: 150, top: t});
    }
    $(document).click(function () {
        remove_show_pic();
    })
    $('img').mouseover(function () {
        if ($(this).width() > 500) {
            $(this).css({cursor: 'pointer'});
            $(this).attr('title', '查看大图');
            $(this).click(function (e) {
                e.stopPropagation();
                show_pic($(this).attr('src'));
            })
        }
    })
</script>
</body>
</html>