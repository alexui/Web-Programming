<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-03 22:12:39
         compiled from "table_entry.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16060551ef437945846-98479915%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5549750075137bcce331ba1d88759409ce478cb' => 
    array (
      0 => 'table_entry.tpl',
      1 => 1428088753,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16060551ef437945846-98479915',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'person' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_551ef437945843_70758057',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551ef437945843_70758057')) {function content_551ef437945843_70758057($_smarty_tpl) {?><tr>
    <td><?php echo $_smarty_tpl->tpl_vars['person']->value->name;?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['person']->value->age;?>
</td>
</tr><?php }} ?>
