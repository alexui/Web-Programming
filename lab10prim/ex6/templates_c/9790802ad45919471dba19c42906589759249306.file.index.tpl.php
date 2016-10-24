<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-03 22:13:40
         compiled from "index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11845551ef47424d523-23132891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9790802ad45919471dba19c42906589759249306' => 
    array (
      0 => 'index.tpl',
      1 => 1428091589,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11845551ef47424d523-23132891',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nume' => 0,
    'varsta' => 0,
    'errors' => 0,
    'error' => 0,
    'persoana_adaugata' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_551ef4742ce3c4_62156949',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551ef4742ce3c4_62156949')) {function content_551ef4742ce3c4_62156949($_smarty_tpl) {?><form method="POST">
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
    <?php if (isset($_smarty_tpl->tpl_vars['persoana_adaugata']->value)) {?>
    <div>
        <p>
            Persoana adaugata. 
        </p>
    </div>
    <?php }?>
<?php }?><?php }} ?>
