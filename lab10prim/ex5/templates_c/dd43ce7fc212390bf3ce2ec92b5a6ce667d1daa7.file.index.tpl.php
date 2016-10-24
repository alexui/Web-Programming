<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-03 22:12:39
         compiled from "index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12942551ef437834144-94953578%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd43ce7fc212390bf3ce2ec92b5a6ce667d1daa7' => 
    array (
      0 => 'index.tpl',
      1 => 1428088747,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12942551ef437834144-94953578',
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
  'unifunc' => 'content_551ef437882347_99219927',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551ef437882347_99219927')) {function content_551ef437882347_99219927($_smarty_tpl) {?><table>
    <?php echo $_smarty_tpl->getSubTemplate ("table_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <tbody>
        <?php  $_smarty_tpl->tpl_vars['person'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['person']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['persons']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['person']->key => $_smarty_tpl->tpl_vars['person']->value) {
$_smarty_tpl->tpl_vars['person']->_loop = true;
?>
            <?php echo $_smarty_tpl->getSubTemplate ("table_entry.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('person'=>$_smarty_tpl->tpl_vars['person']->value), 0);?>

        <?php } ?>
    </tbody>
</table>

<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
<?php }} ?>
