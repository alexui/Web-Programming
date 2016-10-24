<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-03 22:31:19
         compiled from "table_entry.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24829551ef701805fc0-09186250%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2694716b916ef2b980b44a345d67cc37a6cb126b' => 
    array (
      0 => 'table_entry.tpl',
      1 => 1428093078,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24829551ef701805fc0-09186250',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_551ef70182d0c9_50580743',
  'variables' => 
  array (
    'expense' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551ef70182d0c9_50580743')) {function content_551ef70182d0c9_50580743($_smarty_tpl) {?><tr>
    <td><?php echo $_smarty_tpl->tpl_vars['expense']->value->amount;?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['expense']->value->details;?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['expense']->value->date;?>
</td>
</tr><?php }} ?>
