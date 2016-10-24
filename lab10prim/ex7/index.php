<?php

require '../libs/Smarty.class.php';
require_once '../idiorm.php';
ORM::configure('sqlite:../db.sqlite');

$smarty = new Smarty;
$smarty->caching = false;

$expenses = ORM::for_table('expenses')->select('amount')->select('details')->select('date')->find_many();

$smarty->assign("expenses", $expenses);

$smarty->display('index.tpl');