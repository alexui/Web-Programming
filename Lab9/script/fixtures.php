<?php

require_once 'idiorm.php';
ORM::configure('sqlite:db.sqlite');

ORM::get_db()->exec('DROP TABLE IF EXISTS texts;');
ORM::get_db()->exec(
        'CREATE TABLE texts (' .
        'text TEXT PRIMARY KEY)'
);