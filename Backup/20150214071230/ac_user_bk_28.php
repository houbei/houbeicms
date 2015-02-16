<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user (`uid`,`nickname`,`username`,`password`,`code`,`email`,`regtime`,`logintime`,`regip`,`lastip`,`user_status`,`lock_end_time`,`qq`,`sex`,`credits`,`rid`,`signature`,`spec_num`,`icon`)
						VALUES(1,'admin','admin','3cd5a93a85a2afec668d327488ae800c','6330c90011','805567188@qq.com',1419660949,1417190096,'0.0.0.0','127.0.0.1',1,0,'2300071698',1,10000,1,'后盾网 人人做后盾',141,'')");
