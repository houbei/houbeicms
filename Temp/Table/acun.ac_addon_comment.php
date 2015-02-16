<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'comment_id' => 
  array (
    'field' => 'comment_id',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'user_id' => 
  array (
    'field' => 'user_id',
    'type' => 'int(10) unsigned',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'comment_content' => 
  array (
    'field' => 'comment_content',
    'type' => 'text',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'comment_time' => 
  array (
    'field' => 'comment_time',
    'type' => 'int(11)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'cid' => 
  array (
    'field' => 'cid',
    'type' => 'smallint(5) unsigned',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'aid' => 
  array (
    'field' => 'aid',
    'type' => 'int(10) unsigned',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'status' => 
  array (
    'field' => 'status',
    'type' => 'tinyint(1) unsigned',
    'null' => 'YES',
    'key' => false,
    'default' => '1',
    'extra' => '',
  ),
  'praise' => 
  array (
    'field' => 'praise',
    'type' => 'int(11)',
    'null' => 'YES',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
);
?>