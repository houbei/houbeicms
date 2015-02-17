<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $hd['config']['WEBNAME'];?></title>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/Static/hdjs/hdjs.css"/>
    <link type="text/css" rel="stylesheet" href="Template/default/css/common.css"/>
    <link href="http://127.0.0.1/houbeicms/Static/css/header.css" rel="stylesheet" type="text/css" />
    <link type="text/css" rel="stylesheet" href="Template/default/css/article_list.css"/>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="http://127.0.0.1/houbeicms/Static/bootstrap/css/bootstrap.min.css">

    <!-- 可选的Bootstrap主题文件（一般不用引入） -->
    <link rel="stylesheet" href="http://127.0.0.1/houbeicms/Static/bootstrap/css/bootstrap-theme.min.css">

    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
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
                <li>
                    <div class="UseImg fl">
                        <a href="#"><img style="width: 29px; height: 29px;" alt="" src="http://127.0.0.1/houbeicms/Static/images/avatar.gif" /></a>
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
<div id="article-list">
    <div class="position">
        <div class="message">
            欢迎加QQ群：<?php echo $hd['config']['QQ_GROUP'];?> 进行使用交流！
        </div>
        <div class="search">
            <form method="post" action="<?php echo addon_url('Search/Index/index');?>">
                <input name="wd" placeholder="输入搜索内容..." type="text">
                <input value="搜索" type="submit">
            </form>
        </div>
    </div>

    <!--列表-->
    <div class="content">
        <div class="list">
            <div class="header">
                <?php echo $hdcms['catname'];?>            </div>
            <div class="article">
                <ul>
                            <?php
            $categoryCache=S('category');
            $modelCache = S('model');
            $mid='';//模型mid
            $mid = $mid?intval($mid):Q('mid',1,'intval');
            $cid =0;
            $cid = $cid?$cid:Q('cid',0,'intval');
            //如果有栏目取栏目的mid为$mid值
            if($cid){
                $mid=$categoryCache[$cid]['mid'];
            }
            $order ='';
            $flag='';
            $noflag='';
            $sub_channel=1;
            //模型
            $table = $modelCache[$mid]['table_name'];
            $db = V($table);
            $db->view[$table] = array('_type' => "INNER");
            $db->view['category'] = array('_type' => 'INNER', '_on' => "category.cid=$table.cid");
            $db->view['user'] = array('_type' => 'INNER', '_on' => "user.uid=$table.uid");
            $db->view['model'] = array('_type' => 'INNER', '_on' => 'model.mid=category.mid');
            //---------------------------排序类型-------------------------------
             if($order){
                switch($order){
                    case 'hot':
                        //查看次数最多
                        $order='click DESC';
                        break;
                    case 'rand':
                        //随机排序
                        $order='rand()';
                        break;
                     case 'new':
                        //最新文章
                        $order='aid DESC';
                        break;
                    default:
                        $order= str_replace(array('aid','cid'), array($db->table.'.aid','category.cid'), $order);
                }
            }else{
                $order='aid DESC';
            }
            //---------------------------查询条件-------------------------------
                $where=array();
                //子栏目处理
                if(!empty($cid)){
                    //查询条件
                    if($sub_channel){
                        $category = array_keys(Data::channelList($categoryCache,$cid));
                        $category[]=$cid;
                        $where[]="category.cid IN(".implode(',',$category).")";
                    }else{
                        $where[]="category.cid IN(".$cid.")";
                    }
                }
                //指定筛选属性flag='1,2,3'时,获取指定属性的文章
		        if($flag){
		            $flagCache =S('flag'.$mid);
		            $flag = explode(',',$flag);
		            foreach($flag as $f){
		                $f=$flagCache[$f-1];
		                $where[]="find_in_set('$f',flag)";
		            }
		        }
		        //排除flag
		        if($noflag){
		            $flagCache =S('flag'.$mid);
		            $noflag = explode(',',$noflag);
		            foreach($noflag as $f){
		                $f=$flagCache[$f-1];
		                $where[]="!find_in_set('$f',flag)";
		            }
		        }
                //已经审核的文章
                $where[]='content_status=1';
                //总条数
                $count = $db->where($where)->count();
                //分页设置
                if($cid){
                    $category=$categoryCache[$cid];
                    if($category['cat_url_type']==2){
                        //开启伪静态模型
                        if(C('REWRITE_ENGINE')){
                            Page::$staticUrl="m=Index&c=Category&a=index&cid=".$category['cid']."&page={page}";
                        }
                    }else{//静态
                        $html_path = C("HTML_PATH") ? C("HTML_PATH") . '/' : '';
                        Page::$staticUrl='http://127.0.0.1/houbeicms/'.$html_path.
                        str_replace(array('{catdir}','{cid}'),array($category['catdir'],$category['cid']),$category['cat_html_url']);
                    }
                }else{//首页
                    Page::$staticUrl=U('Index/Index/index',array('page'=>'{page}'));
                }
                $page= new Page($count,10);
                //-----------------------------------获取数据----------------------------------------
                $result= $db->where($where)->order($order)->limit($page->limit())->all();
                if($result):
                    foreach($result as $index=>$field):
                        $field=content_field($field);
                        $field['_index']=$index;
                        $field['_first']=$index==0?true:false;
                        $field['_last']=$index==(count($result)-1)?true:false;
                        $field['title']=mb_substr($field['title'],0,80,'utf8');
                        $field['title']=$field['color']?"<span style='color:".$field['color']."'>".$field['title']."</span>":$field['title'];
                        $field['description']=mb_substr($field['description'],0,80,'utf-8');
                         if($field['new_window'] || $field['redirecturl']){
                        	$field['link']='<a href="'.$field['url'].'" target="_blank">'.$field['title'].'</a>';
						}else{
							$field['link']='<a href="'.$field['url'].'">'.$field['title'].'</a>';
						}
                ?>
                    <li>
                        <div class="n-title">
                           <a href="<?php echo $field['caturl'];?>" class="category"> [<?php echo $field['catname'];?>]</a> <a href="<?php echo $field['url'];?>"><?php echo $field['title'];?> </a>
                        </div>
                        <div class="n-r">
                            <span class="r-click">浏览：<?php echo $field['click'];?></span>
                            <span class="r-time"> <?php echo date('m-d',$field['addtime']);?></span>
                        </div>
                    </li>
                    <?php endforeach;endif;?>
                </ul>
                <div class="page">
                            <?php if(is_object($page))echo $page->show(6,8);?>
                </div>
            </div>
        </div>
    </div>
    <!--右菜单-->
    <div class="menu">
        <dl>
            <dt>文章分类</dt>
                    <?php
        $type=strtolower(trim('son'));
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
                <dd><a href="<?php echo $field['caturl'];?>" class=""><?php echo $field['catname'];?></a></dd>
            <?php endforeach;}

        ?>
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
                <a href="http://127.0.0.1/houbeicms/index.php?g=Addon&m=Sitemap&c=Index&a=index">网站地图</a>
                <br>
                Copyright &copy 2015  www.houbei.cc, All Rights Reserved 后备网 版权所有 黔ICP备15000001号
            </div>
        </div>
    </div>
</div>
</body>
</html>