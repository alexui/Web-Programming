<!DOCTYPE html>
<html>
<head>
	<title>Article7</title>
	<?php 
		session_start();

		echo "COOKIE : ";
		print_r($_COOKIE);	
		echo "<br>";

		echo 'session status : ' . session_status() . ' , SID : ' . SID .'<br>';
		echo 'SESSION : ';
		print_r($_SESSION);
		echo "<br>";

		$id = 7;
		$visited = $_SESSION['visited'];
		if (in_array($id, $visited)) {
			$key = array_search($id, $visited);
			array_splice($visited, $key, 1);
		}
		array_push($visited, $id);
		
		$_SESSION['visited'] = $visited;
	?>
</head>
<body>
	<h1>Articolul 7</h1>
	<form enctype="multipart/form-data" action="fileupload.php" method="POST"> 
	    <input name="uploadedfile" type="file">
	    <input type="hidden" name="article_id" value="7">
	    <button type="submit">Upload File</button> 
	</form>
	<img src="uploads/7.jpg"alt="Image not found">; 
</body>
</html>