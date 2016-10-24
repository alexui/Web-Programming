<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-04-25 13:34:13
         compiled from "index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12742571e00b5daad28-93232373%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '385be36eb340b778d3895a9bc6575c6c6b0a0038' => 
    array (
      0 => 'index.tpl',
      1 => 1461583487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12742571e00b5daad28-93232373',
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
  'unifunc' => 'content_571e00b5ded3b7_55086280',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e00b5ded3b7_55086280')) {function content_571e00b5ded3b7_55086280($_smarty_tpl) {?><table>
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
