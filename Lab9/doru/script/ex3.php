<?php

require_once 'idiorm.php';
ORM::configure('sqlite:db.sqlite');

if (isset($_POST["data_text"])) {
    
    $text = ORM::for_table('texts')->create();
    $text->text = $_POST["data_text"];
    $text->save();
    exit('ok');
}

exit('nok');