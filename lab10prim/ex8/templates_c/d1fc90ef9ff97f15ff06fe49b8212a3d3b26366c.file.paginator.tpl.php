<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-04-25 14:42:07
         compiled from "paginator.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32607571e0ea6d2e284-34836688%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1fc90ef9ff97f15ff06fe49b8212a3d3b26366c' => 
    array (
      0 => 'paginator.tpl',
      1 => 1461588126,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32607571e0ea6d2e284-34836688',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_571e0ea6d6b188_64759838',
  'variables' => 
  array (
    'page_count' => 0,
    'p' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e0ea6d6b188_64759838')) {function content_571e0ea6d6b188_64759838($_smarty_tpl) {?><div>
    <ul>
    <?php $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['p']->step = 1;$_smarty_tpl->tpl_vars['p']->total = (int) ceil(($_smarty_tpl->tpl_vars['p']->step > 0 ? $_smarty_tpl->tpl_vars['page_count']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['page_count']->value-1)+1)/abs($_smarty_tpl->tpl_vars['p']->step));
if ($_smarty_tpl->tpl_vars['p']->total > 0) {
for ($_smarty_tpl->tpl_vars['p']->value = 0, $_smarty_tpl->tpl_vars['p']->iteration = 1;$_smarty_tpl->tpl_vars['p']->iteration <= $_smarty_tpl->tpl_vars['p']->total;$_smarty_tpl->tpl_vars['p']->value += $_smarty_tpl->tpl_vars['p']->step, $_smarty_tpl->tpl_vars['p']->iteration++) {
$_smarty_tpl->tpl_vars['p']->first = $_smarty_tpl->tpl_vars['p']->iteration == 1;$_smarty_tpl->tpl_vars['p']->last = $_smarty_tpl->tpl_vars['p']->iteration == $_smarty_tpl->tpl_vars['p']->total;?>
        <li>
            <a href="?page=<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
">
                <?php if ($_smarty_tpl->tpl_vars['p']->value==$_smarty_tpl->tpl_vars['page']->value) {?>
                    <b>Pagina <?php echo $_smarty_tpl->tpl_vars['p']->value+1;?>
</b>
                <?php } else { ?>
                    Pagina <?php echo $_smarty_tpl->tpl_vars['p']->value+1;?>

                <?php }?>
            </a>
        </li>
    <?php }} ?>
    </ul>
</div>
<?php }} ?>
