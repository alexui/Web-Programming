<?php

require_once 'idiorm.php';
ORM::configure('sqlite:db.sqlite');

$texts = ORM::for_table('texts')->find_many();

foreach ($texts as $t) {
    echo $t->text . '<br>';
}
