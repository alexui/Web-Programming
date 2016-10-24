<?php

require '../libs/Smarty.class.php';

$smarty = new Smarty;

$smarty->assign("test", "PW exercitiul 1 ");

$smarty->display('index.tpl');
