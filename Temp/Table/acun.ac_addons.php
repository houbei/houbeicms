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
  'name' => 
  array (
    'field' => 'name',
    'type' => 'varchar(40)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'title' => 
  array (
    'field' => 'title',
    'type' => 'varchar(20)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'description' => 
  array (
    'field' => 'description',
    'type' => 'text',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'status' => 
  array (
    'field' => 'status',
    'type' => 'tinyint(1)',
    'null' => 'NO',
    'key' => false,
    'default' => '1',
    'extra' => '',
  ),
  'config' => 
  array (
    'field' => 'config',
    'type' => 'text',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'author' => 
  array (
    'field' => 'author',
    'type' => 'varchar(40)',
    'null' => 'YES',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'version' => 
  array (
    'field' => 'version',
    'type' => 'varchar(20)',
    'null' => 'YES',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'create_time' => 
  array (
    'field' => 'create_time',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'has_adminlist' => 
  array (
    'field' => 'has_adminlist',
    'type' => 'tinyint(1) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
);
?>