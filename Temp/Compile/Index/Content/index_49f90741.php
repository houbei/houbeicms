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
