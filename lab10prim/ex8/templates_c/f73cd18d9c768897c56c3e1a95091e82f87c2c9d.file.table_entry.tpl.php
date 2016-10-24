<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-03 22:33:41
         compiled from "table_entry.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20204551ef925b43360-64121302%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f73cd18d9c768897c56c3e1a95091e82f87c2c9d' => 
    array (
      0 => 'table_entry.tpl',
      1 => 1428088753,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20204551ef925b43360-64121302',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'person' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_551ef925b56bf3_58813353',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551ef925b56bf3_58813353')) {function content_551ef925b56bf3_58813353($_smarty_tpl) {?><tr>
    <td><?php echo $_smarty_tpl->tpl_vars['person']->value->name;?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['person']->value->age;?>
</td>
</tr><?php }} ?>
