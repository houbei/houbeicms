<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta content="IE=11.0000" http-equiv="X-UA-Compatible" /> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <title><?php echo $hd['config']['WEBNAME'];?></title>
     <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/Static/hdjs/hdjs.css"/>
     <link type="text/css" rel="stylesheet" href="Template/default/css/common.css"/>
     <link href="http://127.0.0.1/houbeicms/Static/css/header.css" rel="stylesheet" type="text/css" />
     <link href="http://127.0.0.1/houbeicms/Static/css/index_style.css" rel="stylesheet" type="text/css" />

  <link href="http://127.0.0.1/houbeicms/Static/scroll/css/lanrenzhijia.css" rel="stylesheet" type="text/css" />
  <script src="http://127.0.0.1/houbeicms/Static/js/jquery-1.11.0.min.js"></script> 
<!--  <script src="http://127.0.0.1/houbeicms/Static/js/Effect.js"></script>-->
  <script src="http://127.0.0.1/houbeicms/Static/scroll/js/lanrenzhijia.js"></script> 
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
  <div class="BannerBox cWidth clearfix"> 
   <div class="Notc fr">
    <div class="Ctil clearfix Nwd_1 Teb_1"> 
     <span class="active">后备快报</span>
     <span><!--我们一直在进步--></span>
    </div> 
    <div class="NtcTxt">
                <?php
            $categoryCache=S('category');
            $modelCache = S('model');
            $mid='';//模型mid
            $mid = $mid?intval($mid):Q('mid',1,'intval');
            $cid ='52';
            $cid = $cid?explode(',',str_replace(' ','',$cid)):array(Q('cid',0,'intval'));
            //如果有栏目取栏目的mid为$mid值
            if($cid){
                $mid=$categoryCache[$cid[0]]['mid'];
            }
            $aid='';
            $order ='';
            $flag='';//有此flag
            $noflag='';//除了flag
            $sub_channel=1;//包含子栏目数据
            $relative=0;//相关文章
            //模型
            $table = $modelCache[$mid]['table_name'];
            $db = V($table);
            $db->view[$table] = array('_type' => "INNER");
            $db->view['category'] = array('_type' => 'INNER', '_on' => "category.cid=$table.cid");
            $db->view['user'] = array('_type' => 'INNER', '_on' => "user.uid=$table.uid");
            $db->view['model'] = array('_type' => 'INNER', '_on' => 'model.mid=category.mid');
            $where=array();
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
                //相关文章
                if($relative){
                    //与本文相关的，按标签相关联的
                    if($aid=Q('aid',0,'intval')){
                        $tid = M('content_tag')->where("mid=$mid AND aid=$currentAid")->getField('tid',true);
                        if($tid){
                            $map=array(
                                'tid'=>array('IN',$tid),
                                'aid'=>array('NEQ',$aid)
                            );
                            $aids = M('content_tag')->where($_tid)->group('aid')->limit(10)->getField('aid',true);
                            if(!empty($aids)){
                               $where['aid']=array('IN',$aids);
                            }
                        }
                    }
                }
                //子栏目处理
                if(!empty($cid)){
                    //查询条件
                    if($sub_channel){
                        $category = array_keys(Data::channelList($categoryCache,$cid[0]));
                        $category[]=$cid[0];
                        $where[]="category.cid IN(".implode(',',$category).")";
                    }else{
                        $where[]="category.cid IN(".implode(',',$cid).")";
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
                //指定文章
                if ($aid) {
                    $where['aid']=array('IN',$aid);
                }
                //已经审核的文章
                $where[]='content_status=1';
                //---------------------------------指定显示条数--------------------------------------
                $db->limit(10);
                //-----------------------------------获取数据----------------------------------------
                $result = $db->order($order)->where($where)->all();
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
            <p><?php echo $field['_index'];?>．<a href="<?php echo $field['url'];?>" target="_blank"><?php echo $field['title'];?></a></p>
        <?php endforeach;endif;
                    unset($where);
                ?>
        <div class="More_1">
            <a class="Grad CreatBtn" style="color: #FAFAFA;" href="#">查看更多</a>
        </div>
    </div> 
    <!--<div class="NtcTxt Hide_Box">
        &lt;!&ndash;         <?php
            $categoryCache=S('category');
            $modelCache = S('model');
            $mid='';//模型mid
            $mid = $mid?intval($mid):Q('mid',1,'intval');
            $cid ='53';
            $cid = $cid?explode(',',str_replace(' ','',$cid)):array(Q('cid',0,'intval'));
            //如果有栏目取栏目的mid为$mid值
            if($cid){
                $mid=$categoryCache[$cid[0]]['mid'];
            }
            $aid='';
            $order ='new';
            $flag='';//有此flag
            $noflag='';//除了flag
            $sub_channel=1;//包含子栏目数据
            $relative=0;//相关文章
            //模型
            $table = $modelCache[$mid]['table_name'];
            $db = V($table);
            $db->view[$table] = array('_type' => "INNER");
            $db->view['category'] = array('_type' => 'INNER', '_on' => "category.cid=$table.cid");
            $db->view['user'] = array('_type' => 'INNER', '_on' => "user.uid=$table.uid");
            $db->view['model'] = array('_type' => 'INNER', '_on' => 'model.mid=category.mid');
            $where=array();
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
                //相关文章
                if($relative){
                    //与本文相关的，按标签相关联的
                    if($aid=Q('aid',0,'intval')){
                        $tid = M('content_tag')->where("mid=$mid AND aid=$currentAid")->getField('tid',true);
                        if($tid){
                            $map=array(
                                'tid'=>array('IN',$tid),
                                'aid'=>array('NEQ',$aid)
                            );
                            $aids = M('content_tag')->where($_tid)->group('aid')->limit(1)->getField('aid',true);
                            if(!empty($aids)){
                               $where['aid']=array('IN',$aids);
                            }
                        }
                    }
                }
                //子栏目处理
                if(!empty($cid)){
                    //查询条件
                    if($sub_channel){
                        $category = array_keys(Data::channelList($categoryCache,$cid[0]));
                        $category[]=$cid[0];
                        $where[]="category.cid IN(".implode(',',$category).")";
                    }else{
                        $where[]="category.cid IN(".implode(',',$cid).")";
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
                //指定文章
                if ($aid) {
                    $where['aid']=array('IN',$aid);
                }
                //已经审核的文章
                $where[]='content_status=1';
                //---------------------------------指定显示条数--------------------------------------
                $db->limit(1);
                //-----------------------------------获取数据----------------------------------------
                $result = $db->order($order)->where($where)->all();
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
        <?php echo $field['title'];?>
        <?php echo $hdcms['content'];?>
         <?php p($field);?>
        <?php endforeach;endif;
                    unset($where);
                ?> &ndash;&gt;
     <p>1月10日 修复首页搜索下拉框文字错误。</p> 
     <p>1月10日 修复生成静态后第1页不存在问题</p> 
     <p>1月10日 新增内容关键词替换插件(增强网站SEO)</p> 
     <p>1月10日 修复中文分词Tag词典路径错误</p>
     <div class="More_1"> 
      <a href="#">查看更多</a> 
     </div> 
    </div> -->
   </div>
   <!--焦点图--> 
   <div class="Banner fl"> 
      <div class="ctrl-panel">
        <A class=m-page href="javascript:;" rel=js_btn_list>1</A>
        <A class=m-page href="javascript:;" rel=js_btn_list>2</A>
        <A class=m-page href="javascript:;" rel=js_btn_list>3</A>
        <A class=m-page href="javascript:;" rel=js_btn_list>4</A>
      </div>
      <div class="scroll-wrap">
        <div class="scroll_box_content" rel="scroll_box_content">
          <div class=content_list><img onClick="location.href='#'" src="http://127.0.0.1/houbeicms/Static/images/java.jpg" /></div>
          <div class=content_list><img onClick="location.href='#'" src="http://127.0.0.1/houbeicms/Static/images/mysql.jpg" /></div>
          <div class=content_list><img onClick="location.href='#'" src="http://127.0.0.1/houbeicms/Static/images/php.jpg" /></div>
          <div class=content_list><img onClick="location.href='#'" src="http://127.0.0.1/houbeicms/Static/images/html.jpg" /></div>
        </div>
      </div>
  </div>
      <!--/焦点图-->
  </div> 
  <div class="h_20"></div> 
  <div class="AllCnt cWidth clearfix"> 
   <div class="AllCnt_L fl"> 
    <div class="ElAtc"> 
     <div class="Title"> 
      <h3>优秀文章</h3> 
     </div> 
     <div class="ElAtcCnt clearfix"> 
      <div class="Ctil clearfix Teb_7"> 
       <span class="active">最近更新</span> 
       <span><!--代码分享--></span>
       <span><!--项目展示--></span>
      </div> 
      <div class="AtcList"> 
       <ul> 
                  <?php
            $categoryCache=S('category');
            $modelCache = S('model');
            $mid='';//模型mid
            $mid = $mid?intval($mid):Q('mid',1,'intval');
            $cid ='1';
            $cid = $cid?explode(',',str_replace(' ','',$cid)):array(Q('cid',0,'intval'));
            //如果有栏目取栏目的mid为$mid值
            if($cid){
                $mid=$categoryCache[$cid[0]]['mid'];
            }
            $aid='';
            $order ='';
            $flag='';//有此flag
            $noflag='';//除了flag
            $sub_channel=1;//包含子栏目数据
            $relative=0;//相关文章
            //模型
            $table = $modelCache[$mid]['table_name'];
            $db = V($table);
            $db->view[$table] = array('_type' => "INNER");
            $db->view['category'] = array('_type' => 'INNER', '_on' => "category.cid=$table.cid");
            $db->view['user'] = array('_type' => 'INNER', '_on' => "user.uid=$table.uid");
            $db->view['model'] = array('_type' => 'INNER', '_on' => 'model.mid=category.mid');
            $where=array();
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
                //相关文章
                if($relative){
                    //与本文相关的，按标签相关联的
                    if($aid=Q('aid',0,'intval')){
                        $tid = M('content_tag')->where("mid=$mid AND aid=$currentAid")->getField('tid',true);
                        if($tid){
                            $map=array(
                                'tid'=>array('IN',$tid),
                                'aid'=>array('NEQ',$aid)
                            );
                            $aids = M('content_tag')->where($_tid)->group('aid')->limit(6)->getField('aid',true);
                            if(!empty($aids)){
                               $where['aid']=array('IN',$aids);
                            }
                        }
                    }
                }
                //子栏目处理
                if(!empty($cid)){
                    //查询条件
                    if($sub_channel){
                        $category = array_keys(Data::channelList($categoryCache,$cid[0]));
                        $category[]=$cid[0];
                        $where[]="category.cid IN(".implode(',',$category).")";
                    }else{
                        $where[]="category.cid IN(".implode(',',$cid).")";
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
                //指定文章
                if ($aid) {
                    $where['aid']=array('IN',$aid);
                }
                //已经审核的文章
                $where[]='content_status=1';
                //---------------------------------指定显示条数--------------------------------------
                $db->limit(6);
                //-----------------------------------获取数据----------------------------------------
                $result = $db->order($order)->where($where)->all();
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
            <li class="clearfix"> <span class="Nuber"><?php echo $field['_index'];?></span>
              <strong class="AcTil"><a href="<?php echo $field['url'];?>" target="_blank"><?php echo $field['title'];?></a></strong>
            <span class="datetime"><?php echo $field['time'];?></span>
            </li>
          <?php endforeach;endif;
                    unset($where);
                ?>
       </ul> 
       <div class="More_1"> 
        <a href="#">查看更多</a> 
       </div> 
      </div> 
<!--      <div class="AtcList Hide_Box">
       <ul> 
                  <?php
            $categoryCache=S('category');
            $modelCache = S('model');
            $mid='';//模型mid
            $mid = $mid?intval($mid):Q('mid',1,'intval');
            $cid ='1';
            $cid = $cid?explode(',',str_replace(' ','',$cid)):array(Q('cid',0,'intval'));
            //如果有栏目取栏目的mid为$mid值
            if($cid){
                $mid=$categoryCache[$cid[0]]['mid'];
            }
            $aid='';
            $order ='';
            $flag='';//有此flag
            $noflag='';//除了flag
            $sub_channel=1;//包含子栏目数据
            $relative=0;//相关文章
            //模型
            $table = $modelCache[$mid]['table_name'];
            $db = V($table);
            $db->view[$table] = array('_type' => "INNER");
            $db->view['category'] = array('_type' => 'INNER', '_on' => "category.cid=$table.cid");
            $db->view['user'] = array('_type' => 'INNER', '_on' => "user.uid=$table.uid");
            $db->view['model'] = array('_type' => 'INNER', '_on' => 'model.mid=category.mid');
            $where=array();
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
                //相关文章
                if($relative){
                    //与本文相关的，按标签相关联的
                    if($aid=Q('aid',0,'intval')){
                        $tid = M('content_tag')->where("mid=$mid AND aid=$currentAid")->getField('tid',true);
                        if($tid){
                            $map=array(
                                'tid'=>array('IN',$tid),
                                'aid'=>array('NEQ',$aid)
                            );
                            $aids = M('content_tag')->where($_tid)->group('aid')->limit(6)->getField('aid',true);
                            if(!empty($aids)){
                               $where['aid']=array('IN',$aids);
                            }
                        }
                    }
                }
                //子栏目处理
                if(!empty($cid)){
                    //查询条件
                    if($sub_channel){
                        $category = array_keys(Data::channelList($categoryCache,$cid[0]));
                        $category[]=$cid[0];
                        $where[]="category.cid IN(".implode(',',$category).")";
                    }else{
                        $where[]="category.cid IN(".implode(',',$cid).")";
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
                //指定文章
                if ($aid) {
                    $where['aid']=array('IN',$aid);
                }
                //已经审核的文章
                $where[]='content_status=1';
                //---------------------------------指定显示条数--------------------------------------
                $db->limit(6);
                //-----------------------------------获取数据----------------------------------------
                $result = $db->order($order)->where($where)->all();
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
            <li class="clearfix"> <span class="Nuber"><?php echo $field['_index'];?></span>
              <strong class="AcTil"><a href="<?php echo $field['url'];?>" target="_blank"><?php echo $field['title'];?></a></strong>
            <span class="datetime"><?php echo $field['time'];?></span>
            </li>
          <?php endforeach;endif;
                    unset($where);
                ?>
       </ul> 
       <div class="More_1"> 
        &lt;!&ndash;a href="#">查看更多</a&ndash;&gt;
       </div> 
      </div> 
      <div class="AtcList Hide_Box"> 
       <ul> 
                  <?php
            $categoryCache=S('category');
            $modelCache = S('model');
            $mid='';//模型mid
            $mid = $mid?intval($mid):Q('mid',1,'intval');
            $cid ='1';
            $cid = $cid?explode(',',str_replace(' ','',$cid)):array(Q('cid',0,'intval'));
            //如果有栏目取栏目的mid为$mid值
            if($cid){
                $mid=$categoryCache[$cid[0]]['mid'];
            }
            $aid='';
            $order ='';
            $flag='';//有此flag
            $noflag='';//除了flag
            $sub_channel=1;//包含子栏目数据
            $relative=0;//相关文章
            //模型
            $table = $modelCache[$mid]['table_name'];
            $db = V($table);
            $db->view[$table] = array('_type' => "INNER");
            $db->view['category'] = array('_type' => 'INNER', '_on' => "category.cid=$table.cid");
            $db->view['user'] = array('_type' => 'INNER', '_on' => "user.uid=$table.uid");
            $db->view['model'] = array('_type' => 'INNER', '_on' => 'model.mid=category.mid');
            $where=array();
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
                //相关文章
                if($relative){
                    //与本文相关的，按标签相关联的
                    if($aid=Q('aid',0,'intval')){
                        $tid = M('content_tag')->where("mid=$mid AND aid=$currentAid")->getField('tid',true);
                        if($tid){
                            $map=array(
                                'tid'=>array('IN',$tid),
                                'aid'=>array('NEQ',$aid)
                            );
                            $aids = M('content_tag')->where($_tid)->group('aid')->limit(6)->getField('aid',true);
                            if(!empty($aids)){
                               $where['aid']=array('IN',$aids);
                            }
                        }
                    }
                }
                //子栏目处理
                if(!empty($cid)){
                    //查询条件
                    if($sub_channel){
                        $category = array_keys(Data::channelList($categoryCache,$cid[0]));
                        $category[]=$cid[0];
                        $where[]="category.cid IN(".implode(',',$category).")";
                    }else{
                        $where[]="category.cid IN(".implode(',',$cid).")";
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
                //指定文章
                if ($aid) {
                    $where['aid']=array('IN',$aid);
                }
                //已经审核的文章
                $where[]='content_status=1';
                //---------------------------------指定显示条数--------------------------------------
                $db->limit(6);
                //-----------------------------------获取数据----------------------------------------
                $result = $db->order($order)->where($where)->all();
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
            <li class="clearfix"> <span class="Nuber"><?php echo $field['_index'];?></span>
              <strong class="AcTil"><a href="<?php echo $field['url'];?>" target="_blank"><?php echo $field['title'];?></a></strong>
            <span class="datetime"><?php echo $field['time'];?></span>
            </li>
          <?php endforeach;endif;
                    unset($where);
                ?>
       </ul> 
       <div class="More_1"> 
        &lt;!&ndash;a href="#">查看更多</a&ndash;&gt;
       </div> 
      </div> -->
     </div> 
    </div> 
 
   </div> 
   <div class="AllCnt_R fr"> 
    <div class="LdBdr"> 
     <div class="Title Ntil_2"> 
      <h3>人气排行榜</h3>
     </div> 
     <div class="LdBdrCnt clearfix"> 
      <div class="Ctil clearfix Nwd Teb_4"> 
       <span class="active">热门文章</span>
       <span><!--评论--></span>
       <span><!--关注--></span>
      </div> 
      <div class="LbList"> 
       <div class="Tlist"> 
        <ul> 
                <?php
            $categoryCache=S('category');
            $modelCache = S('model');
            $mid='';//模型mid
            $mid = $mid?intval($mid):Q('mid',1,'intval');
            $cid ='1';
            $cid = $cid?explode(',',str_replace(' ','',$cid)):array(Q('cid',0,'intval'));
            //如果有栏目取栏目的mid为$mid值
            if($cid){
                $mid=$categoryCache[$cid[0]]['mid'];
            }
            $aid='';
            $order ='';
            $flag='';//有此flag
            $noflag='';//除了flag
            $sub_channel=1;//包含子栏目数据
            $relative=0;//相关文章
            //模型
            $table = $modelCache[$mid]['table_name'];
            $db = V($table);
            $db->view[$table] = array('_type' => "INNER");
            $db->view['category'] = array('_type' => 'INNER', '_on' => "category.cid=$table.cid");
            $db->view['user'] = array('_type' => 'INNER', '_on' => "user.uid=$table.uid");
            $db->view['model'] = array('_type' => 'INNER', '_on' => 'model.mid=category.mid');
            $where=array();
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
                //相关文章
                if($relative){
                    //与本文相关的，按标签相关联的
                    if($aid=Q('aid',0,'intval')){
                        $tid = M('content_tag')->where("mid=$mid AND aid=$currentAid")->getField('tid',true);
                        if($tid){
                            $map=array(
                                'tid'=>array('IN',$tid),
                                'aid'=>array('NEQ',$aid)
                            );
                            $aids = M('content_tag')->where($_tid)->group('aid')->limit(6)->getField('aid',true);
                            if(!empty($aids)){
                               $where['aid']=array('IN',$aids);
                            }
                        }
                    }
                }
                //子栏目处理
                if(!empty($cid)){
                    //查询条件
                    if($sub_channel){
                        $category = array_keys(Data::channelList($categoryCache,$cid[0]));
                        $category[]=$cid[0];
                        $where[]="category.cid IN(".implode(',',$category).")";
                    }else{
                        $where[]="category.cid IN(".implode(',',$cid).")";
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
                //指定文章
                if ($aid) {
                    $where['aid']=array('IN',$aid);
                }
                //已经审核的文章
                $where[]='content_status=1';
                //---------------------------------指定显示条数--------------------------------------
                $db->limit(6);
                //-----------------------------------获取数据----------------------------------------
                $result = $db->order($order)->where($where)->all();
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
         <li class="clearfix">
            <span class="Nuber"><?php echo $field['_index'];?></span>
            <strong class="LbTil fl">
              <a href="<?php echo $field['url'];?>" target="_blank"><?php echo $field['title'];?></a>
            </strong>
            <span class="datetime"><?php echo $field['time'];?></span>
          </li> 
        <?php endforeach;endif;
                    unset($where);
                ?>
        </ul>
           <div class="More">
               <a href="#">查看更多</a>
           </div>
       </div> 
      </div> 
    <!--  <div class="LbList Hide_Box">
       <div class="Tlist"> 
        <ul> 
                <?php
            $categoryCache=S('category');
            $modelCache = S('model');
            $mid='';//模型mid
            $mid = $mid?intval($mid):Q('mid',1,'intval');
            $cid ='1';
            $cid = $cid?explode(',',str_replace(' ','',$cid)):array(Q('cid',0,'intval'));
            //如果有栏目取栏目的mid为$mid值
            if($cid){
                $mid=$categoryCache[$cid[0]]['mid'];
            }
            $aid='';
            $order ='';
            $flag='';//有此flag
            $noflag='';//除了flag
            $sub_channel=1;//包含子栏目数据
            $relative=0;//相关文章
            //模型
            $table = $modelCache[$mid]['table_name'];
            $db = V($table);
            $db->view[$table] = array('_type' => "INNER");
            $db->view['category'] = array('_type' => 'INNER', '_on' => "category.cid=$table.cid");
            $db->view['user'] = array('_type' => 'INNER', '_on' => "user.uid=$table.uid");
            $db->view['model'] = array('_type' => 'INNER', '_on' => 'model.mid=category.mid');
            $where=array();
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
                //相关文章
                if($relative){
                    //与本文相关的，按标签相关联的
                    if($aid=Q('aid',0,'intval')){
                        $tid = M('content_tag')->where("mid=$mid AND aid=$currentAid")->getField('tid',true);
                        if($tid){
                            $map=array(
                                'tid'=>array('IN',$tid),
                                'aid'=>array('NEQ',$aid)
                            );
                            $aids = M('content_tag')->where($_tid)->group('aid')->limit(6)->getField('aid',true);
                            if(!empty($aids)){
                               $where['aid']=array('IN',$aids);
                            }
                        }
                    }
                }
                //子栏目处理
                if(!empty($cid)){
                    //查询条件
                    if($sub_channel){
                        $category = array_keys(Data::channelList($categoryCache,$cid[0]));
                        $category[]=$cid[0];
                        $where[]="category.cid IN(".implode(',',$category).")";
                    }else{
                        $where[]="category.cid IN(".implode(',',$cid).")";
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
                //指定文章
                if ($aid) {
                    $where['aid']=array('IN',$aid);
                }
                //已经审核的文章
                $where[]='content_status=1';
                //---------------------------------指定显示条数--------------------------------------
                $db->limit(6);
                //-----------------------------------获取数据----------------------------------------
                $result = $db->order($order)->where($where)->all();
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
         <li class="clearfix">
            <span class="Nuber"><?php echo $field['_index'];?></span>
            <strong class="LbTil fl">
              <a href="<?php echo $field['url'];?>" target="_blank"><?php echo $field['title'];?></a>
            </strong>
            <span class="datetime"><?php echo $field['time'];?></span>
          </li> 
        <?php endforeach;endif;
                    unset($where);
                ?>
        </ul>
        <div class="More"> 
         <a href="#" target="_blank">查看更多</a> 
        </div> 
       </div> 
      </div> 
      <div class="LbList Hide_Box"> 
       <div class="Tlist"> 
        <ul> 
                <?php
            $categoryCache=S('category');
            $modelCache = S('model');
            $mid='';//模型mid
            $mid = $mid?intval($mid):Q('mid',1,'intval');
            $cid ='1';
            $cid = $cid?explode(',',str_replace(' ','',$cid)):array(Q('cid',0,'intval'));
            //如果有栏目取栏目的mid为$mid值
            if($cid){
                $mid=$categoryCache[$cid[0]]['mid'];
            }
            $aid='';
            $order ='';
            $flag='';//有此flag
            $noflag='';//除了flag
            $sub_channel=1;//包含子栏目数据
            $relative=0;//相关文章
            //模型
            $table = $modelCache[$mid]['table_name'];
            $db = V($table);
            $db->view[$table] = array('_type' => "INNER");
            $db->view['category'] = array('_type' => 'INNER', '_on' => "category.cid=$table.cid");
            $db->view['user'] = array('_type' => 'INNER', '_on' => "user.uid=$table.uid");
            $db->view['model'] = array('_type' => 'INNER', '_on' => 'model.mid=category.mid');
            $where=array();
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
                //相关文章
                if($relative){
                    //与本文相关的，按标签相关联的
                    if($aid=Q('aid',0,'intval')){
                        $tid = M('content_tag')->where("mid=$mid AND aid=$currentAid")->getField('tid',true);
                        if($tid){
                            $map=array(
                                'tid'=>array('IN',$tid),
                                'aid'=>array('NEQ',$aid)
                            );
                            $aids = M('content_tag')->where($_tid)->group('aid')->limit(6)->getField('aid',true);
                            if(!empty($aids)){
                               $where['aid']=array('IN',$aids);
                            }
                        }
                    }
                }
                //子栏目处理
                if(!empty($cid)){
                    //查询条件
                    if($sub_channel){
                        $category = array_keys(Data::channelList($categoryCache,$cid[0]));
                        $category[]=$cid[0];
                        $where[]="category.cid IN(".implode(',',$category).")";
                    }else{
                        $where[]="category.cid IN(".implode(',',$cid).")";
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
                //指定文章
                if ($aid) {
                    $where['aid']=array('IN',$aid);
                }
                //已经审核的文章
                $where[]='content_status=1';
                //---------------------------------指定显示条数--------------------------------------
                $db->limit(6);
                //-----------------------------------获取数据----------------------------------------
                $result = $db->order($order)->where($where)->all();
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
         <li class="clearfix">
            <span class="Nuber"><?php echo $field['_index'];?></span>
            <strong class="LbTil fl">
              <a href="<?php echo $field['url'];?>" target="_blank"><?php echo $field['title'];?></a>
            </strong>
            <span class="datetime"><?php echo $field['time'];?></span>
          </li> 
        <?php endforeach;endif;
                    unset($where);
                ?>
        </ul>
        <div class="More"> 
         <a href="#=3" target="_blank">查看更多</a> 
        </div> 
       </div> 
      </div> -->
     </div> 
    </div>
     <div class="h_15"></div>
    </div>

  <div class="BotCntBox" style="float: left;text-align: center;">
    <img style="width:100%;height: 80px;" src="http://127.0.0.1/houbeicms/Static/images/ad.png">
  </div>
  </div>
      <?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="#" target="_blank">使用后备前必读</a>|
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