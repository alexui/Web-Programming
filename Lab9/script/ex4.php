<?php

require_once 'idiorm.php';
ORM::configure('sqlite:db.sqlite');

$texts = ORM::for_table('texts')->find_array();
echo json_encode($texts);
