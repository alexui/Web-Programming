<?php
/* Smarty version 3.1.29, created on 2016-04-25 12:14:33
  from "G:\Programs\Xampp\htdocs\programare_web\lab10\ex1.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_571dee095d1940_15819919',
  'file_dependency' => 
  array (
    'f9894d4869a38405f25ac5ccc0bb419b2e1e5bc8' => 
    array (
      0 => 'G:\\Programs\\Xampp\\htdocs\\programare_web\\lab10\\ex1.tpl',
      1 => 1461579234,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_571dee095d1940_15819919 ($_smarty_tpl) {
?>
<html>
<head>
<title>Info</title>
</head>
<body>

<pre>
	User Information:

	Name: <?php echo $_smarty_tpl->tpl_vars['name']->value;?>

	Address: <?php echo $_smarty_tpl->tpl_vars['address']->value;?>

</pre>

<div>
	says: <?php echo $_smarty_tpl->tpl_vars['message']->value;?>
 to everybody
	<br>
</div>

</body>
</html><?php }
}
