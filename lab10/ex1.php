<?php 

require("libs/Smarty.class.php");
echo("Ex1 and Ex2<br>");

// create object
$smarty = new Smarty;

// assign some content. This would typically come from
// a database or other source, but we'll use static
// values for the purpose of this example.
$smarty->assign('name', 'alex budau');
$smarty->assign('address', 'Spaliul Independentei');
$smarty->assign('message', 'Hello World!!!');

// display it
$smarty->display('ex1.tpl');

?>