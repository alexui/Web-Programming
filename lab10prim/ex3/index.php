<?php

require '../libs/Smarty.class.php';
require_once '../idiorm.php';
ORM::configure('sqlite:../db.sqlite');

$smarty = new Smarty;

$persons = ORM::for_table('person')->select('name')->select('age')->find_many();

$smarty->assign("persons", $persons);

$smarty->display('index.tpl');
