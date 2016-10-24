<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-03 23:08:36
         compiled from "paginator.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17595551efee2755059-29097888%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4034ab7b2e4fd314d367ab142e70de8425aeffa7' => 
    array (
      0 => 'paginator.tpl',
      1 => 1428095307,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17595551efee2755059-29097888',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_551efee2755050_10470745',
  'variables' => 
  array (
    'page_count' => 0,
    'p' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551efee2755050_10470745')) {function content_551efee2755050_10470745($_smarty_tpl) {?><div>
    <ul>
    <?php $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['p']->step = 1;$_smarty_tpl->tpl_vars['p']->total = (int) ceil(($_smarty_tpl->tpl_vars['p']->step > 0 ? $_smarty_tpl->tpl_vars['page_count']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['page_count']->value)+1)/abs($_smarty_tpl->tpl_vars['p']->step));
if ($_smarty_tpl->tpl_vars['p']->total > 0) {
for ($_smarty_tpl->tpl_vars['p']->value = 1, $_smarty_tpl->tpl_vars['p']->iteration = 1;$_smarty_tpl->tpl_vars['p']->iteration <= $_smarty_tpl->tpl_vars['p']->total;$_smarty_tpl->tpl_vars['p']->value += $_smarty_tpl->tpl_vars['p']->step, $_smarty_tpl->tpl_vars['p']->iteration++) {
$_smarty_tpl->tpl_vars['p']->first = $_smarty_tpl->tpl_vars['p']->iteration == 1;$_smarty_tpl->tpl_vars['p']->last = $_smarty_tpl->tpl_vars['p']->iteration == $_smarty_tpl->tpl_vars['p']->total;?>
        <li>
            <a href="?page=<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
">
                <?php if ($_smarty_tpl->tpl_vars['p']->value==$_smarty_tpl->tpl_vars['page']->value) {?>
                <b>
                <?php }?>
                Pagina <?php echo $_smarty_tpl->tpl_vars['p']->value;?>

                <?php if ($_smarty_tpl->tpl_vars['p']->value==$_smarty_tpl->tpl_vars['page']->value) {?>
                </b>
                <?php }?>
            </a>
        </li>
    <?php }} ?>
    </ul>
</div>
<?php }} ?>
