<?php

require '../libs/Smarty.class.php';
require_once '../idiorm.php';
ORM::configure('sqlite:../db.sqlite');

$smarty = new Smarty;
$smarty->caching = false;

$page = isset($_GET['page'])? $_GET['page'] : 0;

$persons = ORM::for_table('person')
                    ->select('name')
                    ->select('age')
                    ->limit(10)
                    ->offset($page * 10)
                    ->find_many();
$page_count = ORM::for_table('person')->count() / 10;

$smarty->assign("persons", $persons);
$smarty->assign("page", $page);
$smarty->assign("page_count", $page_count);

$smarty->display('index.tpl');
