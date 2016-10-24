<?php 

	include "animalut.php";

	ORM::get_db()->exec('DROP TABLE IF EXISTS animalute;');
	ORM::get_db()->exec('DROP TABLE IF EXISTS actiuni;');
	ORM::get_db()->exec('DROP TABLE IF EXISTS fericire;');
	ORM::get_db()->exec('DROP TABLE IF EXISTS timp;');
	ORM::get_db()->exec('DROP TABLE IF EXISTS caracteristici;');
			
?>