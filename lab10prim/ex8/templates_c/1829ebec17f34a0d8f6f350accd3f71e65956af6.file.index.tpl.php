<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-03 23:08:36
         compiled from "index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23358551ef9259d4010-87889676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1829ebec17f34a0d8f6f350accd3f71e65956af6' => 
    array (
      0 => 'index.tpl',
      1 => 1428095234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23358551ef9259d4010-87889676',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_551ef925a83cc0_65527491',
  'variables' => 
  array (
    'persons' => 0,
    'person' => 0,
    'page_count' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551ef925a83cc0_65527491')) {function content_551ef925a83cc0_65527491($_smarty_tpl) {?><table>
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
    
<br><br>

<?php echo $_smarty_tpl->getSubTemplate ("paginator.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('page_count'=>$_smarty_tpl->tpl_vars['page_count']->value,'page'=>$_smarty_tpl->tpl_vars['page']->value), 0);?>


<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
<?php }} ?>
