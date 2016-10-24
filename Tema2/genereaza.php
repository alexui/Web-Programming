<?php
	
	include "animalut.php";

    function main () {  

	    if (count($_GET)) {
	    	if (array_key_exists('nume', $_GET))
	    		$nume_animalut = $_GET['nume'];
	    	$tip_animalut = $_GET['tip'];
	    }

	    if (count($_POST)) {
	    	if (array_key_exists('nume', $_POST))
	    		$nume_animalut = $_POST['nume'];
	    	$tip_animalut = $_POST['tip'];
	    }

	    $tip_animalute = array("pui", "pisica", "vaca", "caine", "elefant",
	    				 "peste", "cal", "leu", "iepure", "broasca_testoasa");
	    if (!in_array($tip_animalut, $tip_animalute)) {
	    	echo("tip incorect");
	    	return;
	    }

	    if (!isset($tip_animalut)) {
	    	echo "tip not set <br>";
	    	return;
	    }

	    if (!isset($nume_animalut))
	    	$nume_animalut = 'Fara nume';

	  	$animalut = new Animalut();
	    $id_animalut = $animalut->insert_pet_info($tip_animalut, $nume_animalut);
	    echo($id_animalut);
    }

    main();

?>