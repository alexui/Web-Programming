<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-04-25 14:33:42
         compiled from "table_entry.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7166571e0ea6d2e287-34441804%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0281e77766c928b6d0003a6823084380d9faaadb' => 
    array (
      0 => 'table_entry.tpl',
      1 => 1461583487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7166571e0ea6d2e287-34441804',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'person' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_571e0ea6d2e287_49803244',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e0ea6d2e287_49803244')) {function content_571e0ea6d2e287_49803244($_smarty_tpl) {?><tr>
    <td><?php echo $_smarty_tpl->tpl_vars['person']->value->name;?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['person']->value->age;?>
</td>
</tr><?php }} ?>
