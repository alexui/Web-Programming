<?php 

	include "animalut.php";

	Timp::forward_hour();	

	$pet_info = ORM::for_table(Animalut::PETS)->find_many();
	foreach ($pet_info as $row) {
		$pet_id = $row->id;

		$animalut = new Animalut($pet_id);
		$animalut->load_pet_info();
		$animalut->check_hourly_update();
		$animalut->check_happiness();
		$animalut->update_pet_info();
	}
?>