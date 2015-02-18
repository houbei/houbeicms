<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."favorite (`fid`,`user_id`,`mid`,`cid`,`aid`,`title`)
						VALUES('1','1','1','4','1','这是第一篇测试文章的标题')");
