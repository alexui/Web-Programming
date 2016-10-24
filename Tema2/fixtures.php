<?php 

	include "animalut.php";

	function main () {

		Animalut::create_info_table_if_not_exists();
		Animalut::create_actions_table_if_not_exists();
	    Animalut::insert_into_actions_if_empty();
	    Animalut::create_happiness_table_if_not_exists();
	    Animalut::insert_into_happiness_if_empty();
	    Animalut::create_stats_table_if_not_exists();

	    Timp::create_time_table_if_not_exists();

	}

	main();

?>