<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<div class="comment-list" id="c-<?php echo $field['comment_id'];?>">
    <div class="icon">
        <img src="<?php echo icon($field['icon']);?>"/>
    </div>
    <div class="comment-body">
        <div class="comment-author">
            <a href="javascript:;" class="c-user-name"><?php echo $field['username'];?></a>
        </div>
        <div class="comment-content">
           <?php echo ContentSecurity($field['comment_content']);?>
        </div>
        <div class="comment-info">
            <div class="comment-time">
                <?php echo date_before($field['comment_time']);?>
            </div>
        </div>
    </div>
</div>