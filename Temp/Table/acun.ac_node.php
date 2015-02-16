<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'nid' => 
  array (
    'field' => 'nid',
    'type' => 'smallint(6)',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'title' => 
  array (
    'field' => 'title',
    'type' => 'char(200)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'group' => 
  array (
    'field' => 'group',
    'type' => 'char(200)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'module' => 
  array (
    'field' => 'module',
    'type' => 'char(200)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'controller' => 
  array (
    'field' => 'controller',
    'type' => 'char(200)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'action' => 
  array (
    'field' => 'action',
    'type' => 'char(200)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'param' => 
  array (
    'field' => 'param',
    'type' => 'char(255)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'comment' => 
  array (
    'field' => 'comment',
    'type' => 'varchar(255)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'is_show' => 
  array (
    'field' => 'is_show',
    'type' => 'tinyint(4)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'type' => 
  array (
    'field' => 'type',
    'type' => 'tinyint(1) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '2',
    'extra' => '',
  ),
  'pid' => 
  array (
    'field' => 'pid',
    'type' => 'mediumint(6)',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'list_order' => 
  array (
    'field' => 'list_order',
    'type' => 'mediumint(6)',
    'null' => 'NO',
    'key' => false,
    'default' => '100',
    'extra' => '',
  ),
  'is_system' => 
  array (
    'field' => 'is_system',
    'type' => 'tinyint(1)',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'favorite' => 
  array (
    'field' => 'favorite',
    'type' => 'tinyint(1)',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
);
?>