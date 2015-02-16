<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'id' => 
  array (
    'field' => 'id',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'cgid' => 
  array (
    'field' => 'cgid',
    'type' => 'mediumint(9)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'name' => 
  array (
    'field' => 'name',
    'type' => 'varchar(45)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'value' => 
  array (
    'field' => 'value',
    'type' => 'text',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'title' => 
  array (
    'field' => 'title',
    'type' => 'char(30)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'show_type' => 
  array (
    'field' => 'show_type',
    'type' => 'enum(\'text\',\'radio\',\'textarea\',\'select\',\'group\')',
    'null' => 'YES',
    'key' => false,
    'default' => 'text',
    'extra' => '',
  ),
  'info' => 
  array (
    'field' => 'info',
    'type' => 'text',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'message' => 
  array (
    'field' => 'message',
    'type' => 'varchar(255)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'order_list' => 
  array (
    'field' => 'order_list',
    'type' => 'smallint(6) unsigned',
    'null' => 'YES',
    'key' => false,
    'default' => '100',
    'extra' => '',
  ),
  'status' => 
  array (
    'field' => 'status',
    'type' => 'tinyint(4)',
    'null' => 'YES',
    'key' => false,
    'default' => '1',
    'extra' => '',
  ),
  'system' => 
  array (
    'field' => 'system',
    'type' => 'tinyint(1)',
    'null' => 'YES',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
);
?>