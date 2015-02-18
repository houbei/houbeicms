<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $hd['config']['WEBNAME'];?></title>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/Static/hdjs/hdjs.css"/>
    <link type="text/css" rel="stylesheet" href="Template/default/css/common.css"/>
    <link href="http://127.0.0.1/houbeicms/Static/css/header.css" rel="stylesheet" type="text/css" />
    <link href="http://127.0.0.1/houbeicms/Static/css/index_style.css" rel="stylesheet" type="text/css" />
    <link type="text/css" rel="stylesheet" href="Template/default/css/download.css"/>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="http://127.0.0.1/houbeicms/Static/bootstrap/css/bootstrap.min.css">

    <!-- 可选的Bootstrap主题文件（一般不用引入） -->
    <link rel="stylesheet" href="http://127.0.0.1/houbeicms/Static/bootstrap/css/bootstrap-theme.min.css">
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <link type="text/css" rel="stylesheet" href="Template/default/css/ie.css"/>
    <![endif]-->
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="http://127.0.0.1/houbeicms/Static/jquery-1.11.1.min.js"></script>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="http://127.0.0.1/houbeicms/Static/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!--通用头部-->
<!--顶部开始-->
<div class="Header_Box clearfix">
    <div class="Header cWidth">
        <div class="Logo fl">
            <a href="http://127.0.0.1/houbeicms/index.php" title="后备网开源"><img alt="" src="http://127.0.0.1/houbeicms/Static/images/logo_1.png" /></a>
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
                    <?php if(IS_LOGIN){ ?>
                <li>
                    <div class="UseImg fl">
                        <a href="#"><img style="width: 29px; height: 29px;" alt="" src="<?php echo $hd['session']['user']['icon'];?>" /></a>
                    </div>
                    <div class="UseName fl">
                        <a href="#" target="_blank"><?php echo $hd['session']['user']['username'];?></a>
                    </div>
                </li>
                    <li><a  href="http://127.0.0.1/houbeicms/index.php?m=Member&c=Index&a=index">会员中心</a> </li>
                    <li><a href="http://127.0.0.1/houbeicms/index.php?m=Member&c=Login&a=out">注销</a> </li>
                <?php }else{ ?>
                    <a href="<?php echo U('Member/Login/login');?>" class="bt-primary top28">登录</a>
                    <a href="<?php echo U('Member/Login/reg');?>" class="bt-default top28">注册</a>
                <?php } ?>
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
            <a href="http://127.0.0.1/houbeicms/index.php">首页</a>
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
                $field['catimage']=empty($field['catimage'])?'':'http://127.0.0.1/houbeicms'.$field['catimage'];
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
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="http://127.0.0.1/houbeicms/index.php?m=Member&c=Content&a=content&mid=1">文章管理</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="http://127.0.0.1/houbeicms/index.php?m=Member&c=Account&a=personal">个人资料</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="http://127.0.0.1/houbeicms/index.php?m=Member&c=Login&a=out">退出</a></li>
                    </ul>
                </div>
            <?php }else{ ?>
                <a href="<?php echo U('Member/Login/login');?>" class="bt-primary">登录</a>
                <a href="<?php echo U('Member/Login/reg');?>" class="bt-default">注册</a>
            <?php } ?>
        </div>
        <a id="logo" href="http://127.0.0.1/houbeicms/index.php" title="后盾网开源"></a>
        <ul id="header-nav">
            <li     <?php if(!isset($_GET['cid'])){ ?>class="nav-current"<?php } ?>>
                <a href="http://127.0.0.1/houbeicms/index.php">首页</a>
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
                $field['catimage']=empty($field['catimage'])?'':'http://127.0.0.1/houbeicms'.$field['catimage'];
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
<div id="soft">
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="hd-soft">
                <a href="javascript:;" class="d-link active">HDPHP</a>
                <a href="javascript:;" class="d-link">HoubeiCMS</a>
                <a href="javascript:;" class="d-link">HDJS</a>
            </div>
        </div>
    </div>
</div>
<div id="download">
    <div class="soft-box active">
        <div class="container">
            <div class="row">
                <div class="col-md-6 l-col">
                    <a href="http://www.hdphp.com/soft/hdphp.zip" class="down-ico"></a>
                    <a href="http://www.hdphp.com/soft/hdphp.zip">HouPHP下载</a>

                    <p>
                        大小: 200KB 日期: 2014-12-21
                    </p>
                </div>
                <div class="col-md-6">
                    <a href="http://www.hdphp.com/soft/HDPHP.pdf" class="down-doc"></a>
                    <a href="http://www.hdphp.com/soft/HDPHP.pdf">手册下载</a>

                    <p>
                        日期: 2014-12-18
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="soft-box">
        <div class="container">
            <div class="row">
                <div class="col-md-6 l-col">
                    <a href="http://www.hdphp.com/soft/hdcms.zip" class="down-ico"></a>
                    <a href="http://www.hdphp.com/soft/hdcms.zip">HoubeiCMS下载</a>

                    <p>
                        大小: 6MB 日期: 2014-12-21
                    </p>
                </div>
                <div class="col-md-6">
                    <a href="http://www.hdphp.com/soft/HDCMS.pdf" class="down-doc"></a>
                    <a href="http://www.hdphp.com/soft/HDCMS.pdf">手册下载</a>

                    <p>
                        日期: 2014-12-19
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="soft-box">
        <div class="container">
            <div class="row">
                <div class="col-md-6 l-col">
                    <a href="http://www.hdphp.com/soft/hdjs.zip" class="down-ico"></a>
                    <a href="http://www.hdphp.com/soft/hdjs.zip">HDJS下载</a>

                    <p>
                        大小: 6KB 日期: 2014-12-18
                    </p>
                </div>
                <div class="col-md-6">
                    <a href="http://hdjs.oschina.mopaas.com/" class="down-doc" target="_blank"></a>
                    <a href="http://hdjs.oschina.mopaas.com/" target="_blank">在线手册</a>

                    <p>
                        日期: 2014-12-18
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="#" target="_blank">高端PHP培训</a>|
                <a href="#" target="_blank">用户中心</a>|
                <a href="http://127.0.0.1/houbeicms/index.php?g=Addon&m=Sitemap&c=Index&a=index">网站地图</a>
                <br>
                Copyright &copy 2015  www.houbei.cc, All Rights Reserved 后备网 版权所有 黔ICP备15000001号
            </div>
        </div>
    </div>
</div>
<script>
    function _height() {
        var h = $("#header").outerHeight() * 1 + $('#soft').outerHeight() * 1 + $("#footer").outerHeight() * 1;
        h = $(window).height() - h - 40;
        $("#download").height(h);
    }
    $(function () {
        $(window).resize(_height);
        _height();
    })
    //下载链接
    $("#hd-soft a").click(function () {
        $("#hd-soft a").removeClass('active');
        $(this).addClass('active');
        var index = $(this).index();
        $(".soft-box").hide();
        $(".soft-box").eq(index).show();
    })
</script>
</body>
</html>