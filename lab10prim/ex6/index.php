<?php

require '../libs/Smarty.class.php';
require_once '../idiorm.php';
ORM::configure('sqlite:../db.sqlite');

$smarty = new Smarty;
$smarty->caching = false;

if (isset($_POST['submit'])){
    if (isset($_POST['nume'])){
        if (ctype_alpha($_POST['nume']) == false){
            $errors[] = 'Nume invalid. ';
        }
        $smarty->assign('nume', $_POST['nume']);
    } else {
        $errors[] = 'Nume invalid. ';
    }
    
    if (isset($_POST['varsta'])){
        if (ctype_digit($_POST['varsta']) == false){
            $errors[] = 'Varsta invalida. ';
        }
        $smarty->assign('varsta', $_POST['varsta']);
    } else {
        $errors[] = 'Varsta invalida. ';
    }
    
    if (isset($errors)){
        $smarty->assign('errors', $errors);
    } else {
        $person = ORM::for_table('person')->create();
        $person->name = $_POST['nume'];
        $person->age = $_POST['varsta'];
        $person->save();
        
        $smarty->assign('persoana_adaugata', true);
    }
}

$smarty->display('index.tpl');
