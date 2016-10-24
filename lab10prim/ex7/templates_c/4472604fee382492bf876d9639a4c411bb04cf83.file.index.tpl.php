<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-04-25 14:09:03
         compiled from "index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28861571e08df9c19f9-10956596%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4472604fee382492bf876d9639a4c411bb04cf83' => 
    array (
      0 => 'index.tpl',
      1 => 1461583487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28861571e08df9c19f9-10956596',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'expenses' => 0,
    'expense' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_571e08df9fe8f8_73832041',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e08df9fe8f8_73832041')) {function content_571e08df9fe8f8_73832041($_smarty_tpl) {?><table>
    <?php echo $_smarty_tpl->getSubTemplate ("table_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <tbody>
        <?php  $_smarty_tpl->tpl_vars['expense'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['expense']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['expenses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['expense']->key => $_smarty_tpl->tpl_vars['expense']->value) {
$_smarty_tpl->tpl_vars['expense']->_loop = true;
?>
            <?php echo $_smarty_tpl->getSubTemplate ("table_entry.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('expense'=>$_smarty_tpl->tpl_vars['expense']->value), 0);?>

        <?php } ?>
    </tbody>
</table>

<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
<?php }} ?>
