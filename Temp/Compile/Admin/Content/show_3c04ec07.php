<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<?php if (!defined('HDPHP_PATH')) exit(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HDCMS永久免费 - <?php echo $hd['config']['webname'];?> - by HDCMS</title>
    <script type="text/javascript" src="http://127.0.0.1/Static/hdjs/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" href="http://127.0.0.1/Static/hdjs/hdjs.css"/>
    <script type="text/javascript" src="http://127.0.0.1/Static/hdjs/hdjs.min.js"></script>
    <script type='text/javascript'>
HOST = 'http://127.0.0.1';
ROOT = 'http://127.0.0.1';
WEB = 'http://127.0.0.1/index.php';
URL = 'http://127.0.0.1/index.php?m=Admin&c=Content&a=show&cid=52&mid=1';
APP = 'http://127.0.0.1/HDCMS';
COMMON = 'http://127.0.0.1/HDCMS/Common';
HDPHP = 'http://127.0.0.1/HDCMS/HDPHP';
HDPHP_DATA = 'http://127.0.0.1/HDCMS/HDPHP/Data';
HDPHP_EXTEND = 'http://127.0.0.1/HDCMS/HDPHP/Extend';
MODULE = 'http://127.0.0.1/index.php?m=Admin';
CONTROLLER = 'http://127.0.0.1/index.php?m=Admin&c=Content';
ACTION = 'http://127.0.0.1/index.php?m=Admin&c=Content&a=show';
STATIC = 'http://127.0.0.1/Static';
HDPHP_TPL = 'http://127.0.0.1/HDCMS/HDPHP/Lib/Tpl';
VIEW = 'http://127.0.0.1/HDCMS/Admin/View';
PUBLIC = 'http://127.0.0.1/HDCMS/Admin/View/Public';
CONTROLLER_VIEW = 'http://127.0.0.1/HDCMS/Admin/View/Content';
HISTORY = 'http://127.0.0.1/index.php?m=Admin&c=Content&a=index';
</script>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/HDCMS/Admin/View/Public/common.css"/>
</head>
	<body>
    <script type="text/javascript" src="http://127.0.0.1/Static/cal/lhgcalendar.min.js"></script>
			<form class="hd-form" method="get">
				<input type="hidden" name="m" value="<?php echo $hd['get']['m'];?>"/>
                <input type="hidden" name="c" value="<?php echo $hd['get']['c'];?>"/>
                <input type="hidden" name="a" value="<?php echo $hd['get']['a'];?>"/>
				<input type="hidden" name="mid" value="<?php echo $hd['get']['mid'];?>"/>
				<input type="hidden" name="cid" value="<?php echo $hd['get']['cid'];?>"/>
				<input type="hidden" name="state" value="<?php echo $hd['get']['state'];?>"/>
				<div class="search">
					添加时间：
					<input id="begin_time" placeholder="开始时间" readonly="readonly" class="hd-w80" type="text" value="<?php echo $hd['get']['search_begin_time'];?>" name="search_begin_time">
					<script>
						$('#begin_time').calendar({
							format : 'yyyy-MM-dd'
						});
					</script>
					-
					<input id="end_time" placeholder="结束时间" readonly="readonly" class="hd-w80" type="text" value="<?php echo $hd['get']['search_end_time'];?>" name="search_end_time">
					<script>
						$('#end_time').calendar({
							format : 'yyyy-MM-dd'
						});
					</script>
					&nbsp;&nbsp;&nbsp;
					<select name="flag" class="hd-w100">
						<option selected="" value="">全部</option>
						        <?php
        //初始化
        $hd['list']['f'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($flag)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($flag as $f) {
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
                $hd['list'][f]['index']++;
                //第1个值
                $hd['list'][f]['first']=($listId == 0);
                //最后一个值
                $hd['list'][f]['last']= (count($flag)-1 <= $listId);
                //总数
                $hd['list'][f]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
							<option value="<?php echo $f;?>"     <?php if($hd['get']['flag']==$f){ ?>selected=''<?php } ?>><?php echo $f;?></option>
						<?php }}?>
					</select>
					&nbsp;&nbsp;&nbsp;
					<select name="search_type" class="hd-w100">
						<option value="1"     <?php if($hd['get']['search_type']==1){ ?>selected=''<?php } ?>>标题</option>
						<option value="2"     <?php if($hd['get']['search_type']==2){ ?>selected=''<?php } ?>>简介</option>
						<option value="3"     <?php if($hd['get']['search_type']==3){ ?>selected=''<?php } ?>>用户名</option>
						<option value="4"     <?php if($hd['get']['search_type']==4){ ?>selected=''<?php } ?>>用户uid</option>
					</select>&nbsp;&nbsp;&nbsp;
					关键字：
					<input class="hd-w200" type="text" placeholder="请输入关键字..." value="<?php echo $hd['get']['search_keyword'];?>" name="search_keyword">
					<button class="hd-btn hd-btn-xm" type="submit">
						搜索
					</button>
				</div>
			</form>
			<div class="hd-menu-list">
				<ul>
					<li     <?php if($hd['get']['content_status']==1){ ?>class="active"<?php } ?>>
						<a href="<?php echo U('show',array('mid'=>$_GET['mid'],'cid'=>$_GET['cid']));?>">
							内容列表
						</a>
					</li>
					<li     <?php if($hd['get']['content_status']==0){ ?>class="active"<?php } ?> >
						<a href="<?php echo U('show',array('mid'=>$_GET['mid'],'cid'=>$_GET['cid'],'content_status'=>0));?>">
							未审核
						</a>
					</li>
					<li>
						<a href="javascript:;" onclick="window.open('<?php echo U('add',array('mid'=>$_GET['mid'],'cid'=>$_GET['cid']));?>')">
							添加内容
						</a>
					</li>
				</ul>
			</div>
    <form onsubmit="return false" id="contentList">
			<table class="hd-table hd-table-list hd-form">
				<thead>
					<tr>
						<td class="hd-w30">
						    <input type="checkbox" id="selectAllContent"/>
						</td>
						<td class="hd-w30">aid</td>
						<td class="hd-w30">cid</td>
						<td class="hd-w30">排序</td>
						<td>标题</td>
						<td class="hd-w50">状态</td>
						<td class="hd-w100">作者</td>
						<td class="hd-w80">修改时间</td>
						<td class="hd-w120">操作</td>
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
						<input type="checkbox" name="aid[]" value="<?php echo $c['aid'];?>"/>
						</td>
						<td><?php echo $c['aid'];?></td>
						<td><?php echo $c['cid'];?></td>
						<td>
						<input type="text" class="hd-w30" value="<?php echo $c['arc_sort'];?>" name="arc_order[<?php echo $c['aid'];?>]"/>
						</td>
						<td>
						<a href="<?php echo U('Index/Content/index',array('mid'=>$c['mid'],'cid'=>$c['cid'],'aid'=>$c['aid']));?>" target="_blank">
							<?php echo mb_substr($c['title'],0,50,'utf-8');?>
						</a>
						    <?php if($c['flag']){ ?>
							<span style="color:#FF0000"> [<?php echo $c['flag'];?>]</span>
						<?php } ?></td>
						<td>
						    <?php if($c['content_status']==1){ ?>
							发表
						<?php } ?>
                                <?php if($c['content_status']==0){ ?>
							待审查
						<?php } ?>
                                <?php if($c['content_status']==2){ ?>
                                自动
                            <?php } ?>
                        </td>
						<td><?php echo $c['username'];?></td>
						<td><?php echo date("Y-m-d",$c['updatetime']);?></td>
						<td>
						<a href="<?php echo U('Index/Content/index',array('mid'=>$c['mid'],'cid'=>$c['cid'],'aid'=>$c['aid']));?>" target="_blank">
							访问
						</a>
                            <span class="line">|</span>
						<a href="javascript:;" onclick="window.open('<?php echo U(edit,array('cid'=>$_GET['cid'],'mid'=>$_GET['mid'],'aid'=>$c['aid']));?>')">
                            编辑
						</a>
                            <span class="line">|</span>
                            <a href="javascript:del(<?php echo $c['mid'];?>,<?php echo $c['cid'];?>,<?php echo $c['aid'];?>)">
							删除
						</a>
						</td>
					</tr>
				<?php }}?>
			</table>
			<div class="hd-page">
				<?php echo $page;?>
			</div>
            <input type="button" class="hd-btn hd-btn-xm" value="全选" onclick="select_all('.table2')"/>
            <input type="button" class="hd-btn hd-btn-xm" value="反选" onclick="reverse_select('.table2')"/>
            <input type="button" class="hd-btn hd-btn-xm" onclick="order(<?php echo $hd['get']['mid'];?>,<?php echo $hd['get']['cid'];?>)" value="更改排序"/>
            <input type="button" class="hd-btn hd-btn-xm" onclick="batchDel(<?php echo $hd['get']['mid'];?>,<?php echo $hd['get']['cid'];?>)" value="批量删除"/>
                <?php if($hd['get']['content_status']==0){ ?>
                <input type="button" class="hd-btn hd-btn-xm" onclick="audit(<?php echo $hd['get']['mid'];?>,<?php echo $hd['get']['cid'];?>,1)" value="审核"/>
            <?php } ?>
                <?php if($hd['get']['content_status']==1){ ?>
                <input type="button" class="hd-btn hd-btn-xm" onclick="audit(<?php echo $hd['get']['mid'];?>,<?php echo $hd['get']['cid'];?>,0)" value="取消审核"/>
            <?php } ?>
                <input type="button" class="hd-btn hd-btn-xm" onclick="move(<?php echo $hd['get']['mid'];?>,<?php echo $hd['get']['cid'];?>)" value="批量移动"/>
    </form>
        <script>
            //全选
            $("input#selectAllContent").click(function () {
                $("[type='checkbox']").attr("checked", $(this).attr("checked") == "checked");
            })
            //全选文章
            function select_all() {
                $("[type='checkbox']").attr("checked", "checked");
            }
            //反选文章
            function reverse_select() {
                $("[type='checkbox']").attr("checked", function () {
                    return !$(this).attr("checked") == 1;
                });
            }
            //更新排序
            function order(mid,cid) {
                if ($("input[type='text']").length == 0) {
                    alert('没有文章用来排序！');
                    return false;
                }
                var data = $("input[type='text']").serialize();
                hd_ajax(CONTROLLER + "&a=order&mid="+mid+"&cid=" + cid, data,'http://127.0.0.1/index.php?m=Admin&c=Content&a=show&cid=52&mid=1');
            }
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
                        hd_ajax('<?php echo U("del");?>', {mid:mid,cid:cid,aid: aid}, 'http://127.0.0.1/index.php?m=Admin&c=Content&a=show&cid=52&mid=1');
                    },
                    cancel: function () {//点击关闭后的事件

                    }
                });
            }
            /**
             * 批量删除文章
             */
            function batchDel(mid,cid){
                var aid=$("input[name*=aid]:checked").serialize();
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
                        hd_ajax('<?php echo U("batchDel",array("mid"=>$_GET['mid'],"cid"=>$_GET["cid"]));?>', aid, 'http://127.0.0.1/index.php?m=Admin&c=Content&a=show&cid=52&mid=1');
                    }
                });
            }
            /**
             * 设置状态
             */
            function audit(mid,cid, status) {
                var url = CONTROLLER + "&a=audit" + "&status=" + status + "&mid="+mid+"&cid=" + cid;
                var aid=$("input[name*=aid]:checked").serialize();
                if (aid) {
                    hd_ajax(url, aid, 'http://127.0.0.1/index.php?m=Admin&c=Content&a=show&cid=52&mid=1',1);
                } else {
                    hd_alert({
                        message: '请选择文章',//显示内容
                        timeout: 2
                    })
                }
            }
            /**
             * 移动文章
             * @param mid 模型mid
             * @param cid 当前栏目
             */
            function move(mid,cid) {
                var aid = '';
                $("input[name*=aid]:checked").each(function (i) {
                    aid += $(this).val() + "|";
                })
                aid = aid.slice(0, -1);
                if (aid) {
                    hd_modal({
                        width: 600,//宽度
                        height: 460,//高度
                        title: '文章移动',//标题
                        content: '<iframe style="width: 100%;height: 390px" src="' + CONTROLLER + '&a=move&mid='+mid+'&cid=' + cid + '&aid=' + aid + '" frameborder="0"></iframe>',//提示信息
                        button: false,//显示按钮
                        button_success: "确定",//确定按钮文字
                        button_cancel: "关闭",//关闭按钮文字
                        timeout: 0,//自动关闭时间 0：不自动关闭
                        shade: true,//背景遮罩
                        shadeOpacity: 0.2//背景透明度
                    });
                } else {
                    hd_alert({
                        message: '请选择文章',//显示内容
                        timeout: 3,//显示时间
                    })
                }
            }
        </script>
	</body>
</html>