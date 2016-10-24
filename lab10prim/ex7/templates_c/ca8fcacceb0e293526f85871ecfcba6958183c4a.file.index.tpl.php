<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-03 22:31:10
         compiled from "index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4263551ef70167f5c5-04052313%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca8fcacceb0e293526f85871ecfcba6958183c4a' => 
    array (
      0 => 'index.tpl',
      1 => 1428092985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4263551ef70167f5c5-04052313',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_551ef7016cd7c2_48114825',
  'variables' => 
  array (
    'expenses' => 0,
    'expense' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551ef7016cd7c2_48114825')) {function content_551ef7016cd7c2_48114825($_smarty_tpl) {?><table>
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
