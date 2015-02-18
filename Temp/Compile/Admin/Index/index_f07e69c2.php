<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<?php if (!defined('HDPHP_PATH')) exit(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HDCMS永久免费 - <?php echo $hd['config']['webname'];?> - by HDCMS</title>
    <script type="text/javascript" src="http://127.0.0.1/houbeicms/Static/hdjs/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" href="http://127.0.0.1/houbeicms/Static/hdjs/hdjs.css"/>
    <script type="text/javascript" src="http://127.0.0.1/houbeicms/Static/hdjs/hdjs.min.js"></script>
    <script type='text/javascript'>
HOST = 'http://127.0.0.1';
ROOT = 'http://127.0.0.1/houbeicms';
WEB = 'http://127.0.0.1/houbeicms/index.php';
URL = 'http://127.0.0.1/houbeicms/index.php?m=Admin';
APP = 'http://127.0.0.1/houbeicms/Core';
COMMON = 'http://127.0.0.1/houbeicms/Core/Common';
HDPHP = 'http://127.0.0.1/houbeicms/Core/HDPHP';
HDPHP_DATA = 'http://127.0.0.1/houbeicms/Core/HDPHP/Data';
HDPHP_EXTEND = 'http://127.0.0.1/houbeicms/Core/HDPHP/Extend';
MODULE = 'http://127.0.0.1/houbeicms/index.php?m=Admin';
CONTROLLER = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Index';
ACTION = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Index&a=index';
STATIC = 'http://127.0.0.1/houbeicms/Static';
HDPHP_TPL = 'http://127.0.0.1/houbeicms/Core/HDPHP/Lib/Tpl';
VIEW = 'http://127.0.0.1/houbeicms/Core/Admin/View';
PUBLIC = 'http://127.0.0.1/houbeicms/Core/Admin/View/Public';
CONTROLLER_VIEW = 'http://127.0.0.1/houbeicms/Core/Admin/View/Index';
HISTORY = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Cache&a=updateCache';
</script>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/Core/Admin/View/Public/common.css"/>
</head>
<body>
<link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/Core/Admin/View/Index/css/css.css"/>
<script type="text/javascript" src="http://127.0.0.1/houbeicms/Core/Admin/View/Index/js/js.js"></script>
<div id="top-menu">
	<div class="t-l-menu">
		        <?php
        //初始化
        $hd['list']['m'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($node)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($node as $m) {
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
                $hd['list'][m]['last']= (count($node)-1 <= $listId);
                //总数
                $hd['list'][m]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
			<a href="javascript:"
			   onclick="topMenu(this,<?php echo $m['nid'];?>)"><?php echo $m['title'];?></a>
		<?php }}?>
	</div>
	<div class="t-r-menu">
		<?php echo $hd['session']['user']['rname'];?>: <?php echo $hd['session']['user']['username'];?> <a href="<?php echo U('Login/out');?>" target="_self">[退出]</a>
		<span>|</span>
		<a href="<?php echo U('Cache/index');?>" target="frame">更新全站缓存</a>
		<span>|</span>
		<a href="http://127.0.0.1/houbeicms/index.php" target="_blank">前台首页</a>
		<span>|</span>
		<a href="<?php echo U('Member/Index/index');?>" target="_blank">会员中心</a>
	</div>
</div>
<!--内容区Start-->
<div class="main">
	<!--左侧菜单Start-->
	<div id="leftMenu">
		        <?php
        //初始化
        $hd['list']['n'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($node)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($node as $n) {
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
                $hd['list'][n]['index']++;
                //第1个值
                $hd['list'][n]['first']=($listId == 0);
                //最后一个值
                $hd['list'][n]['last']= (count($node)-1 <= $listId);
                //总数
                $hd['list'][n]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
			<div id="<?php echo $n['nid'];?>" class="leftMenuBlock">
				        <?php
        //初始化
        $hd['list']['m'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($n['_data'])) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($n['_data'] as $m) {
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
                $hd['list'][m]['last']= (count($n['_data'])-1 <= $listId);
                //总数
                $hd['list'][m]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
					<dl>
						<dt><?php echo $m['title'];?></dt>
						        <?php
        //初始化
        $hd['list']['k'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($m['_data'])) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($m['_data'] as $k) {
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
                $hd['list'][k]['index']++;
                //第1个值
                $hd['list'][k]['first']=($listId == 0);
                //最后一个值
                $hd['list'][k]['last']= (count($m['_data'])-1 <= $listId);
                //总数
                $hd['list'][k]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
							<dd>
								<a href="javascript:;" target="frame"
								   onclick="runAction(this,'<?php echo $k['url'];?>',<?php echo $k['nid'];?>)"><?php echo $k['title'];?></a>
							</dd>
						<?php }}?>
					</dl>
				<?php }}?>
			</div>
		<?php }}?>
	</div>
	<!--左侧菜单End-->
	<!--右侧区域Start-->
	<div id="content">
		<!--快速导航Start-->
		<div id="historyMenu">
			<div id="leftBtn">向左按钮</div>
			<div id="historyMenuBox">
				<div id="historyMenuList">
					<ul>

					</ul>
				</div>
			</div>
			<div id="rightBtn">向右按钮</div>
		</div>
		<!--快速导航End-->
		<div class="show">
			<iframe src="" name="frame" id="frame" frameborder="0"></iframe>
		</div>
	</div>
	<!--右侧区域End-->
</div>
<!--内容区End-->
<!--底部快速导航Start-->
<div id="quickMenu">
	<div class="set">
		<a href="<?php echo U('FavoriteMenu/set');?>" target="frame">设置</a>
	</div>
	<div class="line"></div>

	<div class="menu-list">
		        <?php
        //初始化
        $hd['list']['q'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($quickMenu)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($quickMenu as $q) {
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
                $hd['list'][q]['index']++;
                //第1个值
                $hd['list'][q]['first']=($listId == 0);
                //最后一个值
                $hd['list'][q]['last']= (count($quickMenu)-1 <= $listId);
                //总数
                $hd['list'][q]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
			<a href="<?php echo $q['url'];?>" target="frame"><?php echo $q['title'];?></a>
		<?php }}?>
	</div>
</div>
<!--底部快速导航End-->
</body>
</html>