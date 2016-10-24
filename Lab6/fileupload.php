<?php 

	if (count($_POST))
		$article_id = $_POST['article_id'];

	$target_path = "uploads/"; 
	$target_path = $target_path . $article_id . '.jpg'; 
	 
	if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) { 
	    echo "Fisierul ". basename( $_FILES['uploadedfile']['name']). " a fost uploadat"; 
	} 
	else { 
	    echo "Eroare la uploadarea fisierului!"; 
	}

	$location = "Location: " . $article_id . ".php";

	header($location);

?>