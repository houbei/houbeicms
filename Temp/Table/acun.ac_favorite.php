<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'fid' => 
  array (
    'field' => 'fid',
    'type' => 'int(11) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'user_id' => 
  array (
    'field' => 'user_id',
    'type' => 'int(11) unsigned',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'mid' => 
  array (
    'field' => 'mid',
    'type' => 'smallint(6) unsigned',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'cid' => 
  array (
    'field' => 'cid',
    'type' => 'smallint(6) unsigned',
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
  'title' => 
  array (
    'field' => 'title',
    'type' => 'char(200)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
);
?>