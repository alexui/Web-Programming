<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-03 22:17:00
         compiled from "index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27073551ef53cdeaf43-41902289%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ff6523082e4cb7bea91c9a69968800a42a71ab9' => 
    array (
      0 => 'index.tpl',
      1 => 1428088737,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27073551ef53cdeaf43-41902289',
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
  'unifunc' => 'content_551ef53ce60248_86986155',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551ef53ce60248_86986155')) {function content_551ef53ce60248_86986155($_smarty_tpl) {?><table>
    <?php echo $_smarty_tpl->getSubTemplate ("table_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <tbody>
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
    </tbody>
</table>

<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
<?php }} ?>
