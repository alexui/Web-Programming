<?php
/* Smarty version 3.1.29, created on 2016-04-25 12:58:35
  from "G:\Programs\Xampp\htdocs\programare_web\lab10\ex3.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_571df85b0992e0_58363573',
  'file_dependency' => 
  array (
    '750285231bfa3b7688b5a45bc1a3b6f04b7a940f' => 
    array (
      0 => 'G:\\Programs\\Xampp\\htdocs\\programare_web\\lab10\\ex3.tpl',
      1 => 1461581914,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_571df85b0992e0_58363573 ($_smarty_tpl) {
?>
<html>
<head>
<title>Info</title>
</head>
<body>

Persons:
<table>
	<th>
		<td>Name</td>
		<td>Age</td>
	</th>
	<tbody>
		<?php
$_from = $_smarty_tpl->tpl_vars['persons']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$__foreach_v_0_saved_key = isset($_smarty_tpl->tpl_vars['k']) ? $_smarty_tpl->tpl_vars['k'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
			<tr>
				<td>
					<?php echo $_smarty_tpl->tpl_vars['k']->value;?>

				</td>
				<!-- <td>
					<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>

				</td>
				<td>
					<?php echo $_smarty_tpl->tpl_vars['v']->value['age'];?>

				</td> -->
			</tr>
		<?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
if ($__foreach_v_0_saved_key) {
$_smarty_tpl->tpl_vars['k'] = $__foreach_v_0_saved_key;
}
?>
	</tbody>
</table>

</body>
</html><?php }
}
