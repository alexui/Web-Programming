<?php

require '../libs/Smarty.class.php';

$smarty = new Smarty;

$smarty->assign("test", "Hello World");

$smarty->display('index.tpl');
