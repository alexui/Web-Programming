<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-04-25 14:09:03
         compiled from "table_entry.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1539571e08df9fe8f0-21865122%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8edafefb09f4b44936b79725c2929ede993d9849' => 
    array (
      0 => 'table_entry.tpl',
      1 => 1461583487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1539571e08df9fe8f0-21865122',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'expense' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_571e08df9fe8f6_65951147',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e08df9fe8f6_65951147')) {function content_571e08df9fe8f6_65951147($_smarty_tpl) {?><tr>
    <td><?php echo $_smarty_tpl->tpl_vars['expense']->value->amount;?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['expense']->value->details;?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['expense']->value->date;?>
</td>
</tr><?php }} ?>
