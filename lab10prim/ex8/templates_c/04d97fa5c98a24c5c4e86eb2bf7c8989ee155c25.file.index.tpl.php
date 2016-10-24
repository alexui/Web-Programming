<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-04-25 14:33:42
         compiled from "index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10624571e0ea6cb4487-96205167%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04d97fa5c98a24c5c4e86eb2bf7c8989ee155c25' => 
    array (
      0 => 'index.tpl',
      1 => 1461583487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10624571e0ea6cb4487-96205167',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'persons' => 0,
    'person' => 0,
    'page_count' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_571e0ea6cf1383_48302119',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e0ea6cf1383_48302119')) {function content_571e0ea6cf1383_48302119($_smarty_tpl) {?><table>
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
