<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<script>
    var root="http://127.0.0.1/houbeicms";
</script>
<script src="http://127.0.0.1/houbeicms/Static/jquery-1.11.1.min.js"></script>
<!--代码高亮-->
<script type="text/javascript" src="http://127.0.0.1/houbeicms/Static/SyntaxHighlighter/scripts/shCore.js"></script>
<script type="text/javascript" src="http://127.0.0.1/houbeicms/Static/SyntaxHighlighter/scripts/shBrushPhp.js"></script>
<link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/Static/SyntaxHighlighter/styles/shCore.css">
<link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/Static/SyntaxHighlighter/styles/shThemeDefault.css">
<script type="text/javascript">
    SyntaxHighlighter.config.clipboardSwf = 'http://127.0.0.1/houbeicms/Static/SyntaxHighlighter/scripts/clipboard.swf';
    SyntaxHighlighter.all();
</script>
<link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/Static/hdjs/hdjs.css"/>
<script type="text/javascript" src="http://127.0.0.1/houbeicms/Static/hdjs/hdjs.min.js"></script>
<script type="text/javascript" src="http://127.0.0.1/houbeicms/HDCMS/Addons/Comment/View/Comment/js/comment.js"></script>
<link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Addons/Comment/View/Comment/css/css.css"/>

<div id="comment">
    <div class="comment-total">
        网友评论，共<span id="total"><?php echo $count;?></span>条
    </div>
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
        <div class="comment-list" id="c-<?php echo $d['comment_id'];?>">
            <div class="icon">
                <img src="<?php echo icon($d['icon']);?>"/>
            </div>
            <div class="comment-body">
                <div class="comment-author">
                    <a href="javascript:;" class="c-user-name"><?php echo $d['username'];?></a>
                    <div class="comment-time">
                        <?php echo date_before($d['comment_time']);?>
                    </div>
                    <?php if (IS_LOGIN) { ?>
                        <a href="javascript:;" class="praise" onclick="praise(this,<?php echo $d['comment_id'];?>)">
                            赞(<?php echo $d['praise'];?>)
                        </a>
                    <?php } else { ?>
                        <a href="javascript:;" class="praise" style="color: #777777">
                            赞 (<?php echo $d['praise'];?>)
                        </a>
                    <?php } ?>
                    <?php if (IS_LOGIN && $d['user_id'] == $_SESSION['user']['uid']) { ?>
                        <a href="javascript:;"  onclick="delComment(<?php echo $d['comment_id'];?>)">删除</a>
                    <?php } ?>
                        <?php if(IS_LOGIN){ ?>
                    <div class="reply-link">
                        <a href="javascript:;"  onclick="reply(this,'')">
                            回复
                        </a>
                    </div>
                    <?php } ?>
                </div>
                <div class="comment-content">
                    <?php echo ContentSecurity($d['comment_content']);?>
                </div>
                <!--回复Start-->
                <div class="reply">
                    <!--回复Start-->
                    <div class="reply-list">
                                <?php
        //初始化
        $hd['list']['r'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($d['reply'])) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($d['reply'] as $r) {
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
                $hd['list'][r]['index']++;
                //第1个值
                $hd['list'][r]['first']=($listId == 0);
                //最后一个值
                $hd['list'][r]['last']= (count($d['reply'])-1 <= $listId);
                //总数
                $hd['list'][r]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
                            <!--内容Start-->
                            <div class="reply-body" id="r-<?php echo $r['reply_id'];?>">
                                <div class="reply-icon">
                                    <img src="<?php echo icon($r['icon']);?>"/>
                                </div>
                                <div class="reply-box">
                                    <div class="reply-author">
                                        <div class="user">
                                            <a href="javascript:;" class="c-user-name"><?php echo $r['username'];?></a> • <?php echo date_before($r['reply_time']);?>
                                        </div>
                                        <div class="reply-del">
                                            <?php if(isset($_SESSION['user'])){?>
                                                <?php if($_SESSION['user']['uid']==$r['user_id']){?>
                                                    <a href="javascript:;" onclick="delReply(<?php echo $r['comment_id'];?>,<?php echo $r['reply_id'];?>)">删除</a>
                                                <?php }?>
                                                <?php if($_SESSION['user']['uid']!=$r['user_id']){?>
                                                    <a href="javascript:;" onclick="reply(this,'<?php echo $r['username'];?>')">回复</a>
                                                <?php }?>
                                            <?php }?>
                                        </div>
                                    </div>
                                    <div class="reply-content">
                                        <?php echo ContentSecurity($r['reply_content']);?>
                                    </div>
                                </div>
                            </div>
                            <!--内容End-->
                        <?php }}?>
                    </div>
                    <?php if (IS_LOGIN) { ?>
                        <!--回复框-->
                        <div class="reply-form">
                            <form class="hd-form" onsubmit="return addReply(this,<?php echo $d['comment_id'];?>)" action="<?php echo U('addReply');?>">
                                <input type="hidden" name="cid" value="<?php echo $d['cid'];?>"/>
                                <input type="hidden" name="aid" value="<?php echo $d['aid'];?>"/>
                                <input type="hidden" name="comment_id" value="<?php echo $d['comment_id'];?>"/>
                                <textarea name="reply_content" class="reply-form" placeholder="评论一下..."></textarea>
                                <br/>
                                <input type="submit" value="确定" class="hd-btn hd-btn-sm"/>
                                <input type="button" value="取消" class="hd-btn hd-btn-sm" onclick="hideReplyForm(this)"/>
                            </form>
                        </div>
                        <!--回复End-->
                    <?php }?>
                </div>
                <!--回复End-->
            </div>
        </div>
    <?php }}?>
    <div class="comment-form">
        <?php if (IS_LOGIN) { ?>
                <form action="<?php echo U('addComment');?>" method="post" onsubmit="return addComment(this)">
                    <input type="hidden" name="cid" value="<?php echo $hd['get']['cid'];?>"/>
                    <input type="hidden" name="aid" value="<?php echo $hd['get']['aid'];?>"/>
                    <textarea name="comment_content" id="comment_content"></textarea>
                    <div class="submit">
                        <input type="submit" class="hd-btn hd-btn-success" value="评论"/>
                        使用[code][/code]标签可添加代码
                    </div>
                </form>
        <?php } else { ?>
            <p align="center">要回复请先 <a href="http://127.0.0.1/houbeicms/index.php?m=Member&c=Login&a=login" target="_top">
                    登录</a> 或
                <a href="http://127.0.0.1/houbeicms/index.php?m=Member&c=Login&a=reg" target="_top">注册
                </a>
            </p>
        <?php } ?>
    </div>
    <div class="hd-page">
        <?php
        if($page->totalPage>1){
            echo $page->show();
        }?>
    </div>
</div>