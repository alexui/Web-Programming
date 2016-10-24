<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-04-25 14:51:32
         compiled from "index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28198571e06f63e4185-21203809%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0674456f65e28d13a8dea2bbb4fdc7b076abe8ab' => 
    array (
      0 => 'index.tpl',
      1 => 1461588684,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28198571e06f63e4185-21203809',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_571e06f6514c89_86692574',
  'variables' => 
  array (
    'nume' => 0,
    'varsta' => 0,
    'errors' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e06f6514c89_86692574')) {function content_571e06f6514c89_86692574($_smarty_tpl) {?><form method="POST">
    <label for="nume">Nume</label>
    <input type="text" name="nume" id="nume" value="<?php if (isset($_smarty_tpl->tpl_vars['nume']->value)) {
echo $_smarty_tpl->tpl_vars['nume']->value;
}?>">
    <br>
    <label for="varsta">Varsta</label>
    <input type="text" name="varsta" id="varsta" value="<?php if (isset($_smarty_tpl->tpl_vars['varsta']->value)) {
echo $_smarty_tpl->tpl_vars['varsta']->value;
}?>">
    <br><br>
    <input type="submit" name="submit" value="Adauga persoana">
</form>

<?php if (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
    <div>
    <?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['errors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
        <p>
            <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

        </p>
    <?php } ?>
    </div>
<?php } else { ?>
    <div>
        <p>
            Persoana adaugata. 
        </p>
    </div>
<?php }?><?php }} ?>
