<?php  

	include "animalut.php";

	function main () {

		if (count($_GET)) {
	    	$id = $_GET['id'];
	    }

	    if (count($_POST)) {
	    	$id = $_GET['id'];
	    }

	    if (!isset($id)) {
	    	echo "id not set <br>";
	    	return;
	    }

	    $animalut = new Animalut($id);
		if(!$animalut->load_pet_info()) {
			echo("nu exista animalut cu id specificat");
			return;
		}

		$animalut->work();
		$animalut->check_hourly_update();
		$animalut->check_happiness();
		$animalut->update_pet_info();
		$json = $animalut->get_json_from_stats();

		echo $json;
	}

	main();

?>