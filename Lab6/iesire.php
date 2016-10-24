<!DOCTYPE html>
<html>
<head>
	<title>IesireEx6</title>
	<?php 
		session_start();

		echo "COOKIE : ";
		print_r($_COOKIE);	
		echo "<br>";

		echo 'session status : ' . session_status() . ' , SID : ' . SID .'<br>';
		echo 'SESSION : ';
		print_r($_SESSION);
		echo "<br>";

	?>
</head>
<body>
	<form action="iesire.php" method="POST">
		<input type="hidden" name="iesire" value="1">
		<button type="submit">Iesire</button>
		<br>
	</form>
	<?php 

		if (count($_POST)) {
			$cookie_name = 'user';
			setcookie($cookie_name, "", time()-(60*60*24), "/");
			print_r($_COOKIE);

			// remove all session variables
			// session_unset(); 

			// destroy the session 
			session_destroy(); 

			header("Location: autentificare.php");			
		}

	?>
</body>
</html>