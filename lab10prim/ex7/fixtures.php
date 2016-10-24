<?php
require_once '../idiorm.php';
ORM::configure('sqlite:../db.sqlite');
 
ORM::get_db()->exec('DROP TABLE IF EXISTS expenses;');
ORM::get_db()->exec(
    'CREATE TABLE expenses (' .
        'id INTEGER PRIMARY KEY AUTOINCREMENT, ' .
        'amount INTEGER, ' .
        'details TEXT, ' .
        'date DATE)'
);

function create_expense($amount, $details, $date) {
    $expense = ORM::for_table('expenses')->create();
    $expense->amount = $amount;
    $expense->details = $details;
    $expense->date = $date;
    $expense->save();
    return $expense;
}

$expense_list = array(
    create_expense(10, 'minge', '2016-04-25'),
    create_expense(100, 'tricou', '2016-04-25'),
);

echo('ok<br>');
echo('expense ' . ORM::for_table('expenses')->count() . '<br>');
