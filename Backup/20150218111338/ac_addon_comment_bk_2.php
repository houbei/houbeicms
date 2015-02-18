<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."addon_comment (`comment_id`,`user_id`,`comment_content`,`comment_time`,`cid`,`aid`,`status`,`praise`)
						VALUES('9','1','1112222','1424075917','4','1','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."addon_comment (`comment_id`,`user_id`,`comment_content`,`comment_time`,`cid`,`aid`,`status`,`praise`)
						VALUES('10','1','2222222222222222','1424075921','4','1','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."addon_comment (`comment_id`,`user_id`,`comment_content`,`comment_time`,`cid`,`aid`,`status`,`praise`)
						VALUES('11','1','www.houbei.cc','1424075963','4','1','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."addon_comment (`comment_id`,`user_id`,`comment_content`,`comment_time`,`cid`,`aid`,`status`,`praise`)
						VALUES('12','1','http://www.houbei.cc/','1424075999','4','1','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."addon_comment (`comment_id`,`user_id`,`comment_content`,`comment_time`,`cid`,`aid`,`status`,`praise`)
						VALUES('13','1','[code]
div#article-default div.position div.search input[type=text] {
  font-size: 14px;
  border: solid 1px #ccc;
  background: #f3f3f3;
  width: 205px;
  height: 30px;
  padding-left: 10px;
}
[/code]','1424184641','4','1','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."addon_comment (`comment_id`,`user_id`,`comment_content`,`comment_time`,`cid`,`aid`,`status`,`praise`)
						VALUES('2','1','111111111111','1424075835','8','2','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."addon_comment (`comment_id`,`user_id`,`comment_content`,`comment_time`,`cid`,`aid`,`status`,`praise`)
						VALUES('3','1','22222222','1424075843','8','2','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."addon_comment (`comment_id`,`user_id`,`comment_content`,`comment_time`,`cid`,`aid`,`status`,`praise`)
						VALUES('4','1','33333333333','1424075846','8','2','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."addon_comment (`comment_id`,`user_id`,`comment_content`,`comment_time`,`cid`,`aid`,`status`,`praise`)
						VALUES('5','1','44444444444','1424075850','8','2','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."addon_comment (`comment_id`,`user_id`,`comment_content`,`comment_time`,`cid`,`aid`,`status`,`praise`)
						VALUES('6','1','5555555555','1424075858','8','2','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."addon_comment (`comment_id`,`user_id`,`comment_content`,`comment_time`,`cid`,`aid`,`status`,`praise`)
						VALUES('7','1','33333333333','1424075865','8','2','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."addon_comment (`comment_id`,`user_id`,`comment_content`,`comment_time`,`cid`,`aid`,`status`,`praise`)
						VALUES('8','1','//调试模式
03	 define( \'DEBUG\', true );
04	 
05	//设置时区
06	date_default_timezone_set( \'PRC\' );
07	 
08	//应用目录
09	define( \'APP_PATH\', \'HDCMS/\' );
10	 
11	//Temp目录
12	define( \'TEMP_PATH\', \'Temp/\' );
13	 
14	//引入框架
15	require \'HDCMS/HDPHP/hdphp.php\';
16	</pre-->','1424075895','8','2','1','0')");
$db->exe("REPLACE INTO ".$db_prefix."addon_comment (`comment_id`,`user_id`,`comment_content`,`comment_time`,`cid`,`aid`,`status`,`praise`)
						VALUES('15','1','[code]
define(\'HDPHP_VERSION\', \'2014-12-09\');
defined(\"DEBUG\")        	or define(\"DEBUG\", FALSE);//调试模式
defined(\"DEBUG_TOOL\")       or define(\"DEBUG_TOOL\", FALSE);//调试工具
defined(\'APP_PATH\') 		or define(\'APP_PATH\', \'./Application/\');//应用目录
defined(\'TEMP_PATH\')    	or define(\'TEMP_PATH\', APP_PATH. \'Temp/\');
defined(\'TEMP_FILE\')    	or define(\'TEMP_FILE\',TEMP_PATH.\'~Boot.php\');//编译文件
//加载核心编译文件
if (!DEBUG and is_file(TEMP_FILE)) {
    require TEMP_FILE;
} else {
    //编译文件
    define(\'HDPHP_PATH\', str_replace(\'\\\\\',\'/\',dirname(__FILE__)) . \'/\');
    require HDPHP_PATH . \'Lib/Core/Boot.class.php\';
    Boot::run();
}
[/code]','1424185453','4','1','1','0')");
