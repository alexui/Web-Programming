<?php 

require("libs/Smarty.class.php");
require_once 'idiorm.php';

ORM::configure('sqlite:./lab10.db');

echo("Ex3<br>");

// create object
$smarty = new Smarty;

// assign some content. This would typically come from
// a database or other source, but we'll use static
// values for the purpose of this example.
// $smarty->assign('name', 'alex budau');
// $smarty->assign('address', 'Spaliul Independentei');
// $smarty->assign('message', 'Hello World!!!');

// // display it
// $smarty->display('ex3.tpl');

$array = array();
$result = ORM::for_table('person')->find_many();
foreach($result as $person) {
	array_push($array, array(
	    "name" => $person->name,
	    "age" => $person->age
	    )
	);
}

//print_r($array);

$smarty->assign('persons', $array);
$smarty->display('ex3.tpl');

?>