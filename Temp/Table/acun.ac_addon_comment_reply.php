<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'reply_id' => 
  array (
    'field' => 'reply_id',
    'type' => 'int(11) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'comment_id' => 
  array (
    'field' => 'comment_id',
    'type' => 'int(11)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'user_id' => 
  array (
    'field' => 'user_id',
    'type' => 'int(11)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'reply_time' => 
  array (
    'field' => 'reply_time',
    'type' => 'int(11)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'reply_content' => 
  array (
    'field' => 'reply_content',
    'type' => 'text',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
);
?>