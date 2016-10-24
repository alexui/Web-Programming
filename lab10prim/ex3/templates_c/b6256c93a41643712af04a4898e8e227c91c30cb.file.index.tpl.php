<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-03 22:16:56
         compiled from "index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2728551ef538ef8734-05846003%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6256c93a41643712af04a4898e8e227c91c30cb' => 
    array (
      0 => 'index.tpl',
      1 => 1428088025,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2728551ef538ef8734-05846003',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'persons' => 0,
    'person' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_551ef53902b641_72461787',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551ef53902b641_72461787')) {function content_551ef53902b641_72461787($_smarty_tpl) {?><table>
    <thead>
        <tr>
            <th>
                Nume 
            </th>
            <th>
                Varsta 
            </th>
        </tr>
    </thead>
<?php  $_smarty_tpl->tpl_vars['person'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['person']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['persons']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['person']->key => $_smarty_tpl->tpl_vars['person']->value) {
$_smarty_tpl->tpl_vars['person']->_loop = true;
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['person']->value->name;?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['person']->value->age;?>
</td>
    </tr>
<?php } ?>
</table>

<style>
    table, th, td {
        border: 1px solid black;
    }
</style><?php }} ?>
